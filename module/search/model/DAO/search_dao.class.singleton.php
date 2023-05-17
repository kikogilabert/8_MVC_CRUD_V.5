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

        // $stmt = $db -> ejecutar($sql);
        // return $db -> listar($stmt);

    }
?>