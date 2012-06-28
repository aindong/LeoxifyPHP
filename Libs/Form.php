<?php
/**
 *
 * - Fill out a form
 * - POST to PHP
 * - Sanitize
 * - Validate
 * - Return Data
 * - Write to Database
 *  
 **/
    require_once 'Form/val.php';
    class Form {
        
        /** @var array $_currentItem The immediately posted Item */
        private $_currentItem = null;
        
        /** @var array $_postData stores the posted data*/
        private $_postData = array();
        
        /** @var object $_val The Validator object*/
        private $_val = array();
        
        /** @var object $_error Holds the current form error */
        private $_error = array();
        
        /**  
        * The constructor - Initiates the validator class
        */
        public function __construct() {
            
            $this->_val = new Val();
        }
        
        /**
         * val - This is to run $_POST
         * @param string $field - The HTML fieldname to post
         **/
        public function post($field) {
            $this->_postData[$field] = $_POST[$field];
            $this->_currentItem = $field;
            return $this;
        }
        
        /**
         * fetch - This is to return postData
         * @param mixed $fieldName
         * @return mixed string or array
         **/
        public function fetch($fieldName = false) {
            if ($fieldName) {
                if(isset( $this->_postData[$fieldName] )) {
                    return $this->_postData[$fieldName];
                } else {
                    return false;
                }
            } else {
                return $this->_postData;
            }
        }
        
        /**
         * val - This is to validate
         * @param 
         **/
        public function val($typeOfValidator, $arg = null) {
            
            if($arg == null) {
                $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
            } else {
                $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
            }
            
            
            if($error) {
                $this->_error[$this->_currentItem] = $error;
            }
            
            
            return $this;
        }
        
        public function submit() {
            if(empty($this->_error)) {
                return true;
            } else {
                $str = '';
                foreach($this->_error as $key => $value) {
                    $str .= '[' . ucfirst($key) . ']' . ' => ' . $value . '<br/>';
                }
                throw new Exception($str);
            }
        }
        
        
    }
?>