<?php

class Usuario
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cadastrarUsuario($nome, $cpf, $email, $senha)
    {
        if (!$this->conn) {
            error_log("Erro de Conexão no cadastrarUsuario.");
            return false;
        }

        $tipo_padrao = 'cliente';
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Usuario (nome, cpf, email, senha, tipo_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt) {
            error_log("Erro ao preparar statement no cadastro: " . mysqli_error($this->conn));
            return false;
        }

        mysqli_stmt_bind_param($stmt, "sssss", $nome, $cpf, $email, $senha_hash, $tipo_padrao);

        // Desabilita exceptions temporariamente para capturar erro de duplicidade
        $old_report = mysqli_report(MYSQLI_REPORT_OFF);
        $result = false;
        try {
            $result = mysqli_stmt_execute($stmt);
        } catch (mysqli_sql_exception $e) {
            // Trata erro de duplicidade ou outros
            error_log("Erro ao executar cadastro: " . $e->getMessage());
            $result = false;
        }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Restaura padrão

        if ($result) {
            $new_id = mysqli_insert_id($this->conn);
            mysqli_stmt_close($stmt);
            return $new_id;
        } else {
            mysqli_stmt_close($stmt);
            return false;
        }
    }

    public function cadastrarVoluntario($nome, $cpf, $email, $senha)
    {
        if (!$this->conn) {
            error_log("Erro de Conexão no cadastrarVoluntario.");
            return false;
        }

        $tipo_voluntario = 'voluntario';
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Usuario (nome, cpf, email, senha, tipo_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt) {
            error_log("Erro ao preparar statement no cadastro de voluntário: " . mysqli_error($this->conn));
            return false;
        }

        mysqli_stmt_bind_param($stmt, "sssss", $nome, $cpf, $email, $senha_hash, $tipo_voluntario);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $new_id = mysqli_insert_id($this->conn);
            mysqli_stmt_close($stmt);
            return $new_id;
        } else {
            error_log("Erro ao executar cadastro de voluntário: " . mysqli_stmt_error($stmt));
            mysqli_stmt_close($stmt);
            return false;
        }
    }

    public function buscarPorEmail($email)
    {
        $sql = "SELECT idUsuario, nome, senha, tipo_usuario FROM Usuario WHERE email = ?";
        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return null;

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $usuario;
    }
    public function listarUsuarios()
    {
        $sql = "SELECT idUsuario, nome, email, tipo_usuario, created_at 
            FROM Usuario 
            ORDER BY idUsuario DESC";

        $result = mysqli_query($this->conn, $sql);

        $usuarios = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $usuarios[] = $row;
            }
        }
        return $usuarios;
    }

    public function criar($nome, $cpf, $email, $senha, $tipo_usuario)
    {
        $sql = "INSERT INTO Usuario (nome, cpf, email, senha, tipo_usuario, created_at) 
            VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Usuario::criar - prepare failed: " . $this->conn->error);
            return false;
        }

        if (!$stmt->bind_param("sssss", $nome, $cpf, $email, $senha, $tipo_usuario)) {
            error_log("Usuario::criar - bind_param failed: " . $stmt->error);
            $stmt->close();
            return false;
        }

        $res = $stmt->execute();
        if (!$res) {
            error_log("Usuario::criar - execute failed: " . $stmt->error);
        }
        $stmt->close();
        return $res;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM Usuario WHERE idUsuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function atualizar($id, $nome, $email, $tipo_usuario)
    {
        $sql = "UPDATE Usuario 
            SET nome = ?, email = ?, tipo_usuario = ?
            WHERE idUsuario = ?";

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Usuario::atualizar - prepare failed: " . $this->conn->error);
            return false;
        }

        if (!$stmt->bind_param("sssi", $nome, $email, $tipo_usuario, $id)) {
            error_log("Usuario::atualizar - bind_param failed: " . $stmt->error);
            $stmt->close();
            return false;
        }

        $res = $stmt->execute();
        if (!$res) {
            error_log("Usuario::atualizar - execute failed: " . $stmt->error);
        }
        $stmt->close();
        return $res;
    }

    public function buscar($termo)
    {
        $termo = "%" . $termo . "%";
        $stmt = $this->conn->prepare("
        SELECT idUsuario, nome, email, tipo_usuario, created_at
        FROM Usuario
        WHERE nome LIKE ? OR email LIKE ?
        ORDER BY idUsuario DESC
    ");
        $stmt->bind_param("ss", $termo, $termo);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}