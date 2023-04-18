<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
include($path . "/model/connect.php");

class DAO_shop{
	function select_all_cars($total_prod, $items_page){
		$sql = "SELECT c.* , m.name_model, mt.desc_type, b.cod_brand 
				FROM car c, model m , motor_type mt, brand b
				WHERE c.model = m.cod_model
				AND c.motor_type = mt.cod_type
				AND b.cod_brand = m.cod_brand
				ORDER BY c.visit_count DESC";
			$sql.= " LIMIT $total_prod, $items_page";

		// echo json_encode($sql);
		// exit;

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
	function count_visits($id){
		$sql = "UPDATE car c 
				SET c.visit_count = c.visit_count + 1
				WHERE car_plate = '$id';";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);

		return $res;

	}


	function select_one_car($id){
		$sql = "SELECT *
		FROM car c, model m, motor_type t, category ca
		WHERE c.car_plate = '$id'
		AND  c.model = m.cod_model
		AND c.category = ca.cod_cat
		AND c.motor_type = t.cod_type";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);

		return $res;
	}

	function select_imgs_car($id){
		$sql = "SELECT *
				FROM img i
				WHERE i.car_plate = '$id';";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$imgArray = array();
		if (mysqli_num_rows($res) > 0) {
			foreach ($res as $row) {
				//  console.log($imgArray);
				array_push($imgArray, $row);

			}
		}
		return $imgArray;
	}
function filters($filter, $total_prod, $items_page){
// echo json_encode($filter, $total_prod, $items_page);
// exit;

$consulta ="SELECT c.* 
				FROM (SELECT cc.* , m.name_model, mt.desc_type, b.cod_brand, cat.name_cat 
					FROM car cc, model m , motor_type mt, brand b, category cat 
					WHERE cc.model = m.cod_model 
					AND cc.category = cat.cod_cat 
					AND cc.motor_type = mt.cod_type 
					AND b.cod_brand = m.cod_brand) AS c";
			for ($i=0; $i < count($filter); $i++){
                if ($i==0){
                    if ($filter[$i][0] == 'order'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " DESC";

                    }else{
						$consulta.= " WHERE c." . $filter[$i][0] . " LIKE '" . $filter[$i][1] ."'";
                    }
                }else {
                    if ($filter[$i][0] == 'order'){
                        $consulta.= " ORDER BY " . $filter[$i][1] . " DESC";

                    }else{
						$consulta.= " AND c." . $filter[$i][0] . " LIKE '" . $filter[$i][1] ."'";
					}
                }        
            }
			$consulta.= " LIMIT $total_prod, $items_page";
		// echo json_encode($consulta);
		// exit;



	$conexion = connect::con();
	$res = mysqli_query($conexion, $consulta);
	connect::close($conexion);

	$retrArray = array();
	if ($res -> num_rows > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$retrArray[] = $row;
		}
	}
	return $retrArray;
}


function select_count(){
	$select = "SELECT COUNT(*) counts
	FROM car";

	$conexion = connect::con();
	$res = mysqli_query($conexion, $select);
	connect::close($conexion);

	$retrArray = array();
	if ($res -> num_rows > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$retrArray[] = $row;
		}
	}
	return $retrArray;
}




function select_count_filter($filter){
	// echo json_encode($filter);
    // exit;
	$consulta = "SELECT COUNT(*) counts
				FROM (SELECT cc.* , m.name_model, mt.desc_type, b.cod_brand, cat.name_cat 
					FROM car cc, model m , motor_type mt, brand b, category cat 
					WHERE cc.model = m.cod_model 
					AND cc.category = cat.cod_cat 
					AND cc.motor_type = mt.cod_type 
					AND b.cod_brand = m.cod_brand) AS c";
		for ($i=0; $i < 1; $i++){
			// echo json_encode(count($filter));
			// exit;
			if ($i==0){
				if ($filter[$i][0] == 'order'){
					$consulta.= " ORDER BY " . $filter[$i][1] . " DESC";

				}else{
					$consulta.= " WHERE c." . $filter[$i][0] . " LIKE '" . $filter[$i][1] ."'";
				}
			}else {
				if ($filter[$i][0] == 'order'){
					$consulta.= " ORDER BY " . $filter[$i][1] . " DESC";

				}else{
					$consulta.= " AND c." . $filter[$i][0] . " LIKE '" . $filter[$i][1] ."'";
				}
			}        
		}
	// echo json_encode($consulta);
	// exit;
	$conexion = connect::con();
	$res = mysqli_query($conexion, $consulta);
	connect::close($conexion);

	$retrArray = array();
	if ($res -> num_rows > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$retrArray[] = $row;
		}
	}
	return $retrArray;
}


/////////////////////////
// MORE CARS RELATED
function count_more_cars_related($type_car){
	$sql = "SELECT COUNT(*) AS n_prod
			FROM car c 
			WHERE c.motor_type = '$type_car'";

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

function select_cars_related($type, $loaded, $items){
	$sql = "SELECT * 
			FROM car c, model m
			WHERE c.model = m.cod_model
			AND c.motor_type = '$type'
			LIMIT $loaded, $items";

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


// LIKES
function select_load_likes($username){
	$sql = "SELECT l.car_plate FROM likes l WHERE l.id_user = (SELECT u.id_user FROM users u WHERE u.username = '$username');";
	$conexion = connect::con();
	$res = mysqli_query($conexion, $sql);
	connect::close($conexion);
	// echo json_encode($sql);
	// exit;
	return $res;
}

function select_likes($id_car, $username){
	$sql = "SELECT i.car_plate FROM likes i
		WHERE i.id_user = (SELECT u.id_user FROM users u WHERE u.username LIKE '$username')
		AND i.car_plate = '$id_car';";
	// echo json_encode($sql);
	// exit;
	$conexion = connect::con();
	$res = mysqli_query($conexion, $sql);
	connect::close($conexion);
	
	return $res;
}

function like($id_car, $username){
	$sql = "INSERT INTO likes (id_user, car_plate) VALUES ((SELECT  u.id_user FROM users u WHERE u.username= '$username') ,'$id_car');";
	$conexion = connect::con();
$res = mysqli_query($conexion, $sql);
	connect::close($conexion);
	return $res;
}

function dislike($id_car, $username){
	$sql = "DELETE FROM likes WHERE car_plate='$id_car' AND id_user=(SELECT u.id_user FROM users u WHERE u.username= '$username');";
	$conexion = connect::con();
	$res = mysqli_query($conexion, $sql);
	connect::close($conexion);
	return $res;
}
}








