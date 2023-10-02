<?php
$query = "SELECT * FROM categorias;";
$categorias = mysqli_query($db, $query);
?>
            <div class="categorias">
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <a href="blog-inicio.php?categoria=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                <?php endwhile  ?>
                <form action="blog-inicio.php" method="GET" class="search">
                    <input type="text" name="buscar" placeholder="Buscar"><button type="submit" class="lupa"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <div class="contenido"> 
            <?= isset($_SESSION['entrada-agregada']) ? "<p class='alerta-exito'>".$_SESSION['entrada-agregada']."</p>" : "" ?>
            <?php
            unset($_SESSION['entrada-agregada']);
            if(isset($_GET['buscar'])){
                include_once 'includes/busqueda.php';
            }else{
                include_once 'includes/contenido-principal.php';
            }?>
        </div>
    </<body>
</html>