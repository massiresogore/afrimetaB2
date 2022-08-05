<?php

namespace App\controllers;


use App\core\Request;
use App\models\View;

class LoginController
{
    public function login(Request $request, View $view)
    {

        return $view->render('login');
    }
}