<?php
include("./includes/functions.php");

// 4 steps of closing a session
// i.e logging out

// find the session
session_start();

// Unset session variable
$_SESSION = array();

// delete session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), "", time() - 42000, '/');
}

// Destroy session
session_destroy();

redirect_to('login.php', ['msg' => "logout successful!"]);
