<?php
session_start();
include 'inc/header.inc.php';
include 'classes/contatos.class.php';
include 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
}

$contatos = new Contatos();
$usuarios = new Usuarios();
$usuarios->setUsuario($_SESSION['logado']);

?>

<h1><center>Contatos</center></h1>
<hr>
<?php if($usuarios->temPermissoes('ADD')): ?><button><a href="adicionar_contato.php">ADICIONAR</a></button><?php endif; ?>

<?php if($usuarios->temPermissoes('SUPER')): ?><button style="float:right"><a href="gestao_usuarios.php">GESTÃO DE USUÁRIOS</a></button><?php endif; ?>
<br>
<hr>
<table border="1" width="100%">
        <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DDD</th>
                <th>CELULAR</th>
                <th>EMAIL</th>
                <th>CPF</th>
                <th>ENDEREÇO</th>
                <th>AÇÕES</th>
        </tr>
        <?php
        $lista = $contatos->listar();
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
                        <?php echo $item['ddd']; ?>
                </td>
                <td>
                        <?php echo $item['telefone']; ?>
                </td>
                <td>
                        <?php echo $item['email']; ?>
                </td>
                <td>
                        <?php echo $item['cpf']; ?>
                </td>
                <td>
                        <?php echo $item['endereco']; ?>
                </td>
                <td>
                       <?php if($usuarios->temPermissoes('EDIT')): ?><button><a href="editar_contato.php?id=<?php echo $item['id']; ?>">EDITAR</a></button><?php endif; ?>
                       <?php if($usuarios->temPermissoes('DEL')): ?><button><a href="excluir_contato.php?id=<?php echo $item['id']; ?>" onclick="return confirm('Você tem certeza que quer excluir este contato?')">EXCLUIR</a></button><?php endif; ?>
                </td>
        </tr>
        <?php
        endforeach;
        ?>
</table>
<br>
<hr>
 <button><a href="sair.php">SAIR</a></button>
 <hr>



<?php
include 'inc/footer.inc.php';
?>