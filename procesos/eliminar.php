<?php
include_once 'conexion.php';
var_dump($_SESSION);
var_dump($_GET);
$entrada_id = $_GET['entrada_id'];
var_dump($entrada_id);
$query = "DELETE FROM entradas WHERE id=$entrada_id;";
$borrar = mysqli_query($db, $query);
header("Location: ../blog-inicio.php");





