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
        // SELECT c.car_plate, cc.model, cc.price, cc.img_car cc.km, c.qty FROM cart c, car cc WHERE c.car_plate = cc.car_plate AND user='KikoAdmin';
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);
        connect::close($conexion);
        return $res;
    }

    function update_qty($user, $id, $qty){
        $sql = "UPDATE cart SET qty = $qty WHERE user='$user' AND codigo_producto='$id'";
        $conexion = connect::con();
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
        $name = md5($user);
        $date = date("Ymd");
        foreach($data as $fila){
            $cod_ped = $user;
            $cod_prod = $fila["codigo_producto"];
            $talla = $fila["talla"];
            $cantidad = $fila["qty"];
            $precio = $fila["precio"];
            $total_precio = $fila["precio"]*$fila["qty"];

            $sql = "INSERT INTO `pedidos`(`cod_ped`, `user`, `cod_prod`, `talla`, `cantidad`, `precio`, `total_precio`, `fecha`) 
                    VALUES ('$cod_ped','$user','$cod_prod','$talla','$cantidad','$precio','$total_precio','$date')";
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion); 
        }
        return $res;
    }
}

?>