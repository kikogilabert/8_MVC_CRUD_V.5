<?php   
    $path = $_SERVER['DOCUMENT_ROOT'] . '/8_MVC_CRUD_V.5/';
    include($path . "utils/common.inc.php");
    include($path . "utils/mail.inc.php");
    include($path . "./paths.php");
    require 'autoload.php';

    ob_start();
    session_start();

    class router {
        private $uriModule;
        private $uriFunction;
        private $nameModule;
        static $_instance;
        
        public static function getInstance() {      /// Crea el constructor si no exixte
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
    
        function __construct() {   
            if(isset($_GET['module'])){
                $this -> uriModule = $_GET['module'];
            }else{
                $this -> uriModule = 'home';
            }
            if(isset($_GET['op'])){
                $this -> uriFunction = ($_GET['op'] === "") ? 'view' : $_GET['op'];
            }else{
                $this -> uriFunction = 'view';
            }
        }
    
        function routingStart() {
            try {
                call_user_func(array($this -> loadModule(), $this -> loadFunction()));
            }catch(Exception $e) {
                echo "error222222222";
            }
        }
        
        private function loadModule() {
            if (file_exists('resources/modules.xml')) {
                $modules = simplexml_load_file('resources/modules.xml');
                // die('<script>console.log('.json_encode( 'load module' ) .');</script>');
                foreach ($modules as $row) {
                    if (in_array($this -> uriModule, (Array) $row -> uri)) {
                        $path = 'module/' . $row -> name . '/controller/controller_' . (String) $row -> name . '.class.php';
                        // return $path;
                        if (file_exists($path)) {
                            require_once($path);
                            $controllerName = 'controller_' . (String) $row -> name;
                            $this -> nameModule = (String) $row -> name;
                            return new $controllerName;
                        }
                    }
                }
            }
            throw new Exception('Not Module found.');
        }
        
        private function loadFunction() {
            $path = 'module/' . $this -> nameModule . '/resources/function.xml'; 
            if (file_exists($path)) {
                $functions = simplexml_load_file($path);
                foreach ($functions as $row) {
                    if (in_array($this -> uriFunction, (Array) $row -> uri)) {
                        return (String) $row -> name;
                    }
                }
            }
            throw new Exception('Not Function found.');
            // return "view";
        }
    }
    
    router::getInstance() -> routingStart();