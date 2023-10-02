<?php
function buscar($conexion, $texto){
    $sql = "SELECT e.id AS entrada_id , e.usuario_id AS id_usuario, e.titulo AS titulo ,e.descripcion AS descripcion, c.nombre AS categoria, CONCAT(u.nombre, ' ', u.apellidos) AS nombre, e.fecha AS fecha FROM entradas e "
        ."INNER JOIN categorias c ON c.id = e.categoria_id "
        ."INNER JOIN usuarios u ON u.id = e.usuario_id "
        ."WHERE e.descripcion LIKE '%$texto%' OR e.titulo LIKE '%$texto%' "
        ."OR c.nombre LIKE '%$texto%' OR u.nombre LIKE '%$texto%' OR u.apellidos LIKE '%$texto%';";
    $buscador = mysqli_query($conexion, $sql);
    $result = array();
    if($buscador && mysqli_num_rows($buscador)>=1){
        $result = $buscador;
    }else{
        $result = "";
    }
    return $result;
}

function modalEditar($conexion, $entrada){
    $sql = "SELECT * FROM entradas WHERE id=$entrada;";
    $select = mysqli_query($conexion, $sql);
    $result=array();
    if($select && mysqli_num_rows($select)==1){
        $result = $select;
    }
    return $result;
}
