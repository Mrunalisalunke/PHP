<?php
session_start();

function logged_in()
{
    return ($_SESSION ? $_SESSION['user_id'] : false);
}

function confirm_login()
{
    if (!logged_in()) {
        redirect_to("login.php", ["msg" => "Please login first!"]);
    }
}
