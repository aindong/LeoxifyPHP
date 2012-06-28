<?php
    class Dashboard extends Controller {
        function __construct() {
            parent::__construct();
            Session::init();
            $logged = Session::get('loggedIn');
            
            if ($logged == false) {
                Session::destroy();
                header('Location: '. URL . 'login');
                exit;
            }
            
            $this->view->js = array('public/js/jquery.js');
        }
        
        function index() {
            $this->view->foo = $this->model->records();
            $this->view->pageTitle = "Dashboard | LeoxifyPHP Framework";
            $this->view->render('dashboard/index');
        }
        
        function logout() {
            Session::destroy();
            header('Location: '. URL . 'login');
            exit;
        }
        
        function create() {
            $this->model->create($_POST);
            header('Location: '. URL . 'dashboard');
            exit;
        }
        
        
        function delete() {
            $this->model->delete();
        }
    }
?>