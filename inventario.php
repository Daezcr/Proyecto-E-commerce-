<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.0-web/css/all.css">
 <link rel="stylesheet" href="css2/style5.css">
    <title>Inventario de los productos</title>
</head>
<body>
<?php
include 'loginModel.php';
//Iniciamos la sesión en este archivo
session_start();
//Pasamos la variable de sesion a una variable local
     $rol=$_SESSION['rol'];
if(!empty($rol) && ($rol =='administrador')){
    $objLogin= new loginModel();
     $datos = $objLogin->obtenerTodosProductos();

    ?>
    <caption>INVENTARIO DE NUESTROS PRODUCTOS</caption><br><br>
    <a href="crearProductosAdmin.php"> Añadir productos nuevos </a>
    <table border="1">
        <br><br>
        <tr>
            <th>
                Nombre del producto
            </th>
            <th>
                Descripción del producto
            </th>
            <th>
                 Precio del producto
            </th>
            <th>
                   Acciones 
            </th>

</tr>
<?php
foreach($datos as $dato){?>
<tr>
<tr>
    <td><!--Aca va el valor del Usuario-->
<?php echo $dato['nombre']?>
    </td>
    <td><!--Aca va el valor del  Apellido Usuario-->
<?php echo $dato['descripcion']?>
    </td>
    <td><!--Aca va el valor del Apellido maternoUsuario-->
<?php echo $dato['precio']?>
</td>
<td>
<a href="editarProductos.php?nombre=<?php echo $dato['nombre']?>">Editar</a>
         --
          <a href="eliminarProductos.php?nombre=<?php echo $dato['nombre']?>">Eliminar</a>
    </td>
</tr> 
<?php
 }
?>
    </td>
</table>
<a href="mostrarUsuarios.php">Volver atrás.. </a>

</body>
<?php
 }
 else{
    Header("Location: login.php");
 }
 ?>
</html>