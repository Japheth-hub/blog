<?php
//Conexion a la base de datos
include_once 'conexion.php';

//En este arreglo almacenaremos los errores quee vallan saliendo
$errores = array();

//Obtenemos el valor de las variables por medio del formulario con el metodo post
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
$correo = isset($_POST['correo']) ? mysqli_real_escape_string($db, $_POST['correo']) : false;
$contraseña = isset(($_POST['password'])) ? mysqli_real_escape_string($db, $_POST['password']) : false;

//Confirmamos que los datos que nos llegan del formulario sean los correctos
if(empty($nombre) || preg_match("/[0-9]/", $nombre)){
    $errores["nombre"] = "Nombre invalido";
}
if(empty($apellidos) || preg_match("/[0-9]/", $apellidos)){
    $errores["apellidos"] = "Apellido invalido";
}
if(empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $errores["correo"] = "Correo Vacio";
}
$id_usuario = $_SESSION['usuario']['id'];
//Verificamos si el correo que el usuario proporciona ya esta registrado
$sql = "SELECT * FROM usuarios WHERE correo='$correo' AND id!=$id_usuario;";
$verificar_correo = mysqli_query($db, $sql);
if(mysqli_fetch_row($verificar_correo) != 0){
    $errores['correo-existente'] = "El correo que proporcionaste ya existe.";
}
var_dump($_SESSION);
if(count($errores)== 0){ 
    if(empty($_POST['password'])){
        $contraseña = $_SESSION['usuario']['contraseña'];
            $query2 = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo='$correo' WHERE id=$id_usuario;";
            $guardar = mysqli_query($db, $query2);
            if($guardar){
                $_SESSION['registro-exitoso'] = 'Tus datos se actualizaron correctamente. Vuelva inciar sesion';
            }else{
                $_SESSION['fallo-guardar'] = 'Fallo al guardar tu informacion, intentalo de nuevo.';
            }
    }else{
        //Encriptamos bien la contraseña
        $password_segura = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]);
        $query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo='$correo', contraseña='$password_segura' WHERE id=$id_usuario;";
        $guardar = mysqli_query($db, $query);
        if($guardar){
            $_SESSION['registro-exitoso'] = 'Tu Registro fue exitoso, ahora ya puedes inicar sesion.';
        }else{
            $_SESSION['fallo-guardar'] = 'Fallo al guardar tu informacion, intentalo de nuevo.';
        }
    }
}else{  
    $_SESSION['errores'] = $errores;
    header("Location: ../blog-inicio.php?perfil=true");
}

header("Location: ../index.php");
