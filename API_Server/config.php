<?php
    header('Content-Type: application/json; charset=UTF-8');
    
    define("ENVIRONMENT", "development");

    global $config;
    $config = array();
    
    if(ENVIRONMENT == "development"){
        define("BASE_URL", "http://localhost");
        $config['dbname'] = 'serie_login';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }else{
        define("BASE_URL", "http://localhost");
        $config['dbname'] = 'serie_login';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = 'root';
    }
?>