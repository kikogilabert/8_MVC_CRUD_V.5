<?php
    // include( BLL_HOME . "home_bll.class.singleton.php");
    
    class home_model {

        private $bll;
        static $_instance;
        
        function __construct() {
            $this -> bll = home_bll::getInstance();
            // $this -> db = db::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_carrusel() {
            return $this -> bll -> get_carrusel_BLL();
        }

        public function get_category() {
            return $this -> bll -> get_category_BLL();
        }

        public function get_type() {
            return $this -> bll -> get_type_BLL();
        }

        public function most_visited() {
            return $this -> bll -> get_mostvisited_BLL();
        }

    }
?>