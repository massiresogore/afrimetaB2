<?php
class UrlMessage
{


    public function getUrlMessage()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'message') {
                $message = $_GET["message"];

                require "views/message.php";
            }
        }
    }
}
