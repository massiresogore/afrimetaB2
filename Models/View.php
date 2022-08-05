<?php

namespace App\Models;

use App\core\Application;

class View
{

    public function render($view, $params = [])
    {
        $layoutContent = $this->layout();
        $viewContent = $this->renderViewOnly($view, $params);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    public function layout()
    {
        ob_start();
        include $this->rootDir() . "/views/layout/main.php";
        return ob_get_clean();
    }

    public function renderViewOnly(string $view = "header", array $params = [])
    {
        if ($params) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include $this->rootDir() . "/views/$view.php";
        return ob_get_clean();
    }


    public function rootDir()
    {
        return Application::$rootDir;
    }
}