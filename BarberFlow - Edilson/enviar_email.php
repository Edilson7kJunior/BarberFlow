<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $servico = htmlspecialchars($_POST['servico']);
    $data = htmlspecialchars($_POST['data']);
    $hora = htmlspecialchars($_POST['hora']);

    // Configurações do e-mail
    $to = "seu_email@exemplo.com"; // Altere para seu e-mail
    $subject = "Novo Agendamento de Serviço";
    $message = "Nome: $nome\nServiço: $servico\nData: $data\nHorário: $hora";
    $headers = "From: daviemanuel19y@gmail.com"; // Altere para um e-mail de envio

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Falha ao enviar o e-mail.";
    }
}
?>
