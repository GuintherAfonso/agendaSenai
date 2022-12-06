<?php
include 'classes/usuarios.class.php';
$usuario = new Usuarios();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $usuario->excluir($id);
    header("Location: gestao_usuarios.php");
}else{
    echo '<script type="text/javascript">alert("Erro ao excluir usuário!");</script>';
    header("Location: gestao_usuarios.php");
}
?>