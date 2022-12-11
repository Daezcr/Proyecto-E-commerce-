<?php
session_start();
$rolS= $_SESSION['rol'];

if(!empty($rolS)&& $rolS=='administrador'){
 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style4.css">
    <title> Crear Productos</title>
</head>
<body>
<form action="controlAgregarProductosAdmin.php" method="POST" enctype="multipart/form-data">
    <table border="1">
    <caption> Creación de productos nuevos</caption>
    <tr>
        <td>
            Nombre del producto:
        </td>
        <td>
            <input type="text" name="nombre" required>
            <tr>
        <td>
                descripcion de producto: 
        </td>
        <td>
            <input type="text" name="descripcion" required>
            <tr>
        <td>
            Precio del producto:
        </td>
        <td>
            <input type="text" name="precio" required>
            <tr>
        <td>
            Estado "1" por defecto:
        </td>
        <td>
            <input type="text" name="estado" required>
        </td>
    </tr>
        <tr>
            <td>
            Imagen del producto:
            </td>
            <td>
            <input type="file" name="imagen">
            </td>
        </tr>
    

        </tr>
        <tr>
            <td>
                <input type="submit" value="Crear Producto">
            </td>
            <td>
                <input type="reset" value="Borrar datos">
            </td>
        </tr>
</table>    <br>
<a href="inventario.php"> Lista de productos  </a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="login2.php">SALIR DEL ADMINISTRADOR DE USUARIOS</a>
</form>
</body>
</html>
<?php
 }
 else{
    header ("location:login.php");
 }
 ?>