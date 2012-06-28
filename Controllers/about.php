<?php
    class About extends Controller {
        function __construct() {
            parent::__construct();
        }
        
        function index() {
            $this->view->pageTitle = "About | LeoxifyPHP Framework";
            $this->view->render("about/index");
        }
        
        function other() {
            echo "We are inside other";
            require_once "Models/about_model.php";
            $model = new About_Model();
            
            $this->view->blah = $model->blah();
            
            
        }
    }
?>