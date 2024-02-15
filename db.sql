CREATE TABLE `clientes` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `endereco` varchar(255),
  `bairro` varchar(255),
  `cidade` varchar(255),
  `uf` varchar(255),
  `limite_credito` varchar(255),
  `data_analise_credito` varchar(255),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `clientes` (`nome`,`email`,`endereco`,`bairro`,`cidade`,`uf`,`limite_credito`,`data_analise_credito`) VALUES ("Knox Olson","diam.Duis@amalesuada.org","Rua 1","One","One","On","3","2024-02-14");

