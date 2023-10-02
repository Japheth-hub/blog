<?php
    if(isset($_GET['categoria'])):
    $categorias = mysqli_query($db, $query);    
    while($categoria = mysqli_fetch_assoc($categorias)):
        if($categoria['id'] == $_GET['categoria']):
?>
           <h3><?=$categoria['nombre']?></h3> 
<?php 
    endif;
    endwhile;
    else:
?>
    <h3>Nombre de las Categorias</h3> 
<?php endif ?>

<div class="entradas">
    <?php
    if(isset($_GET['categoria'])):
    $query3 = "SELECT e.id AS entrada_id, e.usuario_id AS id_usuario, c.id AS id,  CONCAT(u.nombre,' ',u.apellidos) AS nombre, c.nombre AS categoria, e.titulo AS titulo, e.descripcion AS descripcion, e.fecha AS fecha  FROM entradas e INNER JOIN usuarios u ON usuario_id= u.id INNER JOIN categorias c ON categoria_id=c.id;";
    $entradas = mysqli_query($db, $query3);
    while ($entrada = mysqli_fetch_assoc($entradas)):
        if($entrada['id'] == $_GET['categoria'] ):
    ?>
    <div class="entrada">
        <?= $_SESSION['usuario']['id'] == $entrada['id_usuario'] ? "<a href='blog-inicio.php?editar=true&entrada_id=".$entrada['entrada_id']."'><span class='edit'>&#9998;</span></a> <a href='procesos/eliminar.php?entrada_id=".$entrada['entrada_id']."'><span class='close'>&times;</span></a>" : "" ?>
        <h4><?= $entrada['titulo'] ?></h4>
        <span><?= $entrada['nombre'] ?> || <?= $entrada['fecha'] ?></span>
        <p><?= $entrada['descripcion'] ?></p>
        <hr>
    </div>
    <?php 
    endif;
    endwhile;
    else:?>
    <p class="texto-entradas">A qui se mostrara la informacion de la categoria que deseas ver.<br>
        Selecciona una de las categorias que se encuantran en la parte superior.</p>
    <?php
    endif;
    ?>
</div>

