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

<div class="top">
        
                <a href="index.php">GESTÃO CONTATOS</a> 
                <a href="adicionar_usuario.php">ADICIONAR USUÁRIO</a>
                <a href="sair.php">SAIR</a>
</div>

<h1>Usuários</h1>




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
                        <a href="editar_usuario.php?id=<?php echo $item['id']; ?>">EDITAR</a>
                        <a href="excluir_usuario.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que quer excluir este usuário?')">EXCLUIR</a>
                </td>
        </tr>
        <?php
        endforeach;
        ?>


</table>  

 

 
 
 <?php
include 'inc/footer.inc.php';
?>