<?php
include_once '../procesos/conexion.php';
var_dump($_POST);
var_dump($_SESSION);
$usuario_id = $_SESSION['usuario']['id'];
$categoria_id = $_POST['categoria'];
$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
$errores = array();
if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $titulo)){
    $errores['titulo'] = "Caracteres invalidos";
}
$descripcion = htmlspecialchars($descripcion);

$query = "INSERT INTO entradas VALUES(null, $usuario_id, $categoria_id, '$titulo', '$descripcion', CURDATE());";
$agregar = mysqli_query($db, $query);
if($agregar){
    $_SESSION['entrada-agregada'] = "Articulo guardado exitosamente";
}else{
    $_SESSION['fallo-guardar'] = 'Fallo al guardar tu informacion, intentalo de nuevo.';
    header("Location: ../blog-inicio.php?perfil=true");
}
header("Location: ../blog-inicio.php");
