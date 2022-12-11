<?php
include('../_conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$text=$_POST['text'];
$sql="select * from producto where estado=1 and nombre LIKE '%$text%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->id_u=$row['id_u'];
	$obj->nombre=$row['nombre'];
	$obj->descripcion=$row['descripcion'];
	$obj->precio=$row['precio'];
	$obj->ubicacion_imagen=$row['ubicacion_imagen'];
	$datos[$i]=$obj;
	$i++;
}

$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
