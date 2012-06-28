<?php
    class Hash {
        
        /**
         * @param String $algo The hashing algorithm
         * @param String $data The data to encode
         * @param String $salt The key 
         * @return String The hashed data
         **/
        
        public static function create($algo, $data, $salt = null) {
            $context = hash_init($algo, HASH_HMAC, $salt);
            hash_update($context, $data);
            
            return hash_final($context);
        }
        
    }
?>