<?php
include 'classe/contatos.class.php';
$contato = new COntatos();

if(!empty($GET['id'])){
    $id = $GET['id'];
    $contato->excluir($id);
    header("Location /agendaSenai");
}else{
    echo '<scrip type="text/javascript">alert("Erro ao excluir contato!");</script>';
    header("Location /agendaSenai");
}