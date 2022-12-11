<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi Tienda de productos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<section>
				<div class="part1">
					<img id="idimg" src="assets/products/iphone.jpg">
				</div>
				<div class="part2">
				<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
					<h1 id="idprice">$19,<span>900</span></h1>
					<h3 id="iddescription">Descripcion del producto</h3>
					<button onclick="iniciar_compra()">Comprar</button>
				</div>
			</section>
			<div class="title-section">Encontraste lo que buscabas?</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<?php include("layouts/_footer.php"); ?>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/producto/get_all_products.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						if (data.datos[i].id_u==p) {
							document.getElementById("idimg").src="assets/products/"+data.datos[i].ubicacion_imagen;
							document.getElementById("idtitle").innerHTML=data.datos[i].nombre;
							document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].precio);
							document.getElementById("iddescription").innerHTML=data.datos[i].descripcion;
						}
						html+=
						'<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].id_u+'">'+
								'<div class="product">'+
									'<img src="assets/products/'+data.datos[i].ubicacion_imagen+'">'+
									'<div class="detail-title">'+data.datos[i].nombre+'</div>'+
									'<div class="detail-description">'+data.datos[i].descripcion+'</div>'+
									'<div class="detail-price">'+formato_precio(data.datos[i].precio)+'</div>'+
								'</div>'+
							'</a>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$"+array[0]+",<span>"+array[1]+"</span>";
		}
		function iniciar_compra(){
			$.ajax({
				url:'servicios/compra/validar_inicio_compra.php',
				type:'POST',
				data:{
					id_u:p
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						alert(data.detail);
					}else{
						alert(data.detail);
						if (data.open_login) {
							open_login();
						}
					}
				},
				error:function(err){
					console.error(err);
				}
			});
		}
		function open_login(){
			window.location.href="login.php";
		}
	</script>
</body>
</html>