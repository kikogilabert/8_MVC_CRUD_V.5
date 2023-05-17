<?php
	class search_bll {
		private $dao;
		private $db;
		static $_instance;

		function __construct() {
			$this -> dao = search_dao::getInstance();
			$this -> db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		// public function get_carrusel_BLL() {
		// 	// return 'hola alberto y joan';
		// 	return $this -> dao -> select_data_carrusel($this -> db);
		// }
	}
?>