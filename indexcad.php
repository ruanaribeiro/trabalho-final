<link rel="stylesheet" href="cadastro.css">
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_conta = $_POST['tipo_conta'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Insira os dados no banco de dados
    $stmt = $pdo->prepare('INSERT INTO cadastro (tipo_conta, email, senha) VALUES (?, ?, ?)');
    $stmt->execute([$tipo_conta, $email, $senha]);

    // Redirecione para a página de login ou exiba uma mensagem de sucesso
    header('Location: indexadmin.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar uma nova conta</title>
</head>
<body>
<header class="navbar">
    <div class="text"><h1></h1></div>
</header>
<div class="img"><img src="escolalogo.png"></div>
    <form method="post">
<div class="box">
    <div class="navbar"><p class="text">login</p></div>
        <label for="tipo_conta" ></label>
        <input  type="text" name="tipo_conta"class="box-li"placeholder="Tipo de conta:" id="tipo_conta" required>
        <br>
        <label for="email"></label>
        <input type="email" name="email"class="box-li"placeholder="Email:" id="email" required>
        <br>
        <label for="senha"></label>
        <input type="password" name="senha"class="box-li"placeholder="Senha:" id="senha" required>
        <br>
        <button class="but" type="submit" name="submit" value="cadastro">Login</button>
</dii>
    </form>
</body>
</html>
