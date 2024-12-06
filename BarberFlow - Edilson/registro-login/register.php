<?php
include 'db_connect.php'; // Conexão com o banco de dados
session_start(); // Iniciar a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = $_POST['nome_usuario']; // Nome do campo foi atualizado
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // Verificar duplicação de e-mail ou nome_usuario
    $stmt_check = $conn->prepare("SELECT * FROM usuarios WHERE email = ? OR nome_usuario = ?");
    $stmt_check->bind_param("ss", $email, $nome_usuario);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "O e-mail ou nome de usuário já está em uso!";
    } else {
        // Inserindo os dados no banco de dados
        $stmt_insert = $conn->prepare("INSERT INTO usuarios (nome_usuario, email, senha) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $nome_usuario, $email, $senha);
        
        if ($stmt_insert->execute()) {
            // Armazenando o nome_usuario e email do usuário na sessão
            $_SESSION['nome_usuario'] = $nome_usuario;
            $_SESSION['email'] = $email;
            
            // Redirecionando para a página inicial
            header("Location: ../index.php");
            exit();
        } else {
            echo "Erro: " . $stmt_insert->error;
        }
    }

    $stmt_check->close(); // Fechar a declaração de checagem
    $stmt_insert->close(); // Fechar a declaração de inserção
    $conn->close(); // Fechar a conexão
}
?>
