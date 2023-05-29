<?php
    
    class login_model {

        private $bll;
        static $_instance;
        
        function __construct() {
            $this -> bll = login_bll::getInstance();
        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function get_register($args){
            return $this -> bll -> get_register_BLL($args[0], $args[1], $args[2]);
        }

        public function get_login($args) {
            return $this -> bll -> get_login_BLL($args[0], $args[1]);
        }

        public function get_data_user($token) {
            return $this -> bll -> get_data_user_BLL($token);
        }

        public function get_logout() {
            return $this -> bll -> get_logout_BLL();
        }

        public function get_verify_email($token) {
            return $this -> bll -> get_verify_email_BLL($token);
        }

    }
?>