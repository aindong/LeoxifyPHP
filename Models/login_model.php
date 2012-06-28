<?php
    class Login_Model extends Model {
        
        public function __construct() {
            parent::__construct();
        }
        
        public function doLogin() {
            
            $sth = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = :password ");
            $sth->execute(array(
                ':login' => $_POST['login'],
                ':password' => $_POST['password']
            ));
            
            //$data = $sth->fetchAll();
            //print_r($data);
            $count = $sth->rowCount();
            
            if( $count > 0 ) {
                Session::init();
                Session::set('loggedIn', true);
                header('Location: ' . URL . 'dashboard');
            } else {
                header('Location: ' . URL . 'login');
            }
        }
        
    }
?>