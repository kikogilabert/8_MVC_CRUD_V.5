<?php
class login_bll
{
	private $dao;
	private $db;
	private $middleware;
	static $_instance;

	function __construct()
	{
		$this->dao = login_dao::getInstance();
		$this->db = db::getInstance();
	}

	public static function getInstance()
	{
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function get_register_BLL($user, $password, $email_user)
	{

		if (!empty($this->dao->select_username($this->db, $user))) {
			return 'error_user';
		} elseif (!empty($this->dao->select_email($this->db, $email_user))) {
			return 'error_email';
		} else {
			$hashed_pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
			$hashavatar = md5(strtolower(trim($user)));
			$avatar = "https://placeimg.com/400/400/$hashavatar";
			$token_email = common::generate_Token_secure(20);
			$this->dao->insert_user($this->db, $user, $hashed_pass, $email_user, $avatar, $token_email);
			$message = [
				'type' => 'validate',
				'token' => $token_email,
				'toEmail' => $email_user
			];
			$email = mail::send_email($message);
		}
	}

	public function get_login_BLL($user, $pass){
		if ($rdo = $this->dao->select_user($this->db, $user)) {
			if ($rdo[0]['activated'] == 1) {
				if (password_verify($pass, $rdo[0]['password'])) {
					$_SESSION['username'] = $rdo[0]['username'];
					$_SESSION['tiempo'] = time();
					return middleware::create_token($rdo[0]['username']);
				} else {
					return "error_passwd";
				}
			} else {
				return "error_activated";
			}
		} else {
			return "error_user";
		}

	}


	public function get_data_user_BLL($token){
		$check = middleware::decode_token($token);
		if ($check['exp'] == null || $check['exp'] < time()) {
			return "Tiempo excedido";
		} else {
			return $this->dao->select_user($this->db, $check['username']);
		}
	}



	public function get_logout_BLL()
	{
		setcookie("PHPSESSID", "", time() - 3600, '/');
		unset($_SESSION['username']);
		unset($_SESSION['tiempo']);
		session_destroy();
		return 'completado';
	}

	public function get_verify_email_BLL($token)
	{
		if ($this->dao->select_verify_email($this->db, $token)) {

			$this->dao->update_verify_email($this->db, $token);
			return 'validacion completada';
		} else {
			return 'fail';
		}
	}

	public function get_controluser_BLL($token){
		$check = middleware::decode_token($token);
        if ($check['exp'] < time()) {
            return "Wrong_User";
            
        }

        if (isset($_SESSION['username']) && ($_SESSION['username']) == $check['username']) {
			return"Correct_User";
        } else {
			return"Wrong_User";
        }
	}
	public function get_actividad_BLL(){
		if (!isset($_SESSION["tiempo"])) {
			return "inactivo";
        } else {
            if ((time() - $_SESSION["tiempo"]) >= 1800) { //1800s=30min
				return "inactivo";
            } else {
                return "activo";
            }
        }
	}
	public function get_refresh_token_BLL($token){
		$old_token = middleware::decode_token($token);
        $new_token = middleware::create_token($old_token['username']);
		return $new_token;
		
	}

	public function get_refresh_cookie_BLL(){
		session_regenerate_id();
        return 'Done';
	}

	public function get_recover_email_BBL($args) {

		$user = $this -> dao -> select_recover_password($this->db, $args);

		if (!empty($user)) {
			$token = common::generate_Token_secure(20);
			$this -> dao -> update_recover_password($this->db, $args, $token);
			
			$message = ['type' => 'recover', 
						'token' => $token, 
						'toEmail' => $args];
			$email = json_decode(mail::send_email($message), true);
			if (!empty($email)) {
				return 'okkkkk';  
			}   
		}else{
			return 'error';
		}
	}

	public function get_verify_token_BLL($args) {
		if( $this -> dao -> select_verify_email($this->db, $args)){
			return 'verified';
		}
		return 'fail';
	}

	public function get_new_password_BLL($args) {
			$old_password = $this -> dao -> compare_password($this->db, $args[0]);
				if (password_verify($args[1], $old_password[0]['password'])) {
				return 'same';
			}else{ 
				$hashed_pass = password_hash($args[1], PASSWORD_DEFAULT, ['cost' => 12]);
				$password = $this -> dao -> update_new_password($this->db, $args[0], $hashed_pass);
				return $password;
			}	
	}
	
	public function get_social_login_BLL($args) {
		$rdo = $this -> dao -> select_social_login($this->db, $args['id']);
		if (!empty($rdo)) {
			$token= middleware::create_token($rdo[0]['username']);
			return $token;
		}
		else {
			$this -> dao -> insert_social_login($this->db, $args['id'], $args['username'], $args['email'], $args['avatar']);
			$user = $this -> dao -> select_social_login($this->db, $args['id']);
			$token=  middleware::create_token($user[0]["username"]);
			return $token;
		}
}
}