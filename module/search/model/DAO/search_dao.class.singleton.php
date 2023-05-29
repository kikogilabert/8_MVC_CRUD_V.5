<?php
    class search_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
    function search_brand($db){
        $sql="SELECT * FROM brand";
        
        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);
    }

    function search_category_null($db){
        $sql="SELECT DISTINCT * FROM category";

        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);
        
    }

    function search_category($db, $brand){
       
        $sql="SELECT ca.*
        FROM car c, category ca, model m
        WHERE ca.cod_cat = c.category
        AND c.model = m.cod_model
        AND m.cod_brand = '$brand'";
        
        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);
    }



        function select_only_brand($db, $city, $brand){
        $sql="SELECT c.* 
            FROM car c, model m 
            WHERE m.cod_brand = '$brand' 
            AND m.cod_model = c.model 
            AND c.city LIKE '$city%';";
        
        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);

    }

    function select_only_category( $db, $category, $city){
        $sql="SELECT *
        FROM car c
        WHERE c.category = '$category' AND c.city LIKE '$city%'";
        
        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);
    }


    function select_brand_category($db ,$city, $brand, $category){
        $sql="SELECT *
                FROM car c, model m
                WHERE m.cod_brand = '$brand'
                AND m.cod_model = c.model AND c.category = '$category' AND c.city LIKE '$city%';";
            
            
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);

    }

    function select_city( $db, $city){
        $sql="SELECT *
        FROM car c
        WHERE c.city LIKE '$city%'";
        
        $stmt = $db -> ejecutar($sql);
        return $db -> listar($stmt);
    }

    }
?>