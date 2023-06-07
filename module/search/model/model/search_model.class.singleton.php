<?php
    class search_model {

        private $bll;
        static $_instance;
        
        function __construct() {
            $this -> bll = search_bll::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_search_brand() {
            return $this -> bll -> get_search_brand_BLL();
        }

        public function get_search_category_null() {
            return $this -> bll -> get_search_category_null_BLL();
        }

        public function get_search_category() {
            return $this -> bll -> get_search_category_BLL();
        }

        public function get_search_autocomplete($args) {
            return $this -> bll -> get_search_autocomplete_BLL($args);
        }

    }
?>