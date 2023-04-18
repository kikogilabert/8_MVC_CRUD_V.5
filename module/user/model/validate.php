<?php
    function validate_license_number($license_number){

        $mysqli = "SELECT * FROM cars WHERE license_number='$license_number'";
    
        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }

    function validate_car_plate($car_plate){

        $mysqli = "SELECT * FROM cars WHERE car_plate='$car_plate'";
    
        $conexion = connect::con();
        $res = mysqli_query($conexion, $mysqli);
        $res = mysqli_num_rows($res);
        connect::close($conexion);

        return $res;
    }
    
    function validate() {

        // $data = 'hola validate php';
        // die('<script>console.log('.json_encode( $data ) .');</script>');

        $check = true;
        
        $v_license = $_POST['license_number'];
        $v_carplate = $_POST['car_plate'];

        $r_license = validate_license_number($v_license);
        $r_carplate = validate_car_plate($v_carplate);

        if($r_license === 1){
            echo '<script language="javascript">toastr.error("El número de bastidor no puede estar repetido");</script>';
            $check = false;
        }

        if($r_carplate === 1){
            echo '<script language="javascript">toastr.error("La matrícula no puede estar repetida");</script>';
            $check = false;
        }

        return $check;
    }
