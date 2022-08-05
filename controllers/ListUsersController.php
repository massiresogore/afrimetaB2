<?php

namespace App\controllers;

use App\core\Request;
use App\Models\view;

class ListUsersController
{
    public function ListUsers(Request $request, View $view)
    {
        return $view->render('ListUsers');
    }
}