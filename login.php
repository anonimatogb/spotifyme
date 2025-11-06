<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/icone.png" type="image/x-icon">
    <title>Spotify</title>
</head>
<body>
    <nav>
        <img src="/img/logo.png" alt="logospotify">
        <ul>
            <li>inicio</li>
            <li>planos</li>
            <li>sobre nós</li>
        </ul>
    </nav>
    <div>
        
        <img src="" alt="">
        <button><a href="login.php">Escute agora</a></button>
   
        <img src="" alt="">
        <button><a href="login.php">Escute agora</a></button>
    
    <form method="post">
        <label for="email">E-mail:</label>
        <input name="email" type="email" required>
        <label for="senha">Senha:</label>
        <input name="senha" type="text" required>
        <input type="submit">
        <a href="login.php">Já tem uma conta</a>
    </form>
    
        <img src="" alt="">
        <button><a href="login.php">Escute agora</a></button>
   
 
        <img src="" alt="">
        <button><a href="login.php">Escute agora</a></button>
    </div>

</body>
<?php
session_start();

    require_once 'db/database.php';
    require_once 'controller/usercontroller.php';
    require_once 'verificar.php';
 $erro= '';
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

         $controller = new usercontroller($pdo);
$usuario = $controller->login($email,$senha);
    if($usuario){
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['id_usuario'] = $usuario['id'];
        if($usuario['email'] === "admin@hotmail.com"){
            header('Location: admin.php');
            exit;
        }
        $verificar = new verificar();
        $permitido = true;
        $verificar ->usuariopermitido($permitido);
        header('Location:index.php');
        exit;
    }else{
        $erro = "E-mail ou senha incorretos!";
    }
}    
    
?>
</html>