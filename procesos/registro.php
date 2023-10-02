<?php
//Conexion a la base de datos
include_once 'conexion.php';

//En este arreglo almacenaremos los errores quee vallan saliendo
$errores = array();

//Obtenemos el valor de las variables por medio del formulario con el metodo post
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
$correo = isset($_POST['correo']) ? mysqli_real_escape_string($db, $_POST['correo']) : false;
$contraseña = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
 
//Confirmamos que los datos que nos llegan del formulario sean los correctos
if(empty($nombre) || preg_match("/[0-9]/", $nombre)){
    $errores["nombre"] = "Nombre invalido";
}
if(empty($apellidos) ||preg_match("/[0-9]/", $apellidos)){

    $errores["apellidos"] = "Apellido invalido";
}
if(empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $errores["correo"] = "Correo Vacio";
}
if(empty($contraseña) || !preg_match('/^[a-zA-Z0-9.-_]+$/', $contraseña)){
    $errores["password"] = "Contraseña invalida";
}

//Verificamos si el correo que el usuario proporciona ya esta registrado
$sql = "SELECT * FROM usuarios WHERE correo='$correo';";
$verificar_correo = mysqli_query($db, $sql);
if(mysqli_fetch_row($verificar_correo) != 0){
    $errores['correo-existente'] = "Este correo ya ha sido registrado.";
}
if(count($errores)== 0){
    //Encriptamos bien la contraseña
    $password_segura = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]);
    $query = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$correo', '$password_segura', CURDATE());";
    $guardar = mysqli_query($db, $query);
    
    if($guardar){
        $_SESSION['registro-exitoso'] = 'Tu Registro fue exitoso, ahora ya puedes inicar sesion.';
    }else{
        $_SESSION['fallo-guardar'] = 'Fallo al guardar tu informacion, intentalo de nuevo.';
    }
    
}else{  
    $_SESSION['errores'] = $errores;
}
header("Location: ../index.php");
