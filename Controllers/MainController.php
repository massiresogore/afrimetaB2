<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index()
    {
        $this->render('/main/index');
    }
    public function profile()
    {
        $this->render('/membres/profile');
    }
    public function membres()
    {
        $this->render('/membres/index');
    }
}