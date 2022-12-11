
<?PHP
require_once("loginModel.php"); 
$producto= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$precio= $_POST['precio'];
$estado= $_POST['estado'];
//Recupero el elementro de la imagen
$imagen= $_FILES['imagen']['name'];

if(empty($producto) || empty($descripcion) || empty($precio)|| empty($estado)){
echo"Hay Datos vacios";

}
else{
    //Valido que la imagen exista
if(isset($imagen) && $imagen!=""){
    //Obtengo el tipo de formato del archivo
    $tipo = $_FILES['imagen']['type'];
    //Obtengo el nombre temporal
$temp = $_FILES['imagen']['tmp_name'];

if(strpos($tipo,'gif')||strpos($tipo,'jpg')||strpos($tipo,'jpeg')||strpos($tipo,'webp')||strpos($tipo,'png')){

}

       try{
        $objLogin= new loginModel();
        $ruta='img'.$imagen;
        $mensaje=$objLogin->agregarProducto($producto,$descripcion,$precio,$estado,$ruta);
        move_uploaded_file($temp,'img'.$imagen);
        echo "¡Registro Exitoso!";
        ?>
     
            <?php
    }
    catch(PDOException $error){
        print "¡¡¡33RRRO0R!!!: " . $error->getMessage();
        die();
    }
}
else{
    echo "Las extensiones soportadas de imagen solo son GIF,Jpeg,webp o Png";
   ?>
    <a href="inventario.php">Volver atras</a>
    <?php
}
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, Initial-scale=1.0"> 
 <link rel="stylesheet" href="css2/style5.css">
 <title> Producto agregado </title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br><br>
    <a href="login2.php">Quit edit products</a>
    <a href="inventario.php">Volver atras</a>
</body>
</html>