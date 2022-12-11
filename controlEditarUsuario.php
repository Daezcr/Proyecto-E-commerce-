<?php
//Recuperamos la sesion
session_start();
//Asignamos el rol de la sesion a variable local
$rolS = $_SESSION['rol'];
//Validamos que no este vacio y que sea un administrador
if(!empty($rolS) && $rolS=='administrador'){
    include 'loginModel.php';
    $usuario= $_POST['usuario'];
    $pass= $_POST['pass'];
    $rol = $_POST['rol'];
    $objModel = new loginModel();
    //$objModel->editarUsuarios($usuario,$password);
    //$objModel->editarUsuariosProcedimiento($usuario,$password);
    $objModel->editarUsuariosCompleto($usuario,$pass,$rol);
    echo "¡Tus datos han sido actualizados exitosamente!";
}
else{
    header("location: login.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css2/style.css">
    <title>Editar Usuario Exitoso</title>
</head>
<body>
    <br><br>
    <a href="mostrarUsuarios.php"> Registro de Usuarios </a>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 

<a href="login.php"> Salir del administrador de usuarios </a>
</body>
</html>

