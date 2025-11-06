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
        <button><a href="cadastrar.php">Escute agora</a></button>
   
        <img src="" alt="">
        <button><a href="cadastrar.php">Escute agora</a></button>
    
    <form method="post">
        <label for="nome">Nome:</label>
        <input name="nome" type="text" required>
        <label for="email">E-mail:</label>
        <input name="email" type="email" required>
        <label for="senha">Senha:</label>
        <input name="senha" type="text" required>
        <input type="submit">
        <a href="login.php">Já tem uma conta</a>
    </form>
    
        <img src="" alt="">
        <button><a href="cadastrar.php">Escute agora</a></button>
   
 
        <img src="" alt="">
        <button><a href="cadastrar.php">Escute agora</a></button>
    </div>

</body>
<?php
try{

    require_once 'db/database.php';
    require_once 'controller/usercontroller.php';
    require_once 'verificar.php';

    $controller = new usercontroller($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaconfirm = $_POST['senhaconfirm'];
    
        $idatual = $controller->cadastrar($nome,$email,$senha);
       
        header("Location:index.php");
    
}
}catch(Exception $e){
    echo "<p style='color: red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
}

?>
</html>