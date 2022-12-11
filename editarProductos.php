<?php
//Recupero la sesion creada
session_start();
//Incluyo mi modelo donde estan mis funciones
include 'loginModel.php';
//Asigno el rol a una variable local
$rolS=$_SESSION['rol'];
if(!empty($rolS)&&($rolS=='administrador')){
    //Recibo el usuario a la variable local desde la url(GET)
    $producto= $_GET['nombre'];
    $objModel = new loginModel();
    $resultado = $objModel->obtenerTablaProductos($producto);
    $producto = $resultado[0]['nombre'];
    $descripcion = $resultado[0]['descripcion'];
    $precio = $resultado[0]['precio'];

?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style5.css">
    <title>Editar productos </title>
</head>
<body><BR>
    EDITA LA DESCRIPCION O PRECIO DEL PRODUCTO <BR><BR><BR>
    <form action="controlEditarProducto.php" method="POST">
       <table border="1">
        <tr>
            <th>
                Producto:
            </th>
            <th>
                Descripcion:
            </th>
            <th>
                Precio
            </th>
        </tr>
        <tr>
            <td>
                <input type="text" value=<?php echo $producto; ?>  readonly name="producto">
            </td>
            <td>
                <input type="text" value=<?php echo $descripcion; ?> name="descripcion">
            </td>
            <td>
                <input type="text" value=<?php echo $precio; ?> name="precio">
            </td>
        
        </tr>
                </table>
                <input type="submit" value="Actualizar">
    </form><br>
    <a href="inventario.php"> Editar otro producto  </a>
</body>
</html>
<?php
 }
 else {
     header("Location: login.php");
 }
 ?>