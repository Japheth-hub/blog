<?php
include_once '../procesos/conexion.php';
var_dump($_POST);
var_dump($_SESSION);
$entrada_id = $_SESSION['entradas']['id'];
$categoria_id = $_POST['categoria'];
$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
$errores = array();
if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $titulo)){
    $errores['titulo'] = "Caracteres invalidos";
}
$descripcion_segura = htmlspecialchars($descripcion);

$query = "UPDATE entradas SET categoria_id=$categoria_id, titulo='$titulo', descripcion='$descripcion_segura' WHERE id=$entrada_id; ";
$agregar = mysqli_query($db, $query);

if($agregar){
    $_SESSION['entrada-agregada'] = "Articulo actualizado exitosamente";
}else{
    $_SESSION['fallo-guardar'] = 'Fallo al guardar tu informacion, intentalo de nuevo.';
    header("Location: ../blog-inicio.php?editar=true");
}
unset($_SESSION['entradas']);
header("Location: ../blog-inicio.php");
