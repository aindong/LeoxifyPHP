<?php
    class Login extends Controller {
        function __construct() {
            parent::__construct();
        }
        
        function index() {
            $this->view->pageTitle = "Login | LeoxifyPHP Framework";
            $this->view->render("login/index");
        }
        
        function doLogin() {
            $this->model->doLogin();
        }
        
    }
?>