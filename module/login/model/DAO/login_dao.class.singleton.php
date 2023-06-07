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
			$sql = "SELECT email FROM users WHERE email='$email' AND uid= ''";
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
        }

        function select_user($db, $username){
			$sql = "SELECT * FROM `users` WHERE username='$username'";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        public function select_verify_email($db, $token_email){

			$sql = "SELECT email_token FROM users WHERE email_token = '$token_email'";
            return $sql;
        } 

        public function update_verify_email($db, $token_email){

            $sql = "UPDATE users SET activated = 1, email_token= '' WHERE email_token = '$token_email'";
            $stmt = $db->ejecutar($sql);
        }
        public function select_recover_password($db, $email){
			$sql = "SELECT email FROM users WHERE email = '$email' AND password NOT LIKE ('')";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }
        public function update_recover_password($db, $email, $token_email){
			$sql = "UPDATE users SET email_token = '$token_email' WHERE email = '$email'";
            $stmt = $db->ejecutar($sql);
            return "ok";
        }
        public function update_new_password($db, $token_email, $password){
            $sql = "UPDATE `users` SET `password`= '$password', `email_token`= '' WHERE `email_token` = '$token_email'";
            $stmt = $db->ejecutar($sql);
            return "done";
        }

        public function compare_password($db, $token_email){
            $sql = "SELECT password FROM users WHERE `email_token` = '$token_email'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        // SOCIAL LOGIN

        public function select_social_login($db, $id){
            $sql = "SELECT * FROM users WHERE uid='$id'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function insert_social_login($db, $id, $username, $email, $avatar){
            $sql ="INSERT INTO users (username, password, email, type_user, avatar, email_token, activated, uid)     
                    VALUES ('$username', '', '$email', 'client', '$avatar', '', 1, '$id')";
            return $stmt = $db->ejecutar($sql);
        }
    }
?>