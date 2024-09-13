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
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #000;
            color: white;
        }

        .container {
            background-color: #282828;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: white;
            width: 300px;
        }

        input {
            padding: 10px;
            margin: 10px 0;
            width: calc(100% - 22px);
            border-radius: 30px;
        }

        button {
            padding: 10px 20px;
            background-color: #3d3d3d;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #303030;
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
    <title>Login</title>
</head>
<body>
<div class="container">
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
   
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    </div>
</body>
</html>
