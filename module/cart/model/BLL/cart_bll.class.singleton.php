<?php

	class cart_bll {
		private $dao;
		private $db;
		static $_instance;

		function __construct() {
			$this -> dao = cart_dao::getInstance();
			$this -> db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function get_load_cart_BLL($token) {
			$check = middleware::decode_token($token);
			return $this -> dao -> select_user_cart($this -> db, $check['username']);
		}

		public function  get_insert_cart_BLL($args) {
			$check = middleware::decode_token($args[0]);
				if (empty( $this -> dao ->select_product($this->db,$check['username'], $args[1]))) {
					$this -> dao -> insert_product($this -> db, $args[1], $check['username']);
					return 'insert';
			}else{   
					$this -> dao -> update_product($this -> db, $args[1], $check['username']);     
					return 'update';
				}
		}

		public function get_remove_product_BLL($args) {
			$check = middleware::decode_token($args[0]);
			return $this -> dao -> delete_cart($this -> db, $args[1], $check['username']);
		}
		public function get_update_qty_BLL($args) {
			$check = middleware::decode_token($args[0]);
			$this -> dao -> update_qty($this -> db, $check['username'], $args[1], $args[2]);
			return 'updated';
		}
		
		public function get_checkout_BLL($token) {
			$check = middleware::decode_token($token);
			$data = $this -> dao -> select_user_cart($this -> db, $check['username']);
			if ($data){
				$this -> dao -> checkout($this -> db, $data, $check['username'] );
				return 'checkout_finished';
			}
		}
	}
?>