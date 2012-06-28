<?php

  //Load the configuration
  require_once "config.php";

    
    //autoload the required library class
    function __autoload($class) {
        require_once 'Libs/' . $class . ".php";
    }
    
  
  
  //create new instance of bootstrap
  $app = new Bootstrap();
?>