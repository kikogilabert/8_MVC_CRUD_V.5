<?php
class controller_login
{
    function view(){
        common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'login-register.html');
    }
    function recover_view(){
        // echo json_encode('hola recover view');
        common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'recover_pass.html');
    }
    function register(){
        echo json_encode(common::load_model('login_model', 'get_register', [$_POST['username'], $_POST['password'], $_POST['email']]));
    }

    function login(){
        echo json_encode(common::load_model('login_model', 'get_login', [$_POST['username'], $_POST['password']]));
    }

    function data_user(){
        echo json_encode(common::load_model('login_model', 'get_data_user', $_POST['token']));
    }

    function logout(){
        echo json_encode(common::load_model('login_model', 'get_logout'));
    }
    function verify_email(){
        echo json_encode(common::load_model('login_model', 'get_verify_email', $_POST['token_email']));
    }

    function actividad(){
        echo json_encode(common::load_model('login_model', 'get_actividad'));
    }


    function controluser(){
        echo json_encode(common::load_model('login_model', 'get_controluser', $_POST['token']));
    }

    function refresh_token(){
        echo json_encode(common::load_model('login_model', 'get_refresh_token', $_POST['token']));
    }
    function refresh_cookie(){
        echo json_encode(common::load_model('login_model', 'get_refresh_cookie'));
    }


    // RECOVER PASSWORD
    function send_recover_email(){
        // echo json_encode('crufsadfwa');
        echo json_encode(common::load_model('login_model', 'get_recover_email', $_POST['data']));
    }

    function verify_token(){
        // echo json_encode($_POST['token_email']);
        echo json_encode(common::load_model('login_model', 'get_verify_token', $_POST['token_email']));
    }

    function new_password(){
        // echo json_encode('dentro de new password');
        echo json_encode(common::load_model('login_model', 'get_new_password', [$_POST['token_email'], $_POST['password']]));
    }

    ///////////SOCIAL LOGIN /////////////

    function social_login(){
        // echo json_encode('hola buenas');
        echo json_encode(common::load_model('login_model', 'get_social_login', $_POST['social_user']));
    }


}
