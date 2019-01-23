CREATE TABLE `menu` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`parent_id` int(11) DEFAULT NULL,
	`label` varchar(255) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `IDX_7D053A93727ACA70` (`parent_id`),
	CONSTRAINT `FK_7D053A93727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

TRUNCATE TABLE `programa-test`.`menu`;

INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (NULL, 'Kategoria główna');	-- ID: 1
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (1, 'Podkategoria 1');			-- ID: 2
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (2, 'Podkategoria 1.1');		-- ID: 3
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (2, 'Podkategoria 1.2');		-- ID: 4
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (1, 'Podkategoria 2');			-- ID: 5
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (5, 'Podkategoria 2.1');		-- ID: 6
INSERT INTO `programa-test`.`menu` (parent_id, label) VALUES (5, 'Podkategoria 2.2');		-- ID: 7
