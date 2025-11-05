<?php
require_once "model/usermodel.php";

class usercontroller{
    private $usermodel;
    private $pdo;

    public function __construct($pdo){
$this->usermodel = new usermodel ($pdo);
        
    }
    
    public function lista(){
        $usuarios = $this->usermodel->buscartodos();
        include_once "";
        return $usuarios;
    }    
    
public function buscaruser($id){
    $usuario = $this->usermodel->buscaruser($id);
    return $usuario;
}

public function cadastrar($nome,$email,$senha){
    return $this->usermodel->cadastrar($nome,$email,$senha);
}

public function login($email,$senha){
    return $this->usermodel->login($email,$senha);
}
















}

?>