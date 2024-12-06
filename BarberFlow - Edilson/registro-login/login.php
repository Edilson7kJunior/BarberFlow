<?php
include 'db_connect.php'; // Conexão com o banco de dados
session_start(); // Iniciar a sessão



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email); // 's' indica que estamos passando uma string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificando a senha
        if (password_verify($senha, $row['senha'])) {
            // Armazenando o nome_usuario e email do usuário na sessão
            $_SESSION['nome_usuario'] = $row['nome_usuario']; // Atualizado para 'nome_usuario'
            $_SESSION['email'] = $row['email'];
            
            // Redirecionando para a página inicial
            header("Location: ../index.php");
            exit(); // Encerrar o script para garantir o redirecionamento
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Nenhum usuário encontrado com esse e-mail!";
    }

    $stmt->close(); // Fechar a declaração
    $conn->close(); // Fechar a conexão
}
?>
