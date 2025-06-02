<?php 
session_start([
    'use_only_cookies' => 1,
    'cookie_lifetime' => 0,
    'cookie_httponly' => 1,
    'cookie_secure' => isset($_SERVER['HTTPS']),
    'cookie_samesite' => 'Strict'
]);
session_regenerate_id(true);
?>