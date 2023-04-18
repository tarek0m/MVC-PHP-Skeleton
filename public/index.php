<?php

/*
* All credits goes to: Tarek Alnaggar
* © April, 2023
*/

session_start();

/* Validate PHP Version*/
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion) {
    die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

/* Path to this file */
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App();

$app->loadController();
