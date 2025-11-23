<?php

require_once __DIR__ . '/../utils/session_helper.php';
secure_session_start();

require_once __DIR__ . '/../utils/notification_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setNotification('erro', 'Logout bloqueado', 'Logout só pode ser feito via formulário.');
    header('Location: /Maos_Que_Ajudam/index.php');
    exit;
}

$token = $_POST['csrf_token'] ?? '';
if (!validate_csrf_token($token)) {
    setNotification('erro', 'Token inválido', 'Não foi possível validar o pedido de logout.');
    header('Location: /Maos_Que_Ajudam/index.php');
    exit;
}

// Destrói todas as variáveis de sessão
$_SESSION = array();

// Se for preciso destruir o cookie de sessão também, o faz.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destrói toda a sessão
session_destroy();

// Redireciona o usuário para a página de login
$BASE_URL = "/Maos_Que_Ajudam/src";
header("Location: {$BASE_URL}/views/login/login.php");
exit;