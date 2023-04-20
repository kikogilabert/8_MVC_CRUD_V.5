<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
    include ($path . 'module/shop/model/DAO_shop.php');
    include($path . "/model/middleware_auth.php");
    @session_start();
    if (isset($_SESSION["tiempo"])) {  
    $_SESSION["tiempo"] = time(); //Devuelve la fecha actual
}


    switch ($_GET['op']) {

        case 'list_shop':
            include("module/shop/view/shop.html");
        break;

        case 'all_cars':
            $total_prod = $_POST['total_prod'];
            $items_page =  $_POST['items_page'];
            try{
                // echo json_encode($total_prod);
                // exit;
                $daohome = new DAO_shop();
                $Select_all_cars = $daohome->select_all_cars($total_prod, $items_page);
            } catch(Exception $e){
                echo json_encode("error");
            }

            if(!empty($Select_all_cars)){
                echo json_encode($Select_all_cars); 
            }
            else{
                echo json_encode("error");
            }
            break;

            case 'details_car':
                // echo json_encode($_GET['id']); 
                // exit;
                try {
                    $daoshop = new DAO_shop();
                    $Date_car = $daoshop->select_one_car($_GET['id']);
                } catch (Exception $e) {
                    echo json_encode("error");
                }
                try {
                    $daoshop_img = new DAO_shop();
                    $Date_images = $daoshop_img->select_imgs_car($_GET['id']);
                } catch (Exception $e) {
                    echo json_encode("error");
                }
                if (!empty($Date_car || $Date_images)) {
                    $rdo = array();
                    $rdo[0] = $Date_car;
                    $rdo[1][] = $Date_images;
                    echo json_encode($rdo);

                } else {
                    echo json_encode("error");
                }
                break;
            
            case 'filters';
                $homeQuery = new DAO_shop();
                // echo json_encode( $_POST['items_page']); 
                // exit;
                $selSlide = $homeQuery -> filters( $_POST['filters'], $_POST['total_prod'], $_POST['items_page']);
                if (!empty($selSlide)) {
                    echo json_encode($selSlide);
                }
                else {
                    echo "error";
                }
                break;




            case 'visitor_counter';
            try {
                $daoshop = new DAO_shop();
                $Date_car = $daoshop->count_visits($_GET['id']);
            } catch (Exception $e) {
                echo json_encode("error");
            }
            break;
        

            case 'count_cars_related':
                // echo json_encode('dentro case2222');
                // exit;
                $type_car = $_POST['type_car'];
                try {
                    $dao = new DAO_shop();
                    $rdo = $dao->count_more_cars_related($type_car);
                        // echo json_encode($rdo);
                        // exit;
                } catch (Exception $e) {
                    echo json_encode("error");
                    exit;
                }
                if (!$rdo) {
                    echo json_encode("error");
                    exit;
                } else {
                    $dinfo = array();
                    foreach ($rdo as $row) {
                        array_push($dinfo, $row);
                    }
                    echo json_encode($dinfo);
                }
                break;



            case 'cars_related';
            // echo json_encode('dentro case');
            // exit;
            $type_car = $_POST['type'];
            $loaded =  $_POST['loaded'];
            $items =  $_POST['items'];
            try {
                $dao = new DAO_shop();
                $rdo = $dao->select_cars_related($type_car, $loaded, $items);
            } catch (Exception $e) {
                echo json_encode("error");
                exit;
            }
            if (!$rdo) {
                echo json_encode("error");
                exit;
            } else {
                $dinfo = array();
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                echo json_encode($dinfo);
            }

            break;


            //PAGINATION CASES:
            
            case 'count';    
            // echo json_encode('dentro case');
            // exit;
            $homeQuery = new DAO_shop();
            $selSlide = $homeQuery -> select_count();
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;
    
            case 'count_filters_home';
            $filters = $_POST['filter_home'];
            $homeQuery = new DAO_shop();
            $selSlide = $homeQuery -> select_count_filter($filters);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;
    
            case 'count_filters_shop';
            $filters = $_POST['filter'];
            $homeQuery = new DAO_shop();
            $selSlide = $homeQuery -> select_count_filter($filters);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;


            case 'count_filters_search';
            $filters = $_POST['filters_search'];
            // echo json_encode('dentro case');
            // exit;
            $homeQuery = new DAO_shop();
            $selSlide = $homeQuery -> select_count_filter($filters);
            if (!empty($selSlide)) {
                echo json_encode($selSlide);
            }
            else {
                echo "error";
            }
            break;


            // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES
            // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES
            // LIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKESLIKES

                //el usuario quiere hacer un like
                case 'control_likes':
                    $token = $_POST['token'];
                    $id_car = $_POST['id_car'];
                    // echo json_encode($id_car);
                    // exit;
            
                    try {
                        $json = decode_token($token);
                        $dao = new DAO_Shop();
                        $rdo = $dao->select_likes($id_car, $json['username']);
                    } catch (Exception $e) {
                        echo json_encode("error");
                        exit;
                    }
                    if (!$rdo) {
                        echo json_encode("error");
                        exit;
                    } else {
                        $dinfo = array();
                        foreach ($rdo as $row) {
                            array_push($dinfo, $row);
                        }
                        if (count($dinfo) === 0) {
                            $dao = new DAO_Shop();
                            $rdo = $dao->like($id_car, $json['username']);
                            echo json_encode("like");
                        } else {
                            $dao = new DAO_Shop();
                            $rdo = $dao->dislike($id_car, $json['username']);
                            echo json_encode("dislike");
                        }
                    }
                    break;
            
                case 'load_likes_user';
                    try {
                        $json = decode_token($_POST['token']);
                        $dao = new DAO_Shop();
                        $rdo = $dao->select_load_likes($json['username']);
                    } catch (Exception $e) {
                        echo json_encode("error");
                        exit;
                    }
                    if (!$rdo) {
                        echo json_encode("error");
                        exit;
                    } else {
                        $dinfo = array();
                        foreach ($rdo as $row) {
                            array_push($dinfo, $row);
                        }
                        echo json_encode($dinfo);
                    }
                    break;

        default:
            include("view/inc/error404.php");
            break;
    }
