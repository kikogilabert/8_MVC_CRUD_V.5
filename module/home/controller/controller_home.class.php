<?php
    class controller_home {
        function view() {
            // echo VIEW_PATH_HOME;
            common::load_view('top_page_home.html', VIEW_PATH_HOME . 'home.html');
        }

        function carrusel() {
            // echo json_encode('dentro de carrusel');
                echo json_encode(common::load_model('home_model', 'get_carrusel'));
        }

        function category() {
            
            // echo json_encode('Hola CATEGORY');
            echo json_encode(common::load_model('home_model', 'get_category'));
        }
        
        function type() {
            // echo json_encode('Hola type');
            echo json_encode(common::load_model('home_model', 'get_type'));
        }
        function most_visited() {
            // echo json_encode('Hola type');
            echo json_encode(common::load_model('home_model', 'most_visited'));
        }
    }
?>