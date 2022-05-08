<?php
class UrlMessage
{

    public function getUrlMessage()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page']  == 'message') {
                require "views/message.php";
            }
        }
    }
}
