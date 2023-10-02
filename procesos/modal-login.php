<?php

if(!empty($_GET) && $_GET['login']== "true"):?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <a href="index.php?login=false"><span class="close">&times;</span></a>
        <h2>Login</h2>
        <form action="procesos/login.php" method="POST">
            <label for="email">Correo:</label>
            <input type="email" name="email" required>
            <?= isset($_SESSION['correo-inexistente']) ? "<p class='alerta-error'>".$_SESSION['correo-inexistente']."</p>" : "";?>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <?= isset($_SESSION['contraseña-incorrecta']) ? "<p class='alerta-error'>".$_SESSION['contraseña-incorrecta']."</p>" : "";?>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</div>

<?php endif; ?>
