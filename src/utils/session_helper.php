<?php


function secure_session_start()
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443;
    $httponly = true;

    $cookieParams = session_get_cookie_params();
    $cookieParams['httponly'] = $httponly;
    $cookieParams['secure'] = $secure;
    $samesite = 'Lax';

    if (PHP_VERSION_ID >= 70300) {
        session_set_cookie_params([
            'lifetime' => $cookieParams['lifetime'],
            'path' => $cookieParams['path'],
            'domain' => $cookieParams['domain'],
            'secure' => $cookieParams['secure'],
            'httponly' => $cookieParams['httponly'],
            'samesite' => $samesite
        ]);
    } else {
        session_set_cookie_params(
            $cookieParams['lifetime'],
            $cookieParams['path'] . '; samesite=' . $samesite,
            $cookieParams['domain'],
            $cookieParams['secure'],
            $cookieParams['httponly']
        );
    }

    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', $httponly ? '1' : '0');
    ini_set('session.cookie_secure', $secure ? '1' : '0');

    session_start();
}

function get_csrf_token()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        secure_session_start();
    }

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function validate_csrf_token($token)
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        secure_session_start();
    }

    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}

?>