<?php
include'loginModel.php';
//Iniciamos la sesion
session_start();
if(isset($_POST['submit'])){
    $usuario= $_POST['user'];
    $contrasena= $_POST['pass'];

if(empty($usuario)|| empty($contrasena)){
    header('Location: login2.php');
    echo "Datos vacios";
}
else{

    $objUser= new loginModel();
    $bandera= $objUser->getUser($usuario,$contrasena);

    if($bandera){
        /*LLamamos al metodo nuevo obtener rol usuario para obtener el nombre de usuario y rol*/
        $respuesta=$objUser->obtenerUsuarioRol($usuario);
        //Damos el valor del usuario a la variable de sesion
        $_SESSION['usuario']=$respuesta[0]['usuario'];
    //Damos el valor del rol a la variable de sesion
        $_SESSION['rol']=$respuesta[0]['rol'];
        //Si el usuario es administrador puede modificar los demas usuarios
        if($respuesta[0]['rol']=='administrador'){
      
             header('Location: mostrarUsuarios.php');
        }
        //Si el usuario no es admin solo puede modificar sus propios datos
        else{
            //echo"Normal";
            header('Location: login.php');
        }
    }
    else{
        header('Location: login.php');
    }
  }
}
else{
    echo "Datos vacios";
}
?>