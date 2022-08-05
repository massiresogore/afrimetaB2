<?php

namespace App\controllers;

use App\core\Request;
use App\Models\RegisterModel;
use App\Models\View;

class RegisterController extends RegisterModel
{
    public function register(Request $request, View $view)
    {
        if ($request->isPost()) {
            $boby = $request->getBody();
        }

        return $view->render('register');
    }
}