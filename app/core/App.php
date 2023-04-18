<?php

defined('ROOTPATH') OR exit('Access Denied!');

class App
{
    // default controller
    private $controller = 'Home';
    private $method = 'index';

    private function splitURL()
    {
        $URL = $_GET["url"] ?? "home";
        $URL = explode("/", trim($URL, "/"));

        return ($URL);
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        // select controller
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            require "../app/controllers/_404.php";
            $this->controller = "_404";
        }

        $controller = new $this->controller;

        // select method
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        call_user_func_array([$controller, $this->method], []);
    }
}
