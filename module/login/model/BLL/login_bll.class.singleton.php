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
			$insert_user2 = $this->dao->insert_user($this->db, $user, $hashed_pass, $email_user, $avatar, $token_email);
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
}