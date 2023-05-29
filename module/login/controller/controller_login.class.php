<?php
    class controller_login {
        function view() {
            // echo VIEW_PATH_HOME;
            common::load_view('top_page_login.html', VIEW_PATH_LOGIN . 'login-register.html');
        }

        function register() {
            // echo json_encode($_POST['email']);
            echo json_encode(common::load_model('login_model', 'get_register', [$_POST['username'], $_POST['password'], $_POST['email']]));
            // echo json_encode(common::load_model('shop_model', 'get_allcars', [$_POST['total_prod'], $_POST['items_page']]));
        }

        function login() {
            echo json_encode(common::load_model('login_model', 'get_login', [$_POST['username'], $_POST['password']]));
        }
        // function verify_email() {
        //     echo json_encode(common::load_model('login_model', 'get_verify_email', $_POST['token_email_verify'], $_POST['type']));
        // }


        function data_user() {
            echo json_encode(common::load_model('login_model', 'get_data_user', $_POST['token']));
        }

        function logout() {
            echo json_encode(common::load_model('login_model', 'get_logout'));
        }
        function verify_email() {
            // echo json_encode($_POST['token_email']);
            echo json_encode(common::load_model('login_model', 'get_verify_email', $_POST['token_email']));
        }
        
        function actividad() {
            echo json_encode(common::load_model('login_model', 'get_actividad'));
        }
       

    //     function controluser() {
    //         echo json_encode(common::load_model('login_model', 'get_controluser'));
    //     }

    //     function refresh_token() {
    //         echo json_encode(common::load_model('login_model', 'get_refresh_token'));
    //     }

    //     function refresh_session() {
    //         echo json_encode(common::load_model('login_model', 'get_refresh_session'));
    //     }

    //     function delete_session() {
    //         echo json_encode(common::load_model('login_model', 'get_delete_session'));
    //     }
        
    //     function recovery_pass() {
    //         echo json_encode(common::load_model('login_model', 'get_recovery_pass', $_POST['email_recovery'], $_POST['passwd_recovery']));
    //     }

    //     function social_singin() {
    //         echo json_encode(common::load_model('login_model', 'get_social_singin', [$_POST['username'], $_POST['email'], $_POST['user_id']]));
    //     }
    }
?>