<?php require 'inc/header.inc.php';?>

<h1><center>ADICIONAR CONTATO</center></h1>
<form method="post" align="center" action="adicionar_contato_submit.php">
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
    
    <input type="submit" name="btCadastrar" value="ADICIONAR">

</form>
 
<?php require 'inc/footer.inc.php';?>