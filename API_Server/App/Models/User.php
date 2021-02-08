<?php

class User extends Model{
    private static $table = 'user';
    
    public function get(int $id){
        $sql = $this->connect->prepare("SELECT * FROM ". self::$table. " WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return new Exception('Nenhum resultado encontrado!');
        }
    }

    public function getAll(){
        $sql = $this->connect->prepare("SELECT * FROM ".self::$table);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return new Exception('Nenhum resultado encontrado!');
        }
    }
}