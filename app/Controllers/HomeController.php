<?php

namespace Controllers;


use Util\View;

class HomeController
{
    
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function index(){
        
        $this->view->render('connexion/register');
         
    }

}