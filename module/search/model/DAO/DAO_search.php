<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
include($path . "/model/connect.php");

class DAO_search {
    function search_brand(){
        $select="SELECT * FROM brand";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function search_category_null(){
        // echo json_encode('CATEGORY SIN BRAND');
		// exit;
        $select="SELECT DISTINCT * FROM category";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function search_category($brand){
        // echo json_encode('CATEGORY CON BRAND');
		// exit;
        $select="SELECT ca.*
        FROM car c, category ca, model m
        WHERE ca.cod_cat = c.category
        AND c.model = m.cod_model
        AND m.cod_brand = '$brand'";

        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);

        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_only_brand($city, $brand){
        $select="SELECT c.* 
            FROM car c, model m 
            WHERE m.cod_brand = $brand 
            AND m.cod_model = c.model 
            AND c.city LIKE '$city%';";
            
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_only_category($category, $city){
        $select="SELECT *
        FROM car c
        WHERE c.category = '$category' AND c.city LIKE '$city%'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }


    function select_brand_category($city, $brand, $category){
        $select="SELECT *
                FROM car c, model m
                WHERE m.cod_brand = '$brand'
                AND m.cod_model = c.model AND c.category = '$category' AND c.city LIKE '$city%';";
            
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }

    function select_city($city){
        $select="SELECT *
        FROM car c
        WHERE c.city LIKE '$city%'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $select);
        connect::close($conexion);
        
        $retrArray = array();
        if ($res -> num_rows > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $retrArray[] = $row;
            }
        }
        return $retrArray;
    }
}