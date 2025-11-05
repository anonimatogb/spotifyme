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
$sql = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
$stmt = $this->pdo->prepare($sql);
     $stmt->execute([
    ':nome' => $nome,
     ':email' => $email,
     ':senha' => $senha
]);


    }

    public function login($email, $senha) {
        session_start();

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // usuário não encontrado:
        if (!$usuario){ return false;
        }

        // senha está batendo (sem criptografia por enquanto):
        if ($senha === $usuario['senha']) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            return true;
        }

        return false;
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