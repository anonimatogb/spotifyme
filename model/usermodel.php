<?php
class usermodel{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function buscartodos(){
        $stmt=$this ->pdo->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscaruser($id){
        $stmt=$this->pdo->query("SELECT * FROM user WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cadastrar ($nome,$email,$senha){
        try{
            $sql= "INSERT INTO user (nome,email,senha) VALUES (:nome,:email,:senha)";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute([
                ':nome'=> $nome,
                ':email'=> $email,
                ':senha'=> $senha,
            ]);
            return $this ->pdo->LastInsertId();
        }catch(PDOException $e){
    if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
        throw new Exception("E-mail já cadastrado!");
    } else {
        throw $e;
    }
}
    }
    public function login($email,$senha){
$stmt=$this->pdo->query("SELECT * FROM user WHERE email = $email");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if ($usuario && $senha === $usuario['senha']){
    return $usuario;
}
return false;
    }
}
?>