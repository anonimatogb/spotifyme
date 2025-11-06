<?php

class verificar{
    public function usuariopermitido($permitido){
        if($permitido === true){
            header('Location:index.php');
            exit;
        }
    }
}

?>