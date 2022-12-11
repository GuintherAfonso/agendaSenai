<?php
session_start(); 
require 'inc/header.inc.php';
require 'classes/contatos.class.php';
require 'classes/usuarios.class.php';
$contato = new Contatos();

if(!isset($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}

$usuario = new Usuarios();
$usuario->setUsuario($_SESSION['logado']);

if(!$usuario->temPermissoes('ADD')){
    header("Location: /agendaSenai");
    exit;
}



?>
<div class="container">
<h1>ADICIONAR CONTATO</h1>
<form method="post"  action="adicionar_contato_submit.php">
    Nome: <br>
    <input type="text" name="nome"><br><br>
    DDD: <br>
    <input type="text" name="ddd"><br><br>
    Telefone: <br>
    <input type="text" name="telefone"><br><br>
    Email: <br>
    <input type="email" name="email"><br><br>
    CPF: <br>
    <input type="text" name="cpf"><br><br>
    Endereço: <br>
    <input type="text" name="endereco"><br><br>
    
    <input class="button" type="submit" name="btCadastrar" value="ADICIONAR">
    <a class="button" href="index.php">VOLTAR</a>
</form>


</div>
<?php require 'inc/footer.inc.php';?>