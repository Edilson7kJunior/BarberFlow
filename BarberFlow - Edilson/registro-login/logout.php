<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão

// Redireciona de volta para o index.php
header("Location: ../index.php");
exit;
?>
