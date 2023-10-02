<?php
//include_once 'conexion.php';
//include_once 'helpers.php';
$palabra = $_GET['buscar'];
?>
<h3>Resultados de tu busqueda : "<?= $palabra ?>"</h3>
<div class="entradas">
    <?php
    if(isset($palabra)):
        $datos = buscar($db, $palabra);
        if(!empty($datos)):
        while($dato = mysqli_fetch_assoc($datos)):?>
        <div class="entrada">
            <?= $_SESSION['usuario']['id'] == $dato['id_usuario'] ? "<a href='blog-inicio.php?editar=true&entrada_id=".$dato['entrada_id']."'><span class='edit'>&#9998;</span></a> <a href='procesos/eliminar.php?entrada_id=".$dato['entrada_id']."'><span class='close'>&times;</span></a>" : "" ?>
            <h4><?= $dato['categoria'] ?></h4>
            <span><?= $dato['titulo'] ?> || <?= $dato['nombre'] ?> || <?= $dato['fecha'] ?></span>
            <p><?= $dato['descripcion'] ?></p>
            <hr>
        </div>
    <?php 
    $palabra = null;
    endwhile;
    endif;
    endif;
    ?>
</div>
    
    
    
    
    
    
    
    


</div>






