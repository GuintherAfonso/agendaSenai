<?php
session_start();
include 'inc/header.inc.php';
include 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
}

$usuarios = new Usuarios();

?>