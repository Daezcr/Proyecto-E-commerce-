<?php
session_start();
$response=new stdClass();
if (!isset($_SESSION['id'])) {
	$response->state=false;
	$response->detail="No tienes un usuario, deberas registrarte primero";
	$response->open_login=true;
}else{
	include_once('../_conexion.php');
	$id=$_SESSION['id'];
	$id_u=$_POST['id_u'];
	$sql="INSERT INTO pedido
	(id,id_u,fecped,estado,dirusuped,telusuped)
	VALUES
	($id,$id_u,now(),1,'','')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado al carrito";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($con);
}

header('Content-Type: application/json');
echo json_encode($response);