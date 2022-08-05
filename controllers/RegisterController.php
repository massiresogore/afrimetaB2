<?php

namespace App\controllers;

use App\core\Request;

use App\Models\View;

class RegisterController
{
    public function register(Request $request, View $view)
    {
        if ($request->isPost()) {
            $boby = $request->getBody();
        }

        return $view->render('register');
    }
}