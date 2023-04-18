<?php

defined('ROOTPATH') OR exit('Access Denied!');

trait Controller
{
    public function view($name)
    {
        $filename = "../app/views/" . $name . ".view.php";

        if (file_exists($filename)) {
            require $filename;
        } else {
            require "../app/views/404.view.php";
        }
    }
}
