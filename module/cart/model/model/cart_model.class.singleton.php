<?php
    
    class cart_model {

        private $bll;
        static $_instance;
        
        function __construct() {
            $this -> bll = cart_bll::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_load_cart($token) {
            return $this -> bll -> get_load_cart_BLL($token);
        }

        public function get_insert_cart($args) {
            return $this -> bll -> get_insert_cart_BLL($args);
        }

        public function get_remove_product($args) {
            return $this -> bll -> get_remove_product_BLL($args);
        }

        public function get_update_qty($args) {
            return $this -> bll -> get_update_qty_BLL($args);
        }
        public function get_checkout($token) {
            return $this -> bll -> get_checkout_BLL($token);
        }

    }
?>