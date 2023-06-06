<?php

    class cart_dao {
        static $_instance;

        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function select_user_cart($db, $user) {
                $sql = "SELECT * 
                FROM cart c, car cc, model m, motor_type mt
                WHERE c.car_plate= cc.car_plate AND m.cod_model = cc.model AND cc.motor_type = mt.cod_type
                AND c.id_user= (SELECT o.id_user 
                                FROM users o
                                WHERE o.username = '$user');";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }


        function insert_product($db, $id, $user){
            $sql = "INSERT INTO cart (id_user, car_plate , qty) 
            VALUES ( (SELECT u.id_user 
                        FROM users u 
                        WHERE u.username = '$user'),'$id', '1');";
            $stmt = $db -> ejecutar($sql);
        }

        function delete_cart($db, $id, $user){
            $sql = "DELETE 
                    FROM cart 
                    WHERE id_user=(SELECT id_user 
                                    FROM users u 
                                    WHERE u.username='$user') AND car_plate ='$id';";

             $stmt = $db -> ejecutar($sql);
          
        }

        function select_product($db, $user, $id){
            $sql = "SELECT * 
            FROM cart 
            WHERE car_plate = '$id' AND id_user = (SELECT u.id_user
                                                    FROM users u
                                                    WHERE u.username = '$user') ";
            $stmt = $db -> ejecutar($sql);
            return $db -> listar($stmt);
        }
    
      
    
        function update_product($db, $id, $user){
            $sql = "UPDATE cart 
            SET qty = qty+1 
            WHERE id_user = (SELECT u.id_user 
                            FROM users u
                            WHERE u.username = '$user') AND car_plate='$id';";
        $stmt = $db -> ejecutar($sql);
        }
    
        function update_qty($db, $user, $id, $qty){
            $sql = "UPDATE cart SET qty = '$qty' WHERE car_plate ='$id' AND id_user = (SELECT u.id_user FROM users u WHERE u.username = '$user');";
            $stmt = $db -> ejecutar($sql);
        }
        
       
    
        function checkout($db, $data, $user){
            $sql = "";
            $date = date('y-m-d h:i:s');
    
            foreach($data as $row){
                $car_plate = $row["car_plate"];
                $qty = $row["qty"];
                $price = $row["price"];
                $total_price = $row["price"]*$row["qty"];
    
                $sql = "INSERT INTO `orders`(`cod_user`, `car_plate`, `qty`, `price`, `total_price`, `order_date`) 
                        VALUES ((SELECT o.id_user FROM users o WHERE o.username = '$user'),'$car_plate','$qty','$price','$total_price','$date');";
                    $stmt = $db -> ejecutar($sql); 
}   
        }

    }
?>