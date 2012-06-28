<?php
    class Dashboard_Model extends Model {
        function __construct() {
            parent::__construct();
        }
        
        public function create($data) {
            //echo $_POST['text'];
            
            $this->db->insert('data', array('text' => $data['text']));
        }
        
        public function records() {
            return $this->db->select("SELECT * FROM data");
        }
        
    }
?>