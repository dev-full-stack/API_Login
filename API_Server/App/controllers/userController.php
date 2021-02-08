<?php
    class userController{
        public function get(int $id = null){
            $u = new User();
            if($id != null){
                return $u->get($id);
            }else{
                return $u->getAll();
            }
        }
        public function post(){
            echo "post";
        }
        public function update(){
            echo "update";
        }
        public function delete(){
            echo "delete";
        }
        
    }
?>