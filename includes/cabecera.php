<?php
$nombre = $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'];
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/blog-inicio.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <meta charset="uft-8">
        <title>Blog De Vehiculos</title>
    </head>
    <body>
        <div class="cabecera">
            <div class="titulo">
                <h1>Blog de Vehiculos</h1>
                <h3>Bienvenido <?=$nombre?></h3>
                <div class="iconos-redes">
                    <a href="https://github.com/Japheth-hub" target="_blank"><i class="bi bi-github"></i></a>
                    <a href="https://www.linkedin.com/in/angel-japheth-ramirez-aguilar-54171319b/" target="_blank"><i class="bi bi-linkedin"></i></a>
                    <a href="whatsapp://send?phone=+522381018966" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    <a href="mailto:japheth.ra369@gmail.com" target="_blank"><i class="bi bi-envelope-at"></i></a>
                    <a class="list"><i class="bi bi-list"></i></a>
                    <div class="menu">
                        <div class="nombre-usuario"><h4><?=$nombre?></h4></div>
                        <div class="opcion"><a href="">Crear Categoría</a></div>
                        <div class="opcion"><a href="blog-inicio?entrada=true">Crear Entrada</a></div>
                        <div class="opcion"><a href="blog-inicio.php?perfil=true">Perfil</a></div>
                        <div class="opcion"><a href="index.php">Cerrar Sesión</a></div>
                    </div>
                </div>
            </div>
            

