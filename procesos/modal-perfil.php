<?php

if(!empty($_GET) && $_GET['perfil']== "true"):?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <a href="blog-inicio.php?perfil=false"><span class="close">&times;</span></a>
        <h2>Mis Datos</h2>
        <form action="procesos/actualizar.php" method="POST">
            <h3 class="registrarse">Actualizar Datos</h3>
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>" required>
            <span><?= isset($_SESSION['errores']['nombre']) ? "<p class='alerta-error'>".$_SESSION['errores']['nombre']."</p>" : ''; ?></span>
            <label>Apellidos</label>
            <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos'] ?>" required>
            <span><?= isset($_SESSION['errores']['apellidos']) ? "<p class='alerta-error'>".$_SESSION['errores']['apellidos']."</p>" : ''; ?></span>
            <label>Correo</label>
            <input type="email" name="correo" value="<?= $_SESSION['usuario']['correo'] ?>" required>
            <span><?= isset($_SESSION['errores']['correo']) ? "<p class='alerta-error'>".$_SESSION['errores']['correo']."</p>" : ''; ?></span>
            <span><?= isset($_SESSION['errores']['correo-existente']) ? "<p class='alerta-error'>".$_SESSION['errores']['correo-existente']."</p>" : ''; ?></span>
            <label>Actualizar Contraseña</label>
            <input type="password" name="password">
            <span><?= isset($_SESSION['errores']['password']) ? "<p class='alerta-error'>Contraseña Invalida</p>" : ''; ?></span>
            <input type="submit" value="Actualizar">
        </form>
        <?php unset($_SESSION['errores']) ?>
    </div>
</div>

<?php endif; ?>
