<?php
session_start();
$rolS=$_SESSION['rol'];
include 'loginModel.php';
if(!empty($rolS)&&$rolS=='administrador'){
    $producto= $_GET['nombre'];
    $objModel= new loginModel();
    $objModel->elimarProductoSimple($producto);
    echo " El Producto " .$producto. " ha sido eliminado";
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style3.css">
    <title>Eliminacion completada de productos </title>
</head>
<body>
    
<br>
<a href="inventario.php">Mostrar otros productos</a>
<br>
<a href="login2.php">Salir del administrador de Productos</a>

</body>
</html>

<?php
}
else{
    header("location: login.php");
}

?>