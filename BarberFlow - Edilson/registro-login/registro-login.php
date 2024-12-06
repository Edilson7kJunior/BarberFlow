<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>BarberFlow - Entrar/Registrar</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="register.php" method="POST">
                <h1>Criar Conta</h1>
                <span>Seja mais um de nós!</span>
                <input type="text" name="nome_usuario" placeholder="Nome de usuário" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Criar Conta</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="POST">
                <h1>Entrar</h1>
                <span>É sempre um prazer recebê-lo novamente.</span>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                <button type="submit">Entrar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem-vindo de Volta!</h1>
                    <p>Insira seus dados pessoais para aproveitar os recursos de nossa barbearia.</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Seja bem-vindo ao BarberFlow!</h1>
                    <p>Registre-se e tenha acesso a nossa barbearia.</p>
                    <button class="hidden" id="register">Criar Conta</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
