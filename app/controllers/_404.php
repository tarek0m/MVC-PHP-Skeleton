<?php

defined('ROOTPATH') OR exit('Access Denied!');

class _404
{
    use Controller;
    
    public function index()
    {
        $this->view('404');
    }
}
