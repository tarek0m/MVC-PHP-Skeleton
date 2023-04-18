<?php

defined('ROOTPATH') or exit('Access Denied!');

check_extension();
function check_extension()
{
    $required_extension = [
        'pdo',
    ];

    $not_loaded = [];

    foreach ($required_extension as $ext) {
        if (!extension_loaded($ext)) {
            $not_loaded[] = $ext;
        }
    }

    if (!empty($not_loaded)) {
        show("Please load the following extension in your php.ini file: <br>".implode("<br>", $not_loaded));
        die;
    }
}

/* Print some stuff on screen */
function show($stuff)
{
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

/* Convert predefined characters to HTML entities */
function esc($str)
{
    return htmlspecialchars($str);
}

/* Redirect to a specific location in the project */
function redirect($path)
{
    header("Location: " . ROOT . "/" . $path);
    die;
}
