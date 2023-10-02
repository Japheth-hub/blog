<?php

if(!empty($_GET) && $_GET['entrada']== "true"):?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <a href="blog-inicio.php?perfil=false"><span class="close">&times;</span></a>
        <h2>Crea tu articulo para este blog</h2>
        <form action="procesos/entradas.php" method="POST">
            <?= isset($_SESSION['fallo-guardar']) ? "<p class='alerta-exito'>".$_SESSION['fallo-guardar']."</p>" : "" ?>
            <label>Titulo</label>
            <input type="text" name="titulo"  required>
            <select name="categoria">
                <?php 
                unset($_SESSION['fallo-guardar']);
                $query = "SELECT * FROM categorias;";
                $categorias = mysqli_query($db, $query);
                while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <option value="<?= $categoria['id'] ?>"><?=$categoria['nombre']?></option>
                <?php endwhile  ?>
            </select>
            <label>Descripcion</label>
            <textarea name="descripcion" rows="8" required></textarea>
            <input type="submit" value="Crear">
        </form>
    </div>
</div>

<?php endif; ?>
