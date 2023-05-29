<?php

    class login_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        function select_email($db, $email){
			$sql = "SELECT email FROM users WHERE email='$email'";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
		}

        function select_username( $db, $username){
			$sql = "SELECT username FROM users WHERE username  ='$username'";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
		}
        function insert_user($db, $username, $password, $email, $avatar, $email_token){ 
            $sql ="INSERT INTO `users`(`username`, `password`, `email`, `type_user`, `avatar` , `email_token` , `activated`) 
            VALUES ('$username','$password','$email','client','$avatar', '$email_token', 'false')";
            $stmt = $db -> ejecutar($sql);
            return $sql;
            // return $db -> listar($stmt);
            
        }

        function select_user($db, $username){
            // return 'hola sql';
			$sql = "SELECT * FROM `users` WHERE username='$username'";
			
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        public function select_verify_email($db, $token_email){

			$sql = "SELECT email_token FROM users WHERE email_token = '$token_email'";
            $stmt = $db->ejecutar($sql);
            // return $sql;
            return $db->listar($stmt);
        } 

        public function update_verify_email($db, $token_email){

            $sql = "UPDATE users SET activated = 1, email_token= '' WHERE email_token = '$token_email'";
            // return $sql;
            $stmt = $db->ejecutar($sql);
            // return $sql;
            // return "update";
        }

    }
?>