<?php
class UsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarUsuario($id): array {
        $stmt = $this->pdo->query("SELECT * FROM users WHERE id = $id");
        return $stmt->fetch  (PDO::FETCH_ASSOC);
    }






    public function cadastrar($nome,$email,$senha){
$sql = "INSERT INTO users (nome, descricao, quantidade, codigobarra, preco,nomepaga,tipo) VALUES (:nome, :descricao, :quantidade, :codigobarra, :preco,:nomepaga,:tipo)";
$stmt = $this->pdo->prepare($sql);
     $stmt->execute([
    ':nome' => $nome,
     ':email' => $email,
     ':senha' => $senha
]);


    }
public function login($email,$senha,$id){

       $stmt = $this->pdo->query("SELECT * FROM users WHERE email = $email");
        return $stmt->fetch  (PDO::FETCH_ASSOC);
    if($email && $senha === $_SESSION['email'] && $_SESSION['senha']){
header('location:cadastrar.php');
    }
}

   public function editar($nome,$email,$senha,$id){
$sql = "UPDATE users SET nome=?, email=?, senha=? WHERE id=?";
$stmt = $this->pdo->prepare($sql);
return $stmt->execute([$nome,$email, $senha,$id]);


    }



    public function deletar($id){
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $this->pdo->prepare($sql);
return $stmt->execute([
   $id
]);  }


}



?>