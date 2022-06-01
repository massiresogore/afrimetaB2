<?php

namespace App\controllers;

class UrlMessage
{
    public function getUrlMessage()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'message') {
                if (isset($_GET["mesage"])) {

                    $message = $_GET["message"];
                }

                require "views/message.php";
            }
        }
    }
}
