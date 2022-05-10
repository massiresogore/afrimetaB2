<?php

class UrlProfile
{

    public function getUrlProfile()
    {
        if (isset($_SESSION["user"]) && isset($_GET["page"])) {
            if ($_GET['page']  == 'profile') {

                require "views/profile.php";
            }
        }
    }
}
