<?php
    define('PROJECT', '/8_MVC_CRUD_V.5/');

    //SITE_ROOT
    define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);
    
    //SITE_PATH
    define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);
    
    //PRODUCTION
    define('PRODUCTION', true);
    
    //MODEL
    define('MODEL_PATH', SITE_ROOT . 'model/');
    
    //MODULES
    define('MODULES_PATH', SITE_ROOT . 'module/');
    
    //RESOURCES
    define('RESOURCES', SITE_ROOT . 'resources/');
    
    //UTILS
    define('UTILS', SITE_ROOT . 'utils/');

    //VIEW
    define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');

    //CSS
    define('CSS_PATH', SITE_ROOT . 'view/assets/css/');
    
    //JS
    define('JS_PATH', SITE_ROOT . 'view/js/');
    
    //IMG
    define('IMG_PATH', SITE_ROOT . 'view/img/');
    
    //MODEL_HOME
    define('BLL_HOME', SITE_ROOT . 'module/home/model/BLL/');
    define('DAO_HOME', SITE_ROOT . 'module/home/model/DAO/');
    define('CTRL_HOME', SITE_ROOT . 'module/home/ctrl/');
    define('MODEL_HOME', SITE_ROOT . 'module/home/model/model/');
    define ('VIEW_PATH_HOME', SITE_ROOT . 'module/home/view/');

    //MODEL_SEARCH
    define('CTRL_SEARCH', SITE_ROOT . 'module/search/ctrl/');
    define('MODEL_SEARCH', SITE_ROOT . 'module/search/model/model/');
    define ('VIEW_PATH_SEARCH', SITE_ROOT . 'module/search/view/');
    define('JS_VIEW_SEARCH', SITE_PATH . 'module/search/view/js/');

    //MODEL_SHOP
    define('BLL_SHOP', SITE_ROOT . 'module/shop/model/BLL/');
    define('DAO_SHOP', SITE_ROOT . 'module/shop/model/DAO/');
    define('CTRL_SHOP', SITE_ROOT . 'module/shop/ctrl/');
    define('MODEL_SHOP', SITE_ROOT . 'module/shop/model/model/');
    define ('VIEW_PATH_SHOP', SITE_ROOT . 'module/shop/view/');
    define('JS_VIEW_SHOP', SITE_PATH . 'module/shop/view/js/');
    define('VIEW_GLIDER_SHOP', SITE_PATH . 'view/glider/');
    
    //MODEL_CONTACT
    define('MODEL_CONTACT', SITE_ROOT . 'module/contact/model/model/');
    define('JS_VIEW_CONTACT', SITE_PATH . 'module/contact/view/');
    define ('VIEW_PATH_CONTACT', SITE_ROOT . 'module/contact/view/');
    
    // //MODEL_CART
    define('DAO_CART', SITE_ROOT . 'module/cart/model/DAO/');
    define('BLL_CART', SITE_ROOT . 'module/cart/model/BLL/');
    define('MODEL_CART', SITE_ROOT . 'module/cart/model/model/');
    define('JS_VIEW_CART', SITE_PATH . 'module/cart/view/js/');
    define ('VIEW_PATH_CART', SITE_ROOT . 'module/cart/view/');
    
    //MODEL_LOGIN
    define('BLL_LOGIN', SITE_ROOT . 'module/login/model/BLL/');
    define('DAO_LOGIN', SITE_ROOT . 'module/login/model/DAO/');
    define('CTRL_LOGIN', SITE_ROOT . 'module/login/controller/');
    define('MODEL_LOGIN', SITE_ROOT . 'module/login/model/model/');
    define ('VIEW_PATH_LOGIN', SITE_ROOT . 'module/login/view/');
    define('JS_VIEW_LOGIN', SITE_PATH . 'module/login/view/js/');
    define('CSS_VIEW_LOGIN', SITE_PATH . 'module/login/view/css/');

    // Friendly
    define('URL_FRIENDLY', TRUE);
