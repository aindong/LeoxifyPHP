<?php
    class Val {
        public function __construct() {
            
        }
        
        public function minlength($data, $min) {
            if(strlen($data) < $min) {
                return "Your string must have atleast $min character/s";
                //exit;
            }
        }
        
        public function digit($data) {
            if(!( ctype_digit($data) )) {
                return "Your string must be a digit";
                //exit;
            }
        }
        
        public function email($data) {
            $data = filter_var( $data, FILTER_SANITIZE_EMAIL);
            
            if(!(filter_var( $data, FILTER_VALIDATE_EMAIL ))) {
                return "Your string must be an email";
            }
        }
        
        public function required($data) {
            if(empty($data)) {
                return "This field is required";
            }
        }
        
        public function __call($name, $arguments) {
            throw new Exception("$name does not exists in : " . __CLASS__);
        }
    }

?>