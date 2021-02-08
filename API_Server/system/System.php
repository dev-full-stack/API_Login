<?php
    class System{
        public function run(){
            $url = explode("index.php", $_SERVER['PHP_SELF']);
            $url = end($url);
            
            $params = array();
            
            if(isset($url) && !empty($url[0])){
                $url = explode("/", $url);
                array_shift($url);

                if(class_exists($url[0]."Controller")){
                    $currentController = $url[0]."Controller";
                    array_shift($url);
                    
                    if(isset($url) && !empty($url[0]) && method_exists($currentController, $url[0])){
                        $currentAction = $url[0];
                        array_shift($url);
                    }else{
                        $currentAction = 'index';
                    }
                    
                    if(isset($url) && !empty($url[0])){
                        $params = $url;
                    }
                }else{
                    $currentController = 'homeController';
                    $currentAction = 'index'; 
                }
            }else{
                $currentController = 'homeController';
                $currentAction = 'index';
            }

            $c = new $currentController();

            try{
                if($currentAction != "auth"){
                    if(homeController::checkAuth()){
                        $response = call_user_func_array(array($c, $currentAction), $params);
                        echo json_encode(array(
                            'status' => 'success',
                            'data' => $response
                        ));
                    }else{
                        throw new Exception('Não autenticado.');
                    }
                }else{
                    $response = call_user_func_array(array($c, $currentAction), $params);
                        echo json_encode(array(
                            'status' => 'success',
                            'data' => $response
                        ));
                }
            }catch(Exception $e){
                echo json_encode(array(
                    'status' => 'error',
                    'data' => "$e.getMessage()"
                ));
            }
        }
    }
?>