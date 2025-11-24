<?php
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../models/Usuario.php'; 
require_once __DIR__ . '/../utils/notification_helper.php';

session_start();

$usuarioModel = new Usuario($conn); 
$erro = '';
$BASE_URL = "/Maos_Que_Ajudam/src";

// Variáveis para preencher o formulário em caso de erro
$nome = $cpf = $email = '';
$senha = $confirma_senha = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirma_senha = $_POST['confirma_senha'] ?? ''; 

    //Validação básica
    if (empty($nome) || empty($cpf) || empty($email) || empty($senha)) {
        $erro = "Todos os campos são obrigatórios.";
    } elseif (mb_strlen($nome) < 3) {
        $erro = "O nome deve ter pelo menos 3 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "O e-mail inserido não é válido.";
    } elseif (!preg_match('/^\d{11}$/', preg_replace('/\D/', '', $cpf))) {
        $erro = "O CPF deve conter exatamente 11 números.";
    } elseif ($senha !== $confirma_senha) {
        $erro = "As senhas não conferem.";
    }

    if (!empty($erro)) {
        setNotification('erro', 'Erro no Cadastro', $erro);
    } else {
        if ($usuarioModel->cadastrarVoluntario($nome, $cpf, $email, $senha)) {
            $_SESSION['cadastro_sucesso'] = "Cadastro de voluntário realizado! Faça login.";
            setNotification('sucesso', 'Cadastro Realizado!', 'Você foi cadastrado com sucesso! Faça login para continuar.');
            header("Location: {$BASE_URL}/views/login/login.php"); 
            exit;
        } else {
            $erro = "O e-mail ou CPF já estão cadastrados.";
            setNotification('erro', 'Erro no Cadastro', $erro);
        }
    }
}


exibirNotificationSessao(); 

require_once dirname(__DIR__) . '/views/cadastro_voluntario.php';
