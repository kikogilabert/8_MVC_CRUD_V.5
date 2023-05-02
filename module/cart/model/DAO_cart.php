<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
include($path . "/model/connect.php");   

class DAO_cart{

    function select_product($user, $id){
        // echo json_encode($user);
        // echo json_encode($id);
        // exit;
        $sql = "SELECT * 
        FROM cart 
        WHERE car_plate = '$id' AND id_user = (SELECT u.id_user
                                                FROM users u
                                                WHERE u.username = '$user') ";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function insert_product($user, $id){
        // echo json_encode($user);
        // exit;
        $sql = "INSERT INTO cart (id_user, car_plate , qty) 
        VALUES ( (SELECT u.id_user 
                    FROM users u 
                    WHERE u.username = '$user'),'$id', '1');";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function update_product($user, $id){
        $sql = "UPDATE cart 
        SET qty = qty+1 
        WHERE id_user = (SELECT u.id_user 
                        FROM users u
                        WHERE u.username = '$user') AND car_plate='$id';";
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function select_user_cart($user){
        $sql = "SELECT * 
        FROM cart c, car cc, model m, motor_type mt
        WHERE c.car_plate= cc.car_plate AND m.cod_model = cc.model AND cc.motor_type = mt.cod_type
        AND c.id_user= (SELECT o.id_user 
                        FROM users o
                        WHERE o.username = '$user');";
                // echo json_encode($sql);
                // exit;
        // SELECT c.car_plate, cc.model, cc.price, cc.img_car cc.km, c.qty FROM cart c, car cc WHERE c.car_plate = cc.car_plate AND user='KikoAdmin';
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function update_qty($user, $id, $qty){
        $sql = "UPDATE cart SET qty = '$qty' WHERE car_plate ='$id' AND id_user = (SELECT u.id_user FROM users u WHERE u.username = '$user');";
        $conexion = connect::con();
        //  echo json_encode($sql);
        // exit;
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }
    
    function delete_cart($user, $id){
        $sql = "DELETE 
                FROM cart 
                WHERE id_user=(SELECT id_user 
                                FROM users u 
                                WHERE u.username='$user') AND car_plate ='$id';";
        // echo json_encode($sql);
        // exit;
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }
    // 

    function checkout($data, $user){
        $sql = "";
        $date = date('y-m-d h:i:s');
        $conexion = connect::con();

        foreach($data as $row){
            // $cod_ped = $user;
            $car_plate = $row["car_plate"];
            $qty = $row["qty"];
            $price = $row["price"];
            $total_price = $row["price"]*$row["qty"];

            $sql = "INSERT INTO `orders`(`cod_user`, `car_plate`, `qty`, `price`, `total_price`, `order_date`) 
                    VALUES ((SELECT o.id_user FROM users o WHERE o.username = '$user'),'$car_plate','$qty','$price','$total_price','$date');";
            $res = mysqli_query($conexion, $sql);
}
        connect::close($conexion);
        // echo json_encode($sql);
        // exit;
        return $res;
    }
}
?>