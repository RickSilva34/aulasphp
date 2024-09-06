<?php
require_once 'Login.php';

$message = '';
$loginSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // pega os dados do formulário
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // cria uma instância da classe Login
    $login = new Login($username, $password);

    //autenticar e armazenar a mensagem
    $message = $login->authenticate();
    
    // Verifica se o login foi feito certo
    $loginSuccess = ($message === 'Login efetuado com sucesso');
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
    <h1>Login</h1>
    <form action="index.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <!-- Mensagem de resultado -->
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</body>
</html>
