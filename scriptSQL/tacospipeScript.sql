CREATE DATABASE IF NOT EXISTS TACOSPIPEV1;
USE TACOSPIPEV1;

CREATE TABLE IF NOT EXISTS USUARIOS(

ID int NOT NULL AUTO_INCREMENT,
CORREO VARCHAR(255) NOT NULL UNIQUE ,
CONTRASENA VARCHAR(40) NOT NULL,
NOMBRE VARCHAR(100),
TELEFONO VARCHAR(12),
DIRECCION varchar(100),
ACTIVO BOOLEAN default TRUE,

PRIMARY KEY (ID)
);

create table productos(
id int auto_increment primary key,
nombre varchar(100),
descripcion text,
imagen varchar(255),
costo decimal(13,2),
activo tinyint default 1,
categoria varchar(50)
);

insert into productos (nombre,descripcion,imagen, costo, categoria) values ("tacotrompo","tacoooooooos", "../../resource/menu/menu2.jpg", 18.50, "Platillo");
insert into productos (nombre,descripcion,imagen, costo, categoria) values ("tacobistk","tacooooooooscarn", "../../resource/menu/menu3.jpg", 38.50, "Platillo");

CREATE TABLE carritos(
	id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Serializacion carrito',
   totalCosto decimal(10,2) default 0.00,
    activo BOOLEAN DEFAULT TRUE COMMENT 'Eliminacion logica', 
	usuarioCart int unique NOT NULL COMMENT 'Usuario al que pertenece el carrito',
    totalItems int default 0 comment 'Contiene el total de items del carrito del usuario',
    foreign key (usuarioCart) references usuarios(id)
); 

    DELIMITER //
	CREATE TRIGGER after_user_insert
	AFTER INSERT
		ON usuarios FOR EACH ROW
	BEGIN
		INSERT INTO carritos(usuarioCart) VALUES (NEW.id);
	END;
	//
    DELIMITER ;

    create table productosCarrito(
        id int auto_increment primary key comment 'Llave primaria del item',
        productoID int,
        cantidad int default 1 comment 'Cantidad de productos requeridos',
        idCarrito int comment'Llave foreana al carrito al que pertenece',
        activo boolean default 1 comment 'Borrado logico',

        foreign key (productoID) references productos(id),
        foreign key (idCarrito) references carritos(id)
    ); 

        DELIMITER //
    CREATE PROCEDURE GetProductosCarrito(IN carritoID INT)
BEGIN
    SELECT 
        productosCarrito.cantidad, 
        productos.nombre, 
        productos.costo, 
        productos.imagen,
        productos.costo * productosCarrito.cantidad as subtotal
    FROM 
        productosCarrito 
    JOIN 
        productos ON productosCarrito.productoID = productos.id
    WHERE productosCarrito.idCarrito = carritoID and  productosCarrito.activo = 1
	order by productosCarrito.id desc;
END //
DELIMITER ;

 DELIMITER //
    CREATE PROCEDURE ActualizarInsertarCarrito(
        IN param_idCarrito INT,
        IN param_Cantidad INT,
        IN param_carritoProduc INT
    )
    BEGIN
        IF EXISTS (SELECT 1 FROM productosCarrito WHERE productoID = param_carritoProduc and idCarrito = param_idCarrito and activo = 1) THEN
            UPDATE productosCarrito
            SET cantidad = cantidad + param_Cantidad
            WHERE productoID = param_carritoProduc AND idCarrito = param_idCarrito and activo=1;
        ELSE
            INSERT INTO productosCarrito(idCarrito, cantidad, productoID)
            VALUES(param_idCarrito, param_Cantidad, param_carritoProduc);
            UPDATE carritos SET totalItems = totalItems + 1 WHERE id = param_idCarrito;
        END IF;
        update carritos
		Set totalCosto = (SELECT SUM(productosCarrito.cantidad * productos.costo) AS costo_total
		FROM productosCarrito
		JOIN productos ON productosCarrito.productoID = productos.id
		WHERE productosCarrito.idCarrito = param_idCarrito) where id = param_idCarrito;
    END //
    DELIMITER ;

DELIMITER //
CREATE PROCEDURE getUser( in param_correo VARCHAR(255))
BEGIN
	select usuarios.id, usuarios.contrasena, usuarios.nombre, carritos.id as carritoID 
    from usuarios inner join carritos 
    on usuarios.id = carritos.usuarioCart 
    where correo= param_correo;
END //
DELIMITER ;

CREATE TABLE pedidos(
	id INT AUTO_INCREMENT PRIMARY KEY COMMENT "Llave primaria de la tabla",
    fechaPedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "fecha del pedido",
    totalPedido DECIMAL (10,2) COMMENT "Precio total del pedido",
    estatusPedido VARCHAR(25) DEFAULT "En preparacion" COMMENT "Estatus del pedido",
    tipoPedido VARCHAR (30) comment "Domicilio o en Sucursal",
    idUsuarioPedido INT COMMENT "Usuario que le pertence el pedido",
    activo BOOLEAN DEFAULT TRUE COMMENT "Borrado logico",
    
    FOREIGN KEY (idUsuarioPedido) REFERENCES usuarios(id)
);

