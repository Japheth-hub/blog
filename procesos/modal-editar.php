<?php
include_once 'helpers.php';
$entradas = modalEditar($db, $_GET['entrada_id']);
while($entrada = mysqli_fetch_assoc($entradas)){
    $_SESSION['entradas'] = $entrada;
}
if(!empty($_GET) && $_GET['editar']== "true"):?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <a href="blog-inicio.php?editar=false"><span class="close">&times;</span></a>
        <h2>Modificar Articulo</h2>
        <form action="procesos/editar-entradas.php" method="POST">
            <?= isset($_SESSION['fallo-guardar']) ? "<p class='alerta-exito'>".$_SESSION['fallo-guardar']."</p>" : "" ?>
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?= $_SESSION['entradas']['titulo'] ?>"  required>
            <select name="categoria">
                <?php 
                unset($_SESSION['fallo-guardar']);
                $query = "SELECT * FROM categorias;";
                $categorias = mysqli_query($db, $query);
                while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $_SESSION['entradas']['categoria_id'] ? "selected" : "" ?> ><?=$categoria['nombre']?></option>
                <?php endwhile  ?>
            </select>
            <label>Descripcion</label>
            <textarea name="descripcion" rows="8" required><?= $_SESSION['entradas']['descripcion'] ?></textarea>
            <input type="submit" value="Actualizar">
            
        </form>
    </div>
</div>

<?php endif; ?>


