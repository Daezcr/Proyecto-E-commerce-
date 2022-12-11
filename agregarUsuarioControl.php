
<?PHP
require_once("loginModel.php"); 
$usuario= $_POST['user'];
$primerapellido= $_POST['app'];
$segundoapellido= $_POST['apm'];
$correo= $_POST['email'];
//Recupero el elementro de la imagen
$imagen= $_FILES['imagen']['name'];
$pass= $_POST['password'];
if(empty($usuario) || empty($correo) || empty($primerapellido)|| empty($segundoapellido)|| empty($pass)){
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
        $mensaje=$objLogin->agregarUsuario($usuario,$correo,$primerapellido,$segundoapellido,$ruta,$pass);
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
    <a href="index.php">Inicio de sesion</a>
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
 <link rel="stylesheet" href="css2/style.css">
 <title> Usuario agregado </title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br><br>   <br><br><br><br><br><br><br><br><br>
    <a href="login.php"> Logueate con tu nuevo Usuario</a>
</body>
</html>