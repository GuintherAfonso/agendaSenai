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
<div class="container">
<h1>ADICIONAR USUÁRIO</h1>
<form method="post" action="adicionar_usuario_submit.php">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    Email: <br>
    <input type="email" name="email"><br><br>
    Senha: <br>
    <input type="password" name="senha"><br><br>
    Permissões: <br>
    <select type="text" name="permissoes">
    <option value="ADD">ADD</option>
        <option value="EDIT">EDIT</option>
        <option value="DEL">DEL</option>
        <option value="SUPER">SUPER</option>
        <option value="ADD,EDIT,DEL,SUPER">TODAS</option>
        <option value="">NENHUMA</option>
    </select>   
        <br><br>
    <input class="button" type="submit" name="btCadastrar" value="ADICIONAR">
    <a class="button" href="gestao_usuarios.php">VOLTAR</a>
</form>



</div>
 
<?php require 'inc/footer.inc.php';?>