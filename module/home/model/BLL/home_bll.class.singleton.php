<?php
    // include( DAO_HOME . "home_dao.class.singleton.php");

	class home_bll {
		private $dao;
		private $db;
		static $_instance;

		function __construct() {
			$this -> dao = home_dao::getInstance();
			$this -> db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function get_carrusel_BLL() {
			// return 'hola alberto y joan';
			return $this -> dao -> select_data_carrusel($this -> db);
		}

		public function get_category_BLL() {
			return $this -> dao -> select_data_category($this -> db);
		}

		public function get_type_BLL() {
			// return 'type bblblblblblblbl';
			return $this -> dao -> select_data_type($this -> db);
		}
		public function get_mostvisited_BLL() {
			// return 'type bblblblblblblbl';
			return $this -> dao -> select_most_visited($this -> db);
		}
	}
?>