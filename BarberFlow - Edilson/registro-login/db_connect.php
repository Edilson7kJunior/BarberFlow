<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db_barberflow"; 

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>