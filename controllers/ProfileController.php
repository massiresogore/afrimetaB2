<?php

namespace App\controllers;

use App\core\Request;
use App\Models\view;

class ProfileController
{
    public function profile(Request $request, View $view)
    {
        return $view->render('profile');
    }
}