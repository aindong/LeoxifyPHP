<?php
    class Controller {
        function __construct() {
            //echo "Main Controller";
            $this->view = new View();
            
        }
        
        public function loadModel($name) {
            
            $modelPath = 'Models/' . $name . '_model.php';
            
            if ( file_exists($modelPath) ) {
                require_once 'Models/' . $name . '_model.php';
                
                $modelName = $name . '_Model';
                $this->model = new $modelName();
            }
        }
        
    }

?>