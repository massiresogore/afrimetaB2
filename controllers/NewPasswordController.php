<?php

namespace App\controllers;

use App\core\Request;
use App\Models\view;

class NewPasswordController
{
    public function newPassword(Request $request, View $view)
    {
        return $view->render('newPassword');
    }
}