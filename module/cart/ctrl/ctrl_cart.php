<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
    include($path . "/module/cart/model/DAO_cart.php");
    include($path . "/model/middleware_auth.php");
    @session_start();


if(isset($_GET['op'])){
    switch ($_GET['op']) {
        case 'view';
                include("module/cart/view/cart.html");
                break;
                    
            case 'insert_cart';
            $token = $_POST['token'];
            $id_car = $_POST['id_car'];
                try{
                    $json = decode_token($token);
                    $dao = new DAO_Cart();
                    $rdo = $dao->select_product($json['username'], $id_car);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                $dinfo = array();
                // echo json_encode($dinfo);
                // exit;
                foreach ($rdo as $row) {
                    array_push($dinfo, $row);
                }
                if(!$dinfo){
                    $dao = new DAO_Cart();
                    $rdo = $dao->insert_product($json['username'], $id_car);
                    echo json_encode("insert");
                    exit;
                }else{
                    $dao = new DAO_Cart();
                    $rdo = $dao->update_product($json['username'], $id_car);
                    echo json_encode("update");
                    exit;
                }
                break; 
        
            case 'delete_cart';    
                $token = $_POST['token'];
                $id_car = $_POST['id_car'];
                // echo json_encode($id_car);
                // exit;
                try{
                    $json = decode_token($token);
                    $dao = new DAO_Cart();
                    $rdo = $dao->delete_cart($json['username'], $id_car);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    echo json_encode("delete");
                    exit;
                }
                break;         

            case 'load_cart';   
            $token = $_POST['token'];
            try{
                $json = decode_token($token);
                $dao = new DAO_Cart();
                    $rdo = $dao->select_user_cart($json['username']);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $dinfo = array();
                    foreach ($rdo as $row) {
                        array_push($dinfo, $row);
                    }
                    echo json_encode($dinfo);
                }
                break; 

            case 'update_qty';    
                try{
                    $token = $_GET['user'];
                    $secret = 'maytheforcebewithyou';
    
                    $JWT = new JWT;
                    $json = $JWT->decode($token, $secret);  
                    $json = json_decode($json, TRUE);
                    
                    $dao = new DAO_Cart();
                    $rdo = $dao->update_qty($json['name'], $_GET['id'],$_GET['qty']);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    echo json_encode("update");
                    exit;
                }
                break; 

            case 'checkout';    
                try{
                    $token = $_GET['user'];
                    $secret = 'maytheforcebewithyou';
    
                    $JWT = new JWT;
                    $json = $JWT->decode($token, $secret);  
                    $json = json_decode($json, TRUE);
                    
                    $dao = new DAO_Cart();
                    $rdo = $dao->select_user_cart($json['name']);
                }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }
                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $dao = new DAO_Cart();
                    $res = $dao->checkout($rdo, $json['name']);
                    echo json_encode("checkout");
                    exit;
                }
                break; 
                    
            default;
                include("view/inc/error404.php");
                break;
                
        }
    }
?>
