<?php

require_once "C:/xampp/htdocs/aula_09_10_2025/MVC/Controller/UsuarioController.php";
require_once "C:/xampp/htdocs/aula_09_10_2025/MVC/DB/DataBase.php";

$UsuarioController = new UsuarioController($pdo);

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $usuario = $UsuarioController->buscarUsuario($id);



?>



  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
  </head>

  <body>
    <form method="post">



      <label for="nome">Nome:</label>
      <input type="text" name="nome" value="<?= $usuario['nome']; ?>" required><br>

      <label for="descricao">Descrição:</label>
      <input type="text" name="descricao" value="<?= $usuario['descricao']; ?>" required><br>

      <label for="quantidade">Quantidade:</label>
      <input type="number" name="quantidade" value="<?= $usuario['quantidade']; ?>" required><br>

      <label for="codigobarra">Código de Barras:</label>
      <input type="text" name="codigobarra" value="<?= $usuario['codigobarra']; ?>" required><br>

      <label for="preco">Preço:</label>
      <input type="text" name="preco" value="<?= $usuario['preco']; ?>" required><br>
      <br><br>
      <label for="nomepaga">Nome Pagamento:</label>
      <select name="nomepaga" value="<?= $usuario['nomepaga']; ?>" required><br>
        <option value="mastercard">Cartao MasterCard</option>
        <option value="visa">Cartao Visa</option>
        <option value="pix">PIX</option>
        <option value="dinheiro">Dinheiro</option>
      </select>
      <br><br>

      <label for="tipo">Tipo Pagamento:</label>
      <select name="tipo" value="<?= $usuario['tipo']; ?>" required><br>
        <option value="credito">CRÉDITO</option>
        <option value="debito">DÉBITO</option>
        <option value="pix">PIX</option>
        <option value="vista">À vista</option>
      </select><br><br>


      <input type="submit">



    </form>
  </body>

  </html>

<?php

} else {
  header('Location: listar.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $quantidade = $_POST['quantidade'];
  $codigobarra = $_POST['codigobarra'];
  $preco = $_POST['preco'];
  $nomepaga = $_POST['nomepaga'];
  $tipo = $_POST['tipo'];



  $UsuarioController->editar($nome, $descricao, $quantidade, $codigobarra, $preco, $nomepaga, $tipo, $id);
  header('Location: ../../index.php ');
}


?>