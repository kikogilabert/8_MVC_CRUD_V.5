<?php
    // include("model/connect.php");
	$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
    include($path . "model/connect.php");
    
	class DAOUser{
		function insert_cars($datos){
			// die('<script>console.log('.json_encode( $datos ) .');</script>');
			$id=$datos['id'];
        	$license_number=$datos['license_number'];
        	$brand=$datos['brand'];
        	$model=$datos['model'];
        	$car_plate=$datos['car_plate'];
        	$km=$datos['km'];
        	$category=$datos['category'];
        	$type=$datos['type'];
			$comments=$datos['comments'];
			$discharge_date=$datos['discharge_date'];
			$color=$datos['color'];
        	$extras=$datos['extras'];
        	$price=$datos['price'];
        	$doors=$datos['doors'];
        	$city=$datos['city'];
        	$lat=$datos['lat'];
        	$lng=$datos['lng'];
        	//foreach ($datos['idioma'] as $indice) {
        	    //$language=$language."$indice:";
        	//}
        	//$comment=$datos['observaciones'];
        	//foreach ($datos['aficion'] as $indice) {
        	//    $hobby=$hobby."$indice:";
        	//}
        	$sql = "INSERT INTO cars (id, license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras, price, doors, city, lat, lng)"
        		. "VALUES ('$id', '$license_number', '$brand', '$model', '$car_plate', '$km', '$category', '$type', '$comments', '$discharge_date', '$color', '$extras', '$price', '$doors', '$city', '$lat', '$lng')";
            
			// die('<script>console.log('.json_encode( $sql ) .');</script>');
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function select_all_cars(){
			// $data = 'hola DAO select_all_user';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
			$sql = "SELECT * FROM cars ORDER BY id ASC";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
			connect::close($conexion);
            return $res;
		}
		
		function select_cars($car_plate){
			// $data = 'hola DAO select_user';
            // die('<script>console.log('.json_encode( $data ) .');</script>');
			$sql = "SELECT * FROM cars WHERE car_plate='$car_plate'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            connect::close($conexion);
            return $res;
		}
		
		function update_cars($datos){
			//die('<script>console.log('.json_encode( $datos ) .');</script>');
        	$license_number=$datos['license_number'];
        	$brand=$datos['brand'];
        	$model=$datos['model'];
        	$car_plate=$datos['car_plate'];
        	$km=$datos['km'];
        	$category=$datos['category'];
        	$type=$datos['type'];
			$comments=$datos['comments'];
			$discharge_date=$datos['discharge_date'];
			$color=$datos['color'];
        	$extras=$datos['extras'];
        	$price=$datos['price'];
        	$doors=$datos['doors'];
        	$city=$datos['city'];
        	$lat=$datos['lat'];
        	$lng=$datos['lng'];
        	//foreach ($datos['idioma'] as $indice) {
        	   // $language=$language."$indice:";
        //	}
        	//$comment=$datos['observaciones'];
        	//foreach ($datos['aficion'] as $indice) {
        //	    $hobby=$hobby."$indice:";
        //	}
        	
        	$sql = " UPDATE cars SET license_number='$license_number', brand='$brand', model='$model', car_plate='$car_plate', km='$km', category='$category', type='$type', comments='$comments', discharge_date='$discharge_date', color='$color', extras='$extras',"
        		. "  price='$price', doors='$doors', city='$city', lat='$lat', lng='$lng' WHERE car_plate='$car_plate'";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
			return $res;
		}
		
		function delete_cars($car_plate){
			$sql = "DELETE FROM cars WHERE car_plate='$car_plate'";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            return $res;
		}
	
		function delete_all_cars(){
			$sql = "DELETE FROM cars";
			
			$conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);

            return $res;
		}

		function dummies_cars(){
			$sql = "DELETE FROM cars;";

			$sql.= "INSERT INTO cars (license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras, price, doors, city, lat, lng)" 
			." VALUES ('1W2D50JIL04J3L5K1', 'BMW', 'I4', '4567DAB', '0', 'KM0', 'Pertol', 'Coche nuevo y automático', '15/01/2022', 'Red', 'Navegador',  '50000€', '4', 'Oliva', '38.845643', '-4.46382154');";
			
			$sql.= "INSERT INTO cars (license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras, price, doors, city, lat, lng)" 
			." VALUES ('2OUD50JIL04J3L5G6', 'CP', 'Formentor', '7645JDH', '10000', 'Petrol', 'GS', 'Coche nuevo y automático', '26/07/2019', 'Mate Blue', 'Navegador', '32000€', '5', 'Pego', '38.845643', '-4.46382154');";

			$sql.= "INSERT INTO cars (license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras, price, doors, city, lat, lng)" 
			." VALUES ('8P9D50JIL04J3L1H7', 'FRD', 'Mustang', '6547LGM', '2000', 'SM', 'Hybrid', 'Coche nuevo y automático', '30/03/2019', 'Blue', 'Navegador', '39000€', '5', 'Piles', '38.845643', '-4.46382154');";

			$sql.= "INSERT INTO cars (license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras,  price, doors, city, lat, lng)" 
			." VALUES ('44GD50JIL04J3LH58', 'MCD', 'GLC Coupé', '9745DFM', '0', 'RT', 'Petrol', 'Coche nuevo y automático', '26/07/2019', 'Mate grey', 'Navegador', '60000€', '5', 'Miramar', '38.845643', '-4.46382154');";

			$sql.= "INSERT INTO cars (license_number, brand, model, car_plate, km, category, type, comments, discharge_date, color, extras, price, doors, city, lat, lng)" 
			." VALUES ('3J4750JIL04J3LKP4', 'AUD', 'A6', '2641FKL', '50000', 'RS', 'Hybrid', 'Coche nuevo y automático', '20/06/2017', 'White', 'Navegador', '28000€', '4', 'ElPinet', '38.845643', '-4.46382154');";
			
			$conexion = connect::con();
            $res = mysqli_multi_query($conexion, $sql);
            connect::close($conexion);

            return $res;
		}
    }
?>