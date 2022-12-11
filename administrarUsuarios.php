<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <title>Edita los usuarios</title>
</head>
<body>
    </html>
    <?php
    include 'loginModel.php';
    //Iniciamos la sesion
    session_start();
    //Pasamos el rol a una variable local
    $rol = $_SESSION['rol'];

if (!empty($rol) && ($rol=='administrador')) {
}
    else{
        Header("Location:login.php");
    }
    $objModel = new loginModel();
    $resultado = $objModel->obtenerTodosUsuariosLista();
    ?>
    <html>
       
<form action="controlEliminarUsuarios.php" method="post"> Que usuario deseas borrar?<br><br>
    
    <select name="usuario">
        <?php
        foreach($resultado as $dato){?>
        <option value=<?php echo $dato['usuario'];?>> <?php echo $dato
        ['usuario'];}?></option>
        <input type="submit" name="submit" value="Eliminar">
    </select>
        </form>
        <form action="editarUsuarios.php" method="POST"> Que usuario deseas editar?<br><br>
            <select name="usuario">
                <?php
                foreach($resultado as $dato){?>
                <option value=<?php echo $dato['usuario'];?>><?php
                echo $dato['usuario'];}?></option>
                <input type="submit" name="submit" value="Editar Usuario"> 
            </select>
        </form>

        <form action="mostrarUsuarios.php" method="post"> USUARIOS REGISTRADOS:<BR><BR>
            <input type="submit" value="Mostrar Usuarios">
            <br><br><br><br><br><br><br><br><br><br><bR><br><br><BR>
            <a href="login.php">Volver Al inicio</a>
        </form>
</body>
</html>