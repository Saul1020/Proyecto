CREATE TABLE `tienda`.`productos` 
(
`id`            INT NOT NULL AUTO_INCREMENT ,
`nombre`        VARCHAR(25) NOT NULL , 
`descripcion`   VARCHAR(30) NOT NULL , 
`img`           VARCHAR(5000) NOT NULL , 
`precio`        DECIMAL(10,2) NOT NULL,
`id_categoria`  INT,
FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
PRIMARY KEY (`id`)) ENGINE = InnoDB;