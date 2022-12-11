<?php
include 'loginModel.php';
$usuario= $_POST['usuario'];
$objModel= new loginModel();
$objModel->elimarUsuarioSimple($usuario);
echo"El usuario ".$usuario." ha sido eliminado  correctamente!";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, Initial-scale=1.0"> 
 <link rel="stylesheet" href="css2/style.css">

 <title> Eliminación de Usuarios </title>
</head>
<body>
    <br>
    <a href="login.php">Volver al inicio</a>
</body>
</html>