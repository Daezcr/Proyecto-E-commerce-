<?PHP 
require 'conexiondb.php';
class loginModel extends conexiondb{
    //Funcion que valida el inicio de sesion
    public function getUser($usuario,$pass){
        $sql = "SELECT count(*)from usuarios where usuario= '$usuario' and pass='$pass'";

        $resultado = $this->connect()->query($sql);
        $numero=$resultado->fetch();
        if($numero[0]==1){
          
        return true;

        }
        else{
            return false;
        }
    }
//Funcion que agreaga un usuario de rol normal
public function agregarUsuario($usuario,$correo,$primerapellido,$segundoapellido,$ruta,$pass){
    $sql = "INSERT INTO usuarios (usuario,correo,apellido_paterno,apellido_materno,ubicacion_imagen,pass) values (?,?,?,?,?,?)";
    $insercion=$this->connect()->prepare($sql);
    $arregloDatos=array($usuario,$correo,$primerapellido,$segundoapellido,$ruta,$pass);
    $resultadoInsercion = $insercion->execute($arregloDatos);
    $idInsert=$this->connect()->lastInsertId();
    //return $idInsert;
    return "Usuario Agregrado";
 }

//Funcion que agrega un usuario desde el administrador

public function AgregarUsuarioRol($usuario,$correo,$primerapellido,$segundoapellido,$pass,$rol){
if($rol){
    $sql="INSERT INTO usuarios (usuario,correo,apellido_paterno,apellido_materno,pass,rol) values (?,?,?,?,?,?)";
    $insercion=$this->connect()->prepare($sql);
    $arregloDatos=array($usuario,$correo,$primerapellido,$segundoapellido,$pass,$rol);
    $resultadoInsercion= $insercion->execute($arregloDatos);
    $idInsert=$this->connect()->lastInsertId();
    return  "Usuario Agregado";
}
else{
    return  "El usuario ya exite";
} 

 }

public function editarUsuarios($usuario,$password){
//Esta seria la manera mas sencilla de crear la consulta   
 //$sql="UPDATE usuarios SET pass='$password' WHERE usuario='$usuario'"; 
 $sql="UPDATE usuarios SET pass=? WHERE usuario='$usuario'"; 
 $update=$this->connect()->prepare($sql);
 $arregloDatos= array($password);
 $resultado=$update->execute($arregloDatos);
 //return $resultado;

}
public  function editarUsuariosProcedimiento($usuario,$password){
    //Esta serua la manera mas sencilla para ejecutar la actualizacion
    //$sql="CALL editarUsuario ('$usuario','$password')";
    $sql="CALL editarUsuario(?,?)";
    $update = $this->connect()->prepare($sql);
    $arrDatos=array($usuario,$password);
    $resultado= $update->execute($arrDatos);
}
//ESTA FUNCION ELIMINA DE MANERA SENCILLA AL USUARIO
public function elimarUsuarioSimple($usuario){
$sql="DELETE from Usuarios where usuario='$usuario'";
 $borrar=$this->connect()->query($sql);

}
//Eliminas el usuario pero pidiendo usuario y contraseña
public function elimarUsuarioDoble($usuario,$pass){ 
    $sql="DELETE from Usuarios where usuario='$usuario'AND password='$pass'";
 $borrar=$this->connect()->query($sql);

}
public function obtenerTodosUsuariosLista(){  
$sql="SELECT usuario from usuarios";
$ejecucion= $this->connect()->query($sql);
$resultado= $ejecucion->fetchAll(PDO::FETCH_ASSOC);
return  $resultado;
 }
 public function obtenerUsuarioRol($usuario){
    $sql= "SELECT usuario,rol from usuarios WHERE usuario='$usuario'";
    $ejecucion = $this->connect()->query($sql);
    $resultado = $ejecucion->fetchAll(PDO::FETCH_ASSOC);
    return  $resultado;
 }
 public function obtenerTodosUsuarios(){
    //La manera mas simple
    //$sql="SELECT * from usuarios";
    //Manera correcta
    $sql="SELECT usuario,apellido_paterno,apellido_materno,correo,pass,ubicacion_imagen,rol from usuarios";
    $execute=$this->connect()->query($sql);
    $resultado=$execute->fetchALL(PDO::FETCH_ASSOC);
    return $resultado;
 }
 //Funcion que obtiene la tabla completa de usuarios de un usuario en especifico
 public function obtenerTablaUsuarios($usuario){
    $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
    $execute = $this->connect()->query($sql);
    $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
 }
 //Funcion que me actualiza todos los valores de la tabla de Usuarios, es decir la tabla completa salvo la llave primaria
 public function editarUsuariosCompleto($usuario,$pass,$rol){
    $sql="UPDATE usuarios SET  usuario = ?, pass = ?,rol = ? WHERE usuario = '$usuario'";
    $preparado= $this->connect()->prepare($sql);
    $arregloDatos=array($usuario,$pass,$rol);
    $resultado= $preparado->execute($arregloDatos);

 }
 public function obtenerCantidadUsuariosRegistrados(){
    $sql="SELECT COUNT(*) as total_usuarios FROM usuarios";
    $execute= $this->connect()->query($sql);
    $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
 }
 public function obtenerTodosUsuariosLimitados($origen,$fin){
    $sql="SELECT usuario,apellido_paterno,apellido_materno,correo,pass,ubicacion_imagen,rol from usuarios LIMIT $origen, $fin";
    $execute=$this->connect()->query($sql);
    $resultado=$execute->fetchALL(PDO::FETCH_ASSOC);
    return $resultado;
}
public function obtenerTodosProductos(){
    $sql="SELECT nombre,descripcion,precio from producto";
    $execute=$this->connect()->query($sql);
    $resultado=$execute->fetchALL(PDO::FETCH_ASSOC);
    return $resultado;
}
public function obtenerTablaProductos($producto){
    $sql="SELECT * FROM producto WHERE nombre='$producto'";
    $execute = $this->connect()->query($sql);
    $resultado = $execute->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
 }
 public  function editarProductosProcedimiento($producto,$descripcion,$precio){
    //Esta serua la manera mas sencilla para ejecutar la actualizacion
    //$sql="CALL editarProducto ('$producto','$descripcion','$precio')";
    $sql="CALL editarProducto(?,?)";
    $update = $this->connect()->prepare($sql);
    $arrDatos=array($producto,$descripcion,$precio);
    $resultado= $update->execute($arrDatos);
}
public function agregarProducto($producto,$descripcion,$precio,$estado,$ruta){
    $sql = "INSERT INTO Producto (nombre,descripcion,precio,estado,ubicacion_imagen) values (?,?,?,?,?)";
    $insercion=$this->connect()->prepare($sql);
    $arregloDatos=array($producto,$descripcion,$precio,$estado,$ruta);
    $resultadoInsercion = $insercion->execute($arregloDatos);
    $idInsert=$this->connect()->lastInsertId();
    //return $idInsert;
    return "Producto Agregrado";
 }
 public function elimarProductoSimple($producto){
    $sql="DELETE from producto where nombre='$producto'";
     $borrar=$this->connect()->query($sql);
    
    }
    public function editarProductoCompleto($descripcion,$precio){
        $sql="UPDATE PRODUCTO SET  descripcion= ?,precio = ? WHERE nombre = ''";
        $preparado= $this->connect()->prepare($sql);
        $arregloDatos=array($descripcion,$precio);
        $resultado=$preparado->execute($arregloDatos);
    
     }
     public function BuscarUsuarios($palabra){
        $sql="SELECT usuario,rol,ubicacion_imagen from usuarios where usuario
        LIKE '%palabra%' OR rol like '%palabra%'";
      $execute=$this->connect()->query($sql);
      $resultado=$execute->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
     } 
}


?>
