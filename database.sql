CREATE DATABASE IF NOT EXISTS blog_coches;
USE blog_coches;

CREATE TABLE usuarios(
id          int(255) AUTO_INCREMENT NOT NULL,
nombre      varchar(25),
apellidos   varchar(25),
correo      varchar(50),
contraseña  varchar(10),
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE categorias(
id      int(255) AUTO_INCREMENT NOT NULL,
nombre  varchar(20),
CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE entradas(
id                  int(255) AUTO_INCREMENT NOT NULL,
usuario_id          int(255),
categoria_id        int(255),
titulo              varchar(20),
descripcion         text,
CONSTRAINT pk_entradas PRIMARY KEY (id),
CONSTRAINT fk_entradas_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_entradas_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;

INSERT INTO categorias VALUES(NULL, "NISSAN");
INSERT INTO categorias VALUES(NULL, "FORD");
INSERT INTO categorias VALUES(NULL, "VOLKSWAGEN");
INSERT INTO categorias VALUES(NULL, "KIA");
INSERT INTO categorias VALUES(NULL, "TOYOTA");
INSERT INTO categorias VALUES(NULL, "SEAT");
INSERT INTO categorias VALUES(NULL, "MAZDA");

SELECT c.id AS id,  u.nombre AS nombre, c.nombre AS categoria, e.titulo AS titulo, e.descripcion AS descripcion  FROM entradas e INNER JOIN usuarios u ON usuario_id= u.id INNER JOIN categorias c ON categoria_id=c.id;


INSERT INTO entradas VALUES (null, 2, 1, "Versa", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 3, 1, "Altima", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 4, 2, "Figo", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 5, 2, "Escape", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 6, 3, "Jetta", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 1, 3, "Golf", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 2, 4, "Rio", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 3, 5, "Corolla", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 4, 5, "Yaris", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 4, 6, "Ibiza", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());
INSERT INTO entradas VALUES (null, 4, 6, "Cupra", "Praesent tempus vel ipsum a aliquet. Mauris vel tristique massa. Proin vitae mattis nulla. Fusce turpis elit, bibendum efficitur varius sit amet, ullamcorper in turpis. In sit amet commodo odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus lorem elementum ante tempus auctor.", CURDATE());



SELECT e.titulo, c.nombre AS categoria, CONCAT(u.nombre, ' ', u.apellidos) AS nombre FROM entradas e
INNER JOIN categorias c ON c.id = e.categoria_id
INNER JOIN usuarios u ON u.id = e.usuario_id
WHERE e.descripcion LIKE '%z%' OR e.titulo LIKE '%z%'
OR c.nombre LIKE '%z%' OR u.nombre LIKE '%z%' OR u.apellidos LIKE '%z%'


SELECT * FROM usuarios WHERE correo='angel@correo.com' AND id!=1;



