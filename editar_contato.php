<?php 
session_start();
require 'inc/header.inc.php';
require 'classes/contatos.class.php';
require 'classes/usuarios.class.php';
$contato = new Contatos();
$usuario = new Usuarios();
$usuario->setUsuario($_SESSION['logado']);

if(!$usuario->temPermissoes('EDIT')){
    header("Location: /agendaSenai");
    exit;
}

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $contato->busca($id);
    if(empty($info['email'])){
        header("Location: /agendaSenai");
        exit;
    }

}else{
    header("Location: /agendaSenai");
    exit;
}

if(!isset($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}


?>

<h1><center>EDITAR CONTATO</center></h1>
<form method="post" align="center" action="editar_contato_submit.php">
    <input type="hidden" name="id" value="<?php echo $info['id'];?>">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome'];?>"><br><br>
    DDD: <br>
    <input type="text" name="ddd" value="<?php echo $info['ddd'];?>"><br><br>
    Telefone: <br>
    <input type="text" name="telefone" value="<?php echo $info['telefone'];?>"><br><br>
    Email: <br>
    <input type="email" name="email" value="<?php echo $info['email'];?>"><br><br>
    CPF: <br>
    <input type="text" name="cpf" value="<?php echo $info['cpf'];?>"><br><br>
    Endereço: <br>
    <input type="text" name="endereco" value="<?php echo $info['endereco'];?>"><br><br>
    
    <input type="submit" value="SALVAR">

</form>

<br>
<center><button><a href="index.php">VOLTAR</a></button></center>
 
 
<?php require 'inc/footer.inc.php';?>