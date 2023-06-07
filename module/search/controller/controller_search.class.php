<?php
    class controller_search {
        function brand() {
                echo json_encode(common::load_model('search_model', 'get_search_brand'));
        }

        function category_null() {
            echo json_encode(common::load_model('search_model','get_search_category_null'));
        }
        
        function category() {
            echo json_encode(common::load_model('search_model', 'get_search_category'));
        }
        function autocomplete() {
            echo json_encode(common::load_model('search_model', 'get_search_autocomplete', $_POST['sdata']));
        }
    }
?>