<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>            
  
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">E-mail:</label>
        <input type="mail" name="email" required><br>
        <label for="Senha">Senha:</label>
        <input type="text" name="senha" required><br>
    
        <input type="submit">
    </form>
</body>
</html>

<?php

require_once "C:/turma1/xampp/htdocs/projetinhogym/Controller/UsuarioController.php";
require_once "C:/turma1/xampp/htdocs/projetinhogym/DB/DataBase.php";

$UsuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  


  $UsuarioController -> cadastrar( $nome, $email, $senha);
  header("Location: ../../index.php");
}
 


?>