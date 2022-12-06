<?php
session_start(); 
require 'inc/header.inc.php';
require 'classes/usuarios.class.php';
$usuario = new Usuarios();
$usuario->setUsuario($_SESSION['logado']);

if(!isset($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}
if(!$usuario->temPermissoes('SUPER')){
    header("Location: /agendaSenai");
    exit;
}



?>

<h1><center>ADICIONAR USUÁRIO</center></h1>
<form method="post" action="adicionar_usuario_submit.php" align="center">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    Email: <br>
    <input type="email" name="email"><br><br>
    Senha: <br>
    <input type="password" name="senha"><br><br>
    Permissões: <br>
    <input type="text" name="permissoes"><br><br>
    
    <input type="submit" name="btCadastrar" value="ADICIONAR">

</form>

<br>
<center><button><a href="gestao_usuarios.php">VOLTAR</a></button></center>
 
 
<?php require 'inc/footer.inc.php';?>