<?php

    if (empty($usuarios)) {
      echo "<p>Nenhum produto encontrado!</p>";
       echo"<a href='View/Usuario/cadastrar.php'>Cadastrar</a>";
      return;
    }

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo"<tr><td>Produtos</td><td><a href='View/Usuario/cadastrar.php'>Cadastrar</a></td></tr>";
    echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Código de Barras</th>
        <th>Preço</th>
        <th>Nome Pagamento</th>
        <th>Tipo</th>
        <th>Ações</th>
      </tr>";

foreach ($usuarios as $usuario) {
      $id = $usuario['id'];
      echo "<tr>";
      echo "<td>{$id}</td>";
      echo "<td>{$usuario['nome']}</td>";
      echo "<td>{$usuario['descricao']}</td>";
      echo "<td>{$usuario['quantidade']}</td>";
      echo "<td>{$usuario['codigobarra']}</td>";
      echo "<td>{$usuario['preco']}</td>";
      echo "<td>{$usuario['nomepaga']}</td>";
      echo "<td>{$usuario['tipo']}</td>";
      echo "<td>
<a href='View/Usuario/editar.php?id={$id}'>Editar</a> 
<a href='View/Usuario/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">Deletar</a></td>";
      echo "</tr>";
    }

   
  
 echo "</table>";


?>
