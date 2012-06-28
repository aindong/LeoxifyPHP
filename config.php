<?php
    //set the error mode
    error_reporting(1);
    
    //set the timezone, for a list of timezones go to http://php.net/manual/en/timezones.php
    $timeZone = 'Asia/Manila';
    date_default_timezone_set($timeZone);


    //This is the path where you are developing or where you are going to put your webapp
    define('URL', '/LeoxifyPHP/');
    
    //Theme folder -> set this to the directory name of your theme
    define('THEME', 'test');
    
    
    //This are the database constants, that is going to need to change
    //for database access
    //Please change it into your own database settings
    define('DB_TYPE', 'mysql'); //change into the database type you will use
    define('DB_HOST', 'localhost'); //change into your database host
    define('DB_NAME', 'mvc'); //change into your dabase name
    define('DB_USER', 'root'); //change into your database username
    define('DB_PASS', ''); //change into your database password
    
    
    //This is for the hashing security of some text and password
    //This is the salt for the hash. Change it once...
    define('HASH_KEY', 'swordfish');
    
    

?>