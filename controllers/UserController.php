<?php

namespace Controllers;

use MVC\Router;

class UserController
{
    public static function index( Router $router ){

        $router->render('sells/index');
    }

    public static function admin(){
        echo 'admin de user';
    }
}