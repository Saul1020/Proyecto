CREATE TABLE `tienda`.`usuario` 
(`id` INT NOT NULL AUTO_INCREMENT ,
`nombre` VARCHAR(25) NOT NULL , 
`primerApellido` VARCHAR(30) NOT NULL , 
`segunApellido` VARCHAR(30) NOT NULL , 
`correo` VARCHAR(60) NOT NULL , 
`telefono` INT(8) NOT NULL , 
`password` VARCHAR(30) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;