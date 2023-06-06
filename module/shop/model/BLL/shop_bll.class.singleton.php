<?php
    // include( DAO_HOME . "home_dao.class.singleton.php");

	class shop_bll {
		private $dao;
		private $db;
		static $_instance;

		function __construct() {
			$this -> dao = shop_dao::getInstance();
			$this -> db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function get_allcars_BLL($args) {
			return $this -> dao -> select_data_all_cars($this -> db, $args[0],$args[1] );
		}

		public function get_details_BLL($args) {
			$info = array();
			$info[0] = $this -> dao -> select_data_details_car($this -> db , $args);
			$info[1][] =  $this -> dao -> select_photo_details_car($this -> db , $args);

			

			return $info;
		}

		public function get_filters_BLL($args) {
			return $this -> dao -> select_data_filters($this -> db, $args[0], $args[1], $args[2]);
		}




		public function get_count_BLL() {
			return $this -> dao -> select_data_count($this -> db);
		}

		public function get_count_filters_home_BLL($args) {
			return $this -> dao -> select_data_count_filters($this -> db, $args);
		}


		public function get_count_filters_shop_BLL($args) {
			return $this -> dao -> select_data_count_filters($this -> db, $args);
		}


		public function get_count_filters_search_BLL($args) {
			return $this -> dao -> select_data_count_filters($this -> db, $args);
		}

		public function get_visitorcount_BLL($args){
			return $this -> dao -> select_data_visitor_counter($this -> db, $args);
		}
		public function get_count_cars_related_BLL($args) {
			return $this -> dao -> select_data_more_count_cars_related($this -> db, $args);
		}

		public function get_cars_related_BLL($args) { 
			return $this -> dao -> select_data_cars_related($this -> db, $args[0], $args[1], $args[2]);
		}

		public function get_load_likes_user_BLL($token) {
			$check = middleware::decode_token($token);
			return $this -> dao -> select_load_likes($this -> db, $check['username']);
		}

	
	public function get_control_likes_BLL($args) {
		$token=$args[1];
		$id=$args[0];
		if ($token){
			$check = middleware::decode_token($token);
				if (empty( $this -> dao ->select_likes($this->db, $id, $check['username']))) {
						$this -> dao -> like($this -> db, $id, $check['username']);
						return 'like';
				}else{   
						$this -> dao -> dislike($this -> db, $id, $check['username']);     
						return 'dislike';
					}
			}
			
		}  
	}
?>