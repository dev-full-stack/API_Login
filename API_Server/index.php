<?php
    require_once("config.php");

    spl_autoload_register(function($class){
        if(strpos($class, "Controller") && file_exists('App/controllers/'.$class.'.php')){
            require_once('App/controllers/'.$class.'.php');
        }else if(file_exists('App/models/'.$class.'.php')){
            require_once('App/models/'.$class.'.php');
        }else if(file_exists('system/'.$class.'.php')){
            require_once('system/'.$class.'.php');
        }
    });

    $s = new System();
    $s->run();
?>