<?php

namespace App\controllers;

use App\core\Request;
use App\Models\view;

class MainController
{
    public function main(Request $request, View $view)
    {
        return $view->render('header');
    }
}