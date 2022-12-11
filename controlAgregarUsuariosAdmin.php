<?php
session_start();

$rolS= $_SESSION['rol'];

include 'loginModel.php';

if(!empty($rolS) && $rolS=='administrador'){

$usuario=$_POST['txtUsuario'];

$correo=$_POST['correo'];

$primerapellido=$_POST['primerapellido'];

$segundoapellido=$_POST['segundoapellido'];


$pass=$_POST['txtPassword'];

$rol=$_POST['rol'];

$objModel= new loginModel();

$objModel->AgregarUsuarioRol($usuario,$correo,$primerapellido,$segundoapellido,$pass,$rol);

echo "El usuario ".$usuario. " ha sido agregado con exíto!! con el rol de un usuario ".$rol;

}

else{

    header ("Location: login.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style3.css">
    <title>Registro de Usuario Exitoso </title><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <a href="crearUsuariosAdmin.php"> Crear un nuevo usuario </a><br><br><br>
    <a href="mostrarUsuarios.php"> Mostrar tabla de usuarios registrados</a><br><br><br><br>
    <a href="login2.php"> Salir del rol de administrador </a> 
</head>
<body>
    
</body>
</html>