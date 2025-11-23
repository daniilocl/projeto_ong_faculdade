<?php
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../models/Usuario.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /Maos_Que_Ajudam/src/views/login/login.php");
    exit;
}

if ($_SESSION['user_tipo'] !== 'admin') {
    header("Location: /Maos_Que_Ajudam/index.php");
    exit;
}

$usuarioModel = new Usuario($conn);

if (isset($_GET['busca']) && $_GET['busca'] !== '') {
    $usuarios = $usuarioModel->buscar($_GET['busca']);
} else {
    $usuarios = $usuarioModel->listarUsuarios();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Gerenciar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .table-responsive {
            max-height: 70vh;
            overflow-y: auto;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 10;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <h4 class="text-center py-3 border-bottom">Administração</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item"> <a class="nav-link active" href="#usuarios-section"> <i
                                    class="fas fa-users"></i> Gerenciar Usuários </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="/Maos_Que_Ajudam/src/controllers/logout.php">
                                <i class="fas fa-sign-out-alt"></i> Sair
                            </a></li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4 pb-2 border-bottom">Painel de Administração</h1>

                <section id="usuarios-section" class="pt-4">
                    <h2><i class="fas fa-users"></i> Gerenciar Usuários</h2>
                    <p class="lead">Lista de todos os usuários cadastrados e ferramentas de moderação.</p>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionarUsuario">
                            <i class="fas fa-plus-circle"></i> Adicionar Novo Usuário
                        </button>
                        <form class="d-flex" method="GET" action="administracao.php">
                            <input class="form-control me-2" type="search" name="busca"
                                value="<?= $_GET['busca'] ?? '' ?>" placeholder="Buscar por nome ou email">

                            <button class="btn btn-outline-secondary me-2" type="submit">
                                <i class="fas fa-search"></i>
                            </button>

                            <a href="administracao.php" class="btn btn-outline-danger">
                                <i class="fas fa-eraser"></i>
                            </a>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Completo</th>
                                    <th>Email</th>
                                    <th>Nível de Acesso</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $u): ?>
                                    <tr>
                                        <td><?= $u['idUsuario'] ?></td>
                                        <td><?= $u['nome'] ?></td>
                                        <td><?= $u['email'] ?></td>

                                        <td>
                                            <?php if ($u['tipo_usuario'] === 'admin'): ?>
                                                <span class="badge bg-danger">Administrador</span>

                                            <?php elseif ($u['tipo_usuario'] === 'voluntario'): ?>
                                                <span class="badge bg-primary">Voluntário</span>

                                            <?php else: ?>
                                                <span class="badge bg-success">Padrão</span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?= $u['created_at'] ?? '—' ?></td>

                                        <td>
                                            <a href="/Maos_Que_Ajudam/src/controllers/editar_usuario.php?id=<?= $u['idUsuario'] ?>"
                                                class="btn btn-sm btn-info text-white me-1">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>

                                            <a href="/Maos_Que_Ajudam/src/controllers/excluir_usuario.php?id=<?= $u['idUsuario'] ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir?')"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i> Excluir
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </section>
            </main>
        </div>
    </div>

    <div class="modal fade" id="modalAdicionarUsuario" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Adicionar Novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../controllers/adicionar_usuario.php">
                        <div class="mb-3">
                            <label for="nomeUsuario" class="form-label">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" id="nomeUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpfUsuario" class="form-label">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpfUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailUsuario" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="emailUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="senhaUsuario" class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" id="senhaUsuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="nivelAcesso" class="form-label">Nível de Acesso</label>
                            <select name="tipo_usuario" class="form-select" id="nivelAcesso" required>
                                <option value="admin">Administrador</option>
                                <option value="cliente" selected>Usuário Padrão</option>
                                <option value="voluntario">Voluntário</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Salvar
                                Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>