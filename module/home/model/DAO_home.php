<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
	include($path . "/model/connect.php");
    
	class DAOHome {
		function select_brand() {	
			$sql= "SELECT * FROM `brand` ORDER BY cod_brand ASC LIMIT 15;";
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

			$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}

		function select_hottest_cars() {
			$sql= "SELECT c.img_car, c.car_plate, m.cod_brand, m.name_model 
					FROM car c, model m 
					WHERE c.model = m.cod_model 
					ORDER BY c.visit_count DESC;";
			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

			$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}

		function select_categories() {
			$sql= "SELECT * FROM category";

			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

			$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}

		function select_motor_type() {
			$sql= "SELECT *FROM motor_type ORDER BY cod_type DESC";

			$conexion = connect::con();
			$res = mysqli_query($conexion, $sql);
			connect::close($conexion);

			$retrArray = array();
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$retrArray[] = $row;
				}
			}
			return $retrArray;
		}
	
		
	}