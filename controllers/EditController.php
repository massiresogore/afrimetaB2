<?php

namespace App\controllers;

use App\core\Request;
use App\Models\view;

class EditController
{
    public function edit(Request $request, View $view)
    {
        return $view->render('editProfile');
    }
}