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
<div class="container">
<h1>EDITAR USUÁRIO</h1>
<form method="post"  action="editar_usuario_submit.php" >
    <input type="hidden" name="id" value="<?php echo $info['id'];?>">
    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome'];?>"><br><br>
    Email: <br>
    <input type="email" name="email" value="<?php echo $info['email'];?>"><br><br>
    Senha: <br>
    <input type="password" name="senha" value="<?php $info['senha'];?>"><br><br>
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
    
    
    <input class="button" type="submit" value="SALVAR"> 
    <a class="button" href="gestao_usuarios.php">VOLTAR</a>
</form>


</div>
 
<?php require 'inc/footer.inc.php';?>