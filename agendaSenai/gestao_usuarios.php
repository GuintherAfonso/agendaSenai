<?php
session_start();
include 'inc/header.inc.php';
include 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;

       
}

$usuarios = new Usuarios();
$usuarios->setUsuario($_SESSION['logado']);

if(!$usuarios->temPermissoes('SUPER')){
        header("Location: /agendaSenai");
        exit;
}

?>

<h1>Usuários</h1>
<hr>
<button class="buttonadd"><a href="adicionar_usuario.php">ADICIONAR</a></button> 

<button class="buttongestao"><a href="index.php">GESTÃO CONTATOS</a></button>
<hr>


<table class="table table-striped">

       <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>PERMISSÕES</th>
                <th>AÇÕES</th>
        </tr>
        <?php
        $lista = $usuarios->listar();
        foreach ($lista as $item):

        ?>
        <tr>
                <td>
                        <?php echo $item['id']; ?>
                </td> 
                <td>
                        <?php echo $item['nome']; ?>
                </td>
                <td>
                        <?php echo $item['email']; ?>
                </td>
                <td>
                        <?php echo $item['permissoes']; ?>
                </td>
                <td>
                        <button class="buttontable"><a href="editar_usuario.php?id=<?php echo $item['id']; ?>">EDITAR</a></button>
                        <button class="buttontable"><a href="excluir_usuario.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que quer excluir este usuário?')">EXCLUIR</a></button>
                </td>
        </tr>
        <?php
        endforeach;
        ?>


</table>  
<br>
<hr>
 <button class="button"><a href="sair.php">SAIR</a></button>

 
 
 <?php
include 'inc/footer.inc.php';
?>