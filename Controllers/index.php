<?php

 class Index extends Controller{
    
    function __construct() {
        parent::__construct();
        //echo "I am in index<br/>";
    }
    
    function index() {
        $this->view->pageTitle = "LeoxifyPHP Framework | By Alleo Indong";
        $this->view->render("index/index");
        
        //echo Hash::create('sha256', 'alleo', HASH_KEY);
    }
    
    function sayHello($arg = false) {
        $this->view->render("index/index");
        echo "Hello world<br/>";
        if( $arg ) {
            echo "Parameter value is : " . $arg . "<br/>";
        }
        
    }
 }
?>