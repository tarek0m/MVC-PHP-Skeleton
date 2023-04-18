<?php

defined('ROOTPATH') OR exit('Access Denied!');

// this function is run only if php wanted to call a class and didn't find it 
spl_autoload_register(function ($className) {
    require $fileName = "../app/models/" . ucfirst($className) . ".php";
});

// every file/class is in /core must be included in init.php
require "config.php";
require "functions.php";
require "Database.php";
require "Model.php";
require "Controller.php";
require "App.php";
