<?php
    // include( MODEL_PATH . "db.class.singleton.php");

    class home_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function select_data_carrusel($db) {
            $sql= "SELECT * FROM `brand` ORDER BY cod_brand ASC LIMIT 15;";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        public function select_data_category($db) {
            $sql= "SELECT * FROM category";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        public function select_data_type($db) {
            $sql= "SELECT *FROM motor_type ORDER BY cod_type DESC";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }


        public function select_most_visited($db) {
            $sql= "SELECT c.img_car, c.car_plate, m.cod_brand, m.name_model 
            FROM car c, model m 
            WHERE c.model = m.cod_model 
            ORDER BY c.visit_count DESC;";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

    }
?>