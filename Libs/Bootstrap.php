<?php

    class Bootstrap {
        function __construct() {
            //set error reporting
            //error_reporting(1);
            
            //get the current url
            $url = isset( $_GET['url'] ) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //print_r($url);
            
            if( empty($url[0]) ) {
                require_once "Controllers/index.php";
                $controller = new Index();
                $controller->index();
                return false;
            }
  
            //check if the file exists
            $file = 'Controllers/' . $url[0] . '.php';
        
            if( file_exists($file) ) {
                require_once $file;
            } else {
                echo "The file: $file Does not exists. ";
            }
    
            //declare new instance of the controller class    
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            
            
    
            //check if there's an arguement
            if(isset( $url[2] )) {
                $controller->{$url[1]}($url[2]);
            } else {
                //check if the methods exist
                if(isset( $url[1] )) {
                    $controller->{$url[1]}();
                } else {
                    $controller->index();
                }
            }
            
        }
    }
?>