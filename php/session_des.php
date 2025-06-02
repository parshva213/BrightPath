<?php
include 'loading.php';
sleep(1);
session_start();
session_unset();
session_destroy();

// Destroy session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

header('Location: ../php/login.php');
exit();
?>
