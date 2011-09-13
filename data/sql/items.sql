CREATE TABLE  `items` (
`id` INT NOT NULL AUTO_INCREMENT ,
`key` VARCHAR( 64 ) NOT NULL ,
`title` VARCHAR( 255 ) NOT NULL ,
`description` VARCHAR( 255 ) NOT NULL ,
`image` VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (  `id` ) ,
UNIQUE (
`key`
)
) ENGINE = INNODB;
