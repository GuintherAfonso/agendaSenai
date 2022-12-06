<?php 
session_start();
require 'inc/header.inc.php';
require 'classes/usuarios.class.php';
$usuario = new Usuarios();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $usuario->busca($id);
    if(empty($info['email'])){
        header("Location: /agendaSenai");
        exit;
    }

}else{
    header("Location: gestao_usuarios.php");
    exit;
}

if(!isset($_SESSION['logado'])){
    header("Location: login.php");
    exit;
}

$usuario->setUsuario($_SESSION['logado']);

if(!$usuario->temPermissoes('SUPER')){
    header("Location: /agendaSenai");
    exit;
}


?>

<h1><center>EDITAR USUÁRIO</center></h1>
<form method="post" align="center" action="editar_usuario_submit.php" >
    <input type="hidden" name="id" value="<?php echo $info['id'];?>">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome'];?>"><br><br>
    Email: <br>
    <input type="email" name="email" value="<?php echo $info['email'];?>"><br><br>
    Senha: <br>
    <input type="password" name="senha" value="<?php echo $info['senha'];?>"><br><br>
    Permissões: <br>
    <input type="text" name="permissoes" value="<?php echo $info['permissoes'];?>"><br><br>
    
    
    <input type="submit" value="SALVAR"> 

</form>

<br>
<center><button><a href="index.php">VOLTAR</a></button></center>
 
 
<?php require 'inc/footer.inc.php';?>