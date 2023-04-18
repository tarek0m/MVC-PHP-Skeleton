<?php

defined('ROOTPATH') OR exit('Access Denied!');

if ($_SERVER["SERVER_NAME"] == 'localhost') {
    // database config
    define('DB_NAME', 'myDB');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PSW', '');
    
    define('ROOT', 'http://localhost/mvc/public');
}
else {
    // database config
    define('DB_NAME', 'myDB');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PSW', '');
    
    define('ROOT', 'https://www.mywebsite.com');
    
}

// turn it to false (don't show errors) when in live server
define('DEBUG', true);

