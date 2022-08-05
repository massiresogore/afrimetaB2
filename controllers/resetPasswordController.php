<?php

namespace App\controllers;

use App\core\Request;
use App\Models\View;

class resetPasswordController
{
    public function resetPassword(Request $request, View $view)
    {
        if ($request->isPost()) {
            $boby = $request->getBody();
        }
        return $view->render('resetPassword');
    }
}