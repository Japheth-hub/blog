<?php
include_once 'conexion.php';
//Obtenemos los datos del formulario login por el metodo post
$correo = $_POST['email'];
$password = $_POST['password'];

//Verificamos que exista el correo en la base de datos
$query = "SELECT * FROM usuarios WHERE correo='$correo'";
$verificar_correo = mysqli_query($db, $query);
if(mysqli_num_rows($verificar_correo) == 0){
    $_SESSION['correo-inexistente'] = "Este correo no existe.";
    header("Location: ../index.php?login=true");
} else {
//Si el correo existe ahora verificamos que la contraseña sea la del usuario
    $usuario = mysqli_fetch_assoc($verificar_correo);
    if($password == $usuario['contraseña'] || password_verify($password, $usuario['contraseña'])){
        if(!password_verify($password, $usuario['contraseña'])){
            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            $query2 = "UPDATE usuarios SET contraseña='$password_segura' WHERE correo='$correo';";
            $encriptar_password = mysqli_query($db, $query2);
        }
        $_SESSION['usuario'] = $usuario;
        header("Location: ../blog-inicio.php");
    }else {
        $_SESSION['contraseña-incorrecta'] = "La contraseña es incorrecta.";
        header("Location: ../index.php?login=true");
    }
}










