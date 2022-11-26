<?php
require_once 'conexao.class.php';

class Usuarios {
    private $con; //variavel que recebe a conexao

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $permissoes; //ADD,EDIT,DEL,SUPER 

    public function __construct(){
        $this->con = new Conexao();
    }

    /* aqui fazer o CRUD para usuarios
        -adicionar
        -listar
        -buscar
        -editar
        -excluir 
    */
    
    //métodos referentes ao login
    public function fazerLogin($email, $senha){
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();

            $_SESSION['logado'] = $sql['id'];
            return TRUE;
        }
        return FALSE;
    }
}
