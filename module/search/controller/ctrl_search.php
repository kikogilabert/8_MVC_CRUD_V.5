<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
include($path . 'module/search/model/DAO_search.php');

switch ($_GET['op']) {
    case 'search_brand';
    // echo json_encode('hola ctrl searcvhhhhhh KGEPIJGIE');
    // exit;
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_brand();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'search_category_null';
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_category_null();
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'search_category';
        // echo json_encode($_POST['brand']);
        // exit;
        $homeQuery = new DAO_search();
        $selSlide = $homeQuery -> search_category($_POST['brand']);        
        if (!empty($selSlide)) {
            echo json_encode($selSlide);
        }
        else {
            echo "error";
        }
        break;

    case 'autocomplete';
    try{
        $dao = new DAO_search();
        if (!empty($_POST['brand']) && empty($_POST['category'])){
            $rdo = $dao->select_only_brand($_POST['city'], $_POST['brand']);
        }else if(!empty($_POST['brand']) && !empty($_POST['category'])){
            $rdo = $dao->select_brand_category($_POST['city'], $_POST['brand'], $_POST['category']);
        }else if(empty($_POST['brand']) && !empty($_POST['category'])){
            $rdo = $dao->select_only_category($_POST['category'], $_POST['city']);
        }else {
            $rdo = $dao->select_city($_POST['city']);
        }
    }catch (Exception $e){
        echo json_encode("catch");
        exit;
    }
    if(!$rdo){
        echo json_encode("rdo!!!");
        exit;
    }else{
        $dinfo = array();
        foreach ($rdo as $row) {
            array_push($dinfo, $row);
            
        }
        echo json_encode($dinfo);
    }
    break; 
}