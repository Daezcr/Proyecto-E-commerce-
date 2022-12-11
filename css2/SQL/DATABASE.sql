/*Con este comando mandamos a crear la base de datos LOGIN en nuestro servidor sql */
CREATE DATABASE login;
/*Con este comando mandamos a crear la tabla de nuestros usuarios con las caracteristicas que deseeamos */
CREATE TABLE usuarios(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	usuario varchar(30),
	apellido_paterno varchar(10),
	apellido_materno varchar(10),
	correo varchar(50),
	pass varchar(20),
	ubicacion_imagen varchar(100),
	rol varchar	(20) default 'normal'
);
INSERT INTO usuarios VALUES ('1','admin','admin','admin','admin@gmail.com','1234','admin.jpg','administrador');
INSERT INTO usuarios VALUES ('2','Usuario','usuario','usuario','usuario@gmail.com','1234','usuario.jpg','normal');
INSERT INTO usuarios VALUES ('3','admin2','admin2','admin2','admin2@gmail.com','1234','1.jpg','administrador');
INSERT INTO usuarios VALUES ('4','Usuario2','usa2','usa2','usuario2@gmail.com','1234','2.jpg','normal');
INSERT INTO usuarios VALUES ('5','admin3','admin3','admin3','admin3@gmail.com','1234','3.jpg','administrador');
INSERT INTO usuarios VALUES ('6','Usuario3','usa3','usa3','usuario3@gmail.com','1234','4.jpg','normal');
INSERT INTO usuarios VALUES ('7','admin4','admin4','admin4','admin4@gmail.com','1234','5.jpg','administrador');
INSERT INTO usuarios VALUES ('8','Usuario4','usa4','usa4','usuario4@gmail.com','1234','6.jpg','normal');
INSERT INTO usuarios VALUES ('9','admin5','admin5','admin5','admin5@gmail.com','1234','7.jpg','administrador');
INSERT INTO usuarios VALUES ('10','Usuario5','usa5','usa5','usuario5@gmail.com','1234','8.jpg','normal');
INSERT INTO usuarios VALUES ('11','admin6','admin5','admin5','admin6@gmail.com','1234','9.jpg','administrador');
INSERT INTO usuarios VALUES ('12','Usuario6','usa6','usa6','usuario6@gmail.com','1234','10.jpg','normal');
INSERT INTO usuarios VALUES ('13','admin7','admin6','admin6','admin7@gmail.com','1234','11.jpg','administrador');
INSERT INTO usuarios VALUES ('14','Usuario7','usa7','usa7','usuario7@gmail.com','1234','12.jpg','normal');
INSERT INTO usuarios VALUES ('15','admin8','admin7','admin7','admin8@gmail.com','1234','13.jpg','administrador');
INSERT INTO usuarios VALUES ('16','Usuario8','usa8','usa8','usuario10@gmail.com','1234','14.jpg','normal');

DELIMITER $$
DROP PROCEDURE IF EXISTS editarUsuario
$$
CREATE PROCEDURE editarUsuario(IN _usuario varchar(20),IN _mail varchar(20), IN _password varchar(20))
BEGIN
UPDATE usuarios SET pass = _password

WHERE usuario = usuario;
END
$$

DELIMITER $$
DROP PROCEDURE IF EXISTS editarProducto
$$
CREATE PROCEDURE editarProducto(IN _nombre varchar(20), IN _descripcion varchar(20),IN _precio varchar(20))
BEGIN
UPDATE Producto SET descripcion = _descripcion

WHERE producto = nombre;
END
$$


/*CREAMOS LA TABLA PRODUCTO*/
CREATE TABLE PRODUCTO(
	id_u int not null AUTO_INCREMENT,
	nombre varchar(50) null,
	descripcion varchar(100) null,
	precio numeric(8,3) null,
	estado int null,
	CONSTRAINT pk_producto
	PRIMARY KEY (id_u)
);


alter table PRODUCTO add 	ubicacion_imagen varchar(100) null;
/*Añadimos la información de la tabla Producto */
INSERT INTO PRODUCTO (nombre,descripcion,precio,estado,ubicacion_imagen)
VALUES ('Iphone 13','Iphone 13 128GB Rosado','19.999',1,'iphone.jpg'),
('Xiaomi 11T','Xiaomi 11T 256GB Azul','12.999',1,'Xiaomi.jpg'),
('Oppo A54','Oppo A54 128GB Azul','3.999',1,'Oppo.jpg'),
('Iphone 11','Iphone 11 128GB Blanco','11.999',1,'Iphone blanco.jpg'),
('Motorola G60','Moto G60 128GB Plata','5.799',1,'Motorola.jpg'),
('Airpods Max','Airpords Max Plata','3.699',1,'Airpods.jpg'),
('AirPods','AirPods Tercera generación','4.199',1,'Airpods3.jpg'),
('Ipad Pro','Ipad Pro de 12 pulgadas','28.999',1,'Ipad.jpg'),
('Ipad Pro','Ipad Pro de 11 pulgadas','20.999',1,'Ipad.jpg'),
('Monitor Sceptre','240Hz 1080p Gaming Monitor','6.029',1,'Monitor.jpg'),
('Monitor Huawei','165Hz 1080p Gaming Monitor','3.118',1,'MonitorHawei.jpg'),
('MacBook Air','CPU de 8 núcleos Almacenamiento SSD de 512 GB','29.999',1,'Mac.jpg'),
('PCGAMING Xtreme','Geforce Gtx 1650 Intel Core I5 10400f 16GB Ssd 2TB','26.999',1,'PCgaming.jpg'),
('Apple Watch Ultra','Correa Alpine blanco estelar','19.999',1,'AppleWatch.jpg'),
('Apple Watch','Correa uniloop trenzada','7.799',1,'AppleWatch2.jpg'),
('Fitband Xiaomi','Mi smart Band 5 Negra','499',1,'FitbandXiaomi.jpg'),
('Smart TV','Pantalla LED Samsung 50 pulgadas 4K','10.900',1,'Pantalla.jpg'),
('Smart TV','´Pantalla LED LG 65 pulgadas 4k','16.499',1,'PantallaLG.jpg'),
('Camera Alpha 7','Alpha 7 con sensor de imagen fullframe de 35 mm','46.99',1,'Camara.jpg'),
('Meta Quest Pro','Trabaja en el mundo virtual Quédate en el mundo real','29.895',1,'Meta.jpg');

/*con este comando hacemos la tabla de nuestros pedidos */

create table PEDIDO(
	codped int not null AUTO_INCREMENT,
	id int not null,
	id_u int not null,
	fecped datetime not null,
	estado int not null,
	dirusuped varchar(50) not null,

	telusuped varchar(12) not null,
	PRIMARY KEY (codped)
);
alter table PEDIDO add token varchar(30) null;
Tarjeta de credito para realizar compras
de prueba
4111 1111 1111 1111	
09/25	
123	
Venta exitosa
Consulta  sql
//consulta para ver el total de usuarios
SELECT COUNT(*) as total_usuarios FROM usuarios";

//consulta para limitar la vista de usuarios solamente hasta el numero 5//
SELECT * FROM usuarios LIMIT 0,5;