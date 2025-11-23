<?php
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../models/Usuario.php'; 
require_once __DIR__ . '/../utils/session_helper.php';
require_once __DIR__ . '/../utils/notification_helper.php';

// Usa secure_session_start() para parâmetros de sessão mais seguros
secure_session_start();
$usuarioModel = new Usuario($conn);
$erro = '';
$BASE_URL = "/Maos_Que_Ajudam/src";

// Exibe a mensagem de sucesso do cadastro
$sucesso = $_SESSION['cadastro_sucesso'] ?? '';
unset($_SESSION['cadastro_sucesso']); // Limpa a mensagem

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valida token CSRF
    $postedToken = $_POST['csrf_token'] ?? '';
    if (!validate_csrf_token($postedToken)) {
        setNotification('erro', 'Token inválido', 'Falha ao validar o formulário de login.');
        header('Location: /Maos_Que_Ajudam/src/views/login/login.php');
        exit;
    }
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    
    // Busca o usuário
    $usuario = $usuarioModel->buscarPorEmail($email);

    //Verifica se o usuário existe e se a senha confere
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        
        session_regenerate_id(true);

        // Inicia a sessão com os dados do usuário
        $_SESSION['user_id'] = $usuario['idUsuario'];
        $_SESSION['user_nome'] = $usuario['nome'];
        $_SESSION['user_tipo'] = $usuario['tipo_usuario'];
        
        //Lógica de Redirecionamento por Tipo de Usuário
        if ($usuario['tipo_usuario'] === 'admin') {
            // Redireciona para a página de administração
            header("Location: /Maos_Que_Ajudam/src/views/administracao.php");
        } else {
            // Redireciona clientes
            header("Location: /Maos_Que_Ajudam/index.php");
        }
        exit;

    } else {
        // Credenciais inválidas: notificar e redirecionar para a página de login
        setNotification('erro', 'Login inválido', 'E-mail ou senha inválidos.');
        header('Location: /Maos_Que_Ajudam/src/views/login/login.php');
        exit;
    }
}
 
