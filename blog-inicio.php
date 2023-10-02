<?php
include_once 'procesos/conexion.php';
if(empty($_SESSION['usuario'])){
    header("Location: index.php");
}
if(isset($_GET['perfil']) && $_GET['perfil'] == "true"){
    include_once 'procesos/modal-perfil.php';
}
if(isset($_GET['entrada']) && $_GET['entrada'] == "true"){
    include_once 'procesos/modal-entrada.php';
}
if(isset($_GET['editar']) && $_GET['editar'] == "true"){
    include_once 'procesos/modal-editar.php';
}
include_once 'procesos/helpers.php';
require_once 'includes/cabecera.php';
require_once 'includes/contenido.php';
require_once 'includes/footer.php';

