<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Obtém os dados
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Define as credenciais válidas
    $valid_username = "admin";
    $valid_password = "admin123";
    
    //Verifica se o usuário e a senha estão corretos
    if ($username == $valid_username && $password == $valid_password) {
        $message = "Login com sucesso!";
    } else {
        $message = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="login">
        <h2>Login</h2>
        <?php if ($message): ?>
            <div class="message" <?php echo ($username == $valid_username && $password == $valid_password) ? 'success-message' : ''; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
