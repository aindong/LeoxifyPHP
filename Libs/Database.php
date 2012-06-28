<?php
    class Database extends PDO {
        
        public function __construct() {
            parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        }
        
        /**
         * select
         * @param string $sql The sql query select
         * @param array $array Parameters to bind
         * @param constant $fetchMode A PDO fetch mode
         * @return mixed 
         */
         public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
            $sth = $this->prepare($sql);
            
            foreach($array as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            
            $sth->execute();
            return $sth->fetchAll($fetchMode);
         }
        
        
        /**
         * insert
         * @param string $table The name of the table where you are going to insert
         * @param array $data The data you are going to insert
         */
        public function insert($table, $data) {
		  ksort($data);
		
		  $fieldNames = implode('`, `', array_keys($data));
		  $fieldValues = ':' . implode(', :', array_keys($data));
		
		  $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		  foreach ($data as $key => $value) {
			 $sth->bindValue(":$key", $value);
		  }
		
	   	   $sth->execute();
        }
        
        
        /**
         * update
         * @param string $table The name of the table where you are going to update
         * @param array $data The data you are going to update
         * @param string $where The condition or the id that you will be needing to update a record
         */
        public function update($table, $data, $where) {
            ksort($data);
            
            $fieldDetails = NULL;
            
            foreach($data as $key => $value) {
                $fieldDetails .= "`$key` = :$key, "; 
            }
            
            $fieldDetails = rtrim($fieldDetails, ',');
            
            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
            foreach($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            
            $sth->execute();
        }
        
        
         /**
         * delete
         * @param string $table The name of the table where you are going to update
         * @param string $where The condition or the id that you will be needing to update a record
         * @param integer $limit The data you are going to update
         * @return integer Affected rows
         */
        public function delete($table, $where, $limit = 1) {
            return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        }
        
    }
?>