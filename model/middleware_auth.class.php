<?php
include(MODEL_PATH . "JWT.class.php");
class middleware{
    public static function create_token($username){
        $jwt = parse_ini_file(MODEL_PATH . 'php.ini');
        $header = $jwt['header'];
        $secret = $jwt['secret'];
        $payload = '{"iat":"' . time() . '","exp":"' . time() + (600) . '","username":"' . $username . '"}';

        $JWT = new JWT;
        $token = $JWT->encode($header, $payload, $secret);
        
        return $token;
    }
    public static function decode_token($token)
    {
        // echo json_encode('jgaiowgjwai`0ogjwai`jogwa');
        // exit;
        $jwt = parse_ini_file(MODEL_PATH . 'php.ini');
        $secret = $jwt['secret'];

        $JWT = new JWT;
        $token_dec = $JWT->decode($token, $secret);
        $rt_token = json_decode($token_dec, TRUE);
        return $rt_token;
    }
}
?>
