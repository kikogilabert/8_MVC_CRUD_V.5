<?php
    class controller_shop {
        function view() {
            // echo 'holaaaa';
            common::load_view('top_page_shop.html', VIEW_PATH_SHOP . 'shop.html');
        }
        function allcars() {
            // echo json_encode('dentro de allcarssss controllerrrrr');
                echo json_encode(common::load_model('shop_model', 'get_allcars', [$_POST['total_prod'], $_POST['items_page']]));

        }
        function details_car() {
            // echo json_encode('Hola CATEGORY');
            echo json_encode(common::load_model('shop_model', 'get_details', $_POST['car_plate']));
        }
        
        function filters() {
            // echo json_encode($_POST['filter']);
            echo json_encode(common::load_model('shop_model', 'get_filters', [$_POST['filter'], $_POST['total_prod'], $_POST['items_page']]));
        }
        function visitor_counter() {
            // echo json_encode('Hola visitor_counter');
            echo json_encode(common::load_model('shop_model', 'get_visitorcount', $_POST['id_car']));
        }

        function count_cars_related() { 
            // echo json_encode($_POST['type_car']);
            echo json_encode(common::load_model('shop_model', 'get_count_cars_related', $_POST['type_car']));
        }
        function cars_related() {
            // echo json_encode($_POST['items']);
            echo json_encode(common::load_model('shop_model', 'get_cars_related', [$_POST['type'], $_POST['loaded'], $_POST['items']]));
        }
        function count_filters() {
            // echo json_encode('Hola count');
            echo json_encode(common::load_model('shop_model', 'get_count'));
        }
        function count_filters_home() {
            // echo json_encode('Hola count_filters_home');
            echo json_encode(common::load_model('shop_model', 'get_count_filters_home', $_POST['filter_home']));
        }
        function count_filters_shop() {
            // echo json_encode('Hola count_filters_shop');
            echo json_encode(common::load_model('shop_model', 'get_count_filters_shop', $_POST['filter']));
        }
        function count_filters_search() {
            // echo json_encode('Hola count_filters_search');
            echo json_encode(common::load_model('shop_model', 'get_count_filters_search', $_POST['filter_search']));
        }
        function control_likes() {
            // echo json_encode('Hola control_likes');
            echo json_encode(common::load_model('shop_model', 'get_control_likes', [$_POST['id_car'], $_POST['token']]));
        }
        function load_likes_user() {
            // echo json_encode('Hola load_likes_user');
            echo json_encode(common::load_model('shop_model', 'get_load_likes_user',  $_POST['token']));
        }

    }
?>