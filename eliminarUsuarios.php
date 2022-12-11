<?php
session_start();
$rolS=$_SESSION['rol'];
include 'loginModel.php';
if(!empty($rolS)&&$rolS=='administrador'){
    $usuario= $_GET['usuario'];
    $objModel= new loginModel();
    $objModel->elimarUsuarioSimple($usuario);
    echo " El usuario " .$usuario. " ha sido eliminado";
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style3.css">
    <title>Eliminacion completada de usuarios </title>
</head>
<body>
    
<br>
<a href="mostrarUsuarios.php">Mostrar otros usuarios</a>
<br>
<a href="login2.php">Salir del administrador de usuarios</a>

</body>
</html>

<?php
}
else{
    header("location: login.php");
}

?>