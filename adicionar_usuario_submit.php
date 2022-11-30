<?php
include 'classes/usuarios.class.php';
$usuario = new Usuarios();

if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $permissoes = $_POST['permissoes'];

    $usuario->adicionar($nome, $email, $senha, $permissoes);
    header("Location: gestao_usuarios.php");
    
}else{
    echo '<script type="text+javascript">alert("Email já cadastrado!")</script>';
}
?>