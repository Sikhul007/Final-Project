<?php
session_start();

$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

if (isset($_COOKIE['email'])) {
    setcookie('email', '', time() - 3600, "/");
}

if (isset($_COOKIE['password'])) {
    setcookie('password', '', time() - 3600, "/");
}

header("Location: login.php");
exit;
