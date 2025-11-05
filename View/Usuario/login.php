<?php

require_once "C:/xampp/htdocs/projetinhogym/Controller/UsuarioController.php";
require_once "C:/xampp/htdocs/projetinhogym/DB/DataBase.php";

$UsuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $UsuarioController->login($email, $senha);

    header("Location: ../../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form method="post">

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Entrar</button>

</form>    

</body>
</html>
