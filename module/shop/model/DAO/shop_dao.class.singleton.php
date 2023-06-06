<?php
    class shop_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function select_data_all_cars($db, $total_prod, $items_page) {
                $sql = "SELECT c.* , m.name_model, mt.desc_type, b.cod_brand 
                        FROM car c, model m , motor_type mt, brand b
                        WHERE c.model = m.cod_model
                        AND c.motor_type = mt.cod_type
                        AND b.cod_brand = m.cod_brand
                        ORDER BY c.visit_count DESC";
                    $sql.= " LIMIT $total_prod, $items_page";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
    }

        public function select_data_details_car($db, $id) {
            $sql = "SELECT *
            FROM car c, model m, motor_type t, category ca
            WHERE c.car_plate = '$id'
            AND  c.model = m.cod_model
            AND c.category = ca.cod_cat
            AND c.motor_type = t.cod_type";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        function select_photo_details_car($db,$id){
            $sql = "SELECT *
                    FROM img i
                    WHERE i.car_plate = '$id';";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
                    ;
        }

        public function select_data_filters($db, $filter, $total_prod, $items_page) {
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
            $stmt = $db -> ejecutar($consulta);
            return $db -> listar($stmt);
        }


        public function select_data_visitor_counter($db, $id) {
            $sql = "UPDATE car c 
            SET c.visit_count = c.visit_count + 1
            WHERE car_plate = '$id';";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }

        public function select_data_more_count_cars_related($db, $type_car) {
            $sql = "SELECT COUNT(*) AS n_prod
			FROM car c 
			WHERE c.motor_type = '$type_car'";


            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }
        public function select_data_cars_related($db, $type, $loaded, $items ) {
            $sql = "SELECT * 
			FROM car c, model m
			WHERE c.model = m.cod_model
			AND c.motor_type = '$type'
			LIMIT $loaded, $items";

            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }
        public function select_data_count($db) {
            $sql = "SELECT COUNT(*) counts
            FROM car";        
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }
        public function select_data_count_filters($db, $filter) {
            $consulta = "SELECT COUNT(*) counts
				FROM (SELECT cc.* , m.name_model, mt.desc_type, b.cod_brand, cat.name_cat 
					FROM car cc, model m , motor_type mt, brand b, category cat 
					WHERE cc.model = m.cod_model 
					AND cc.category = cat.cod_cat 
					AND cc.motor_type = mt.cod_type 
					AND b.cod_brand = m.cod_brand) AS c";
		for ($i=0; $i < 1; $i++){
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
            $stmt = $db -> ejecutar($consulta);
            return $db -> listar($stmt);
        }
// // LIKES
function select_load_likes($db, $username){
	$sql = "SELECT l.car_plate FROM likes l WHERE l.id_user = (SELECT u.id_user FROM users u WHERE u.username = '$username');";
    $stmt = $db -> ejecutar($sql);
    return $db -> listar($stmt);
}

function select_likes($db, $id_car, $username){
	$sql = "SELECT i.car_plate FROM likes i
		WHERE i.id_user = (SELECT u.id_user FROM users u WHERE u.username LIKE '$username')
		AND i.car_plate = '$id_car';";

	$stmt = $db -> ejecutar($sql);
    return $db -> listar($stmt);
}

function like($db, $id_car, $username){
	$sql = "INSERT INTO likes (id_user, car_plate) 
        VALUES ((SELECT  u.id_user FROM users u WHERE u.username= '$username') ,'$id_car');";

    $stmt = $db -> ejecutar($sql);

}

function dislike($db, $id_car, $username){
	$sql = "DELETE FROM likes WHERE car_plate='$id_car' 
    AND id_user=(SELECT u.id_user FROM users u WHERE u.username= '$username');";
    $stmt = $db -> ejecutar($sql);
    }
}
?>