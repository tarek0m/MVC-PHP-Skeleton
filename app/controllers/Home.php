<?php

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Home class
 */
class Home 
{
    use Controller;
    
    public function index()
    {
        $this->view('home');
    }

}
