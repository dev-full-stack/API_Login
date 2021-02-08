<?php
    class Model{

        protected $connect;

        public function __construct(){
            global $config;
            try{
                $this->connect = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
            }catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    }
?>