CREATE TABLE ventas(
	id INT AUTO_INCREMENT PRIMARY KEY COMMENT "Llave primaria de la tabla",
    articulosTotales int comment "Cantidad total de articulos comprados",
    idPedido INT COMMENT "Llave foranea al pedido al que pertenece",
    idProductoVenta int comment "Llave foranea al producto comprado",
    activo BOOLEAN DEFAULT TRUE COMMENT "Borrado logico",
    
    FOREIGN KEY (idPedido) REFERENCES pedidos(id),
    FOREIGN KEY (idProductoVenta) REFERENCES productos(id)
);

CREATE PROCEDURE crearPedido(in param_idCarrito int, in param_idUsario int, in param_tipoPedido varchar(30))
BEGIN
    DECLARE _totalCosto decimal(10,2);
    DECLARE _productoID int;
    DECLARE _cantidad int;
    DECLARE param_last_id int;
    DECLARE done INT DEFAULT FALSE;
    
    -- Cursor para iterar sobre los productos del carrito
    DECLARE cur CURSOR FOR SELECT productoID, cantidad FROM productosCarrito WHERE idCarrito = param_idCarrito;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Obtenemos el totalCosto del carrito
    SELECT totalCosto into _totalCosto from carritos where id = param_idCarrito;

    -- Insertamos en la tabla pedidos
    INSERT INTO pedidos (totalPedido, idUsuarioPedido, tipoPedido) VALUES (_totalCosto, param_idUsario, param_tipoPedido);

    -- Obtenemos el ID generado por el auto_increment
    SET param_last_id = LAST_INSERT_ID();

    -- Abrimos el cursor
    OPEN cur;

    -- Iteramos sobre cada producto del carrito
    read_loop: LOOP
        FETCH cur INTO _productoID, _cantidad;

        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Insertamos en la tabla ventas
        INSERT INTO ventas (articulosTotales, idPedido, idProductoVenta) VALUES (_cantidad, param_last_id, _productoID);

        -- Actualizamos el campo activo en productosCarrito
        UPDATE productosCarrito SET activo = 0 WHERE productoID = _productoID AND idCarrito = param_idCarrito;
    END LOOP;

    -- Cerramos el cursor
    CLOSE cur;
    update carritos set totalCosto = 0.00 where id = param_idCarrito;
END //
DELIMITER ;
-- ////////////////////////////////////////////////////////////////////////////////////////
-- script agregado para corregir bug
drop procedure if exists ActualizarInsertarCarrito;
 DELIMITER //
    CREATE PROCEDURE ActualizarInsertarCarrito(
        IN param_idCarrito INT,
        IN param_Cantidad INT,
        IN param_carritoProduc INT
    )
    BEGIN
        IF EXISTS (SELECT 1 FROM productosCarrito WHERE productoID = param_carritoProduc and idCarrito = param_idCarrito and activo = 1) THEN
            UPDATE productosCarrito
            SET cantidad = cantidad + param_Cantidad
            WHERE productoID = param_carritoProduc AND idCarrito = param_idCarrito and activo=1;
        ELSE
            INSERT INTO productosCarrito(idCarrito, cantidad, productoID)
            VALUES(param_idCarrito, param_Cantidad, param_carritoProduc);
            UPDATE carritos SET totalItems = totalItems + 1 WHERE id = param_idCarrito;
        END IF;
        update carritos
		Set totalCosto = (SELECT SUM(productosCarrito.cantidad * productos.costo) AS costo_total
		 FROM productosCarrito
		 JOIN productos ON productosCarrito.productoID = productos.id
		 WHERE productosCarrito.idCarrito = param_idCarrito and productosCarrito.activo = 1) where id = param_idCarrito;
    END //
    DELIMITER ;

    ---////////////////////////////////////////////////////////////////////////////
    -- script corregido de crearPedido

    DELIMITER //
CREATE PROCEDURE crearPedido(in param_idCarrito int, in param_idUsario int, in param_tipoPedido varchar(30))
BEGIN
    DECLARE _totalCosto decimal(10,2);
    DECLARE _productoID int;
    DECLARE _cantidad int;
    DECLARE param_last_id int;
    DECLARE done INT DEFAULT FALSE;
    
    DECLARE cur CURSOR FOR SELECT productoID, cantidad FROM productosCarrito WHERE idCarrito = param_idCarrito and activo = 1;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    SELECT totalCosto into _totalCosto from carritos where id = param_idCarrito;

    INSERT INTO pedidos (totalPedido, idUsuarioPedido, tipoPedido) VALUES (_totalCosto, param_idUsario, param_tipoPedido);

    SET param_last_id = LAST_INSERT_ID();

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO _productoID, _cantidad;

        IF done THEN
            LEAVE read_loop;
        END IF;

        INSERT INTO ventas (articulosTotales, idPedido, idProductoVenta) VALUES (_cantidad, param_last_id, _productoID);

        UPDATE productosCarrito SET activo = 0 WHERE productoID = _productoID AND idCarrito = param_idCarrito;
    END LOOP;

    
    CLOSE cur;
    update carritos set totalCosto = 0.00 where id = param_idCarrito;
END //
DELIMITER ;





    

