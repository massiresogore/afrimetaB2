<?php

namespace App\controllers;

use App\core\Application;

class NotFoundController
{
    public function notFound()
    {
        $params = [
            "title" => "Page Non trouver"
        ];
        return Application::$app->view->render('NotFound', $params);
    }
}