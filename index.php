<?php
include_once 'procesos/conexion.php';
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/index.css">
        <meta charset="uft-8">
        <title>Blog De Vehiculos</title>
    </head>
    <body>
        <div class="titulo">
            <h1>Blog de Vehiculos</h1>
            <a href="index.php?login=true"><button>Login</button></a>
            <?php include_once 'procesos/modal-login.php'; ?>
        </div>
        <div class="alertas">
            <?= isset($_SESSION['registro-exitoso']) ? "<p class='alerta-exito'>".$_SESSION['registro-exitoso']."</p>" : "" ?>
            <?= isset($_SESSION['fallo-guardar']) ? "<p class='alerta-error'>".$_SESSION['fallo-guardar']."</p>" : "" ?>
        </div>
        <div class="registro">
            <form action="procesos/registro.php" method="POST">
                <h3 class="registrarse">Registrarse</h3>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
                <span><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : ''; ?></span>
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
                <span><?= isset($_SESSION['errores']['apellidos']) ? $_SESSION['errores']['apellidos'] : ''; ?></span>
                <label>Correo</label>
                <input type="email" name="correo" required>
                <span><?= isset($_SESSION['errores']['correo']) ? $_SESSION['errores']['correo'] : ''; ?></span>
                <span><?= isset($_SESSION['errores']['correo-existente']) ? $_SESSION['errores']['correo-existente'] : ''; ?></span>
                <label>Contraseña</label>
                <input type="password" name="password"required>
                <span><?= isset($_SESSION['errores']['password']) ? 'Contraseña Invalida' : ''; ?></span>
                <input type="submit" value="Guardar">
            </form>
            <?php
            session_unset();
?>
        </div>

    </body>
</html>

