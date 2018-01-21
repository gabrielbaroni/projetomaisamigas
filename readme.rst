###################
Projeto Mais Amigas
###################

O projeto é bem simples, desenvolvido com o framework Codeigniter, o sistema trás apenas acesso ao GITHUB, colhendo informações de usuários para testar e simular uma loja virtual.
No caso, a gente simula uma compra e vai fazendo todo processo.

*******************
Informações da versão
*******************

Essa versão é 1.0 e não terá atualizações, é apenas para testes.

*******************
Requisitos do servidor
*******************

- PHP 5.6+ 

************
Instalação
************

Para instalar é simples, configure o arquivo CONFIG.PHP na pasta applications>>config>>config.php.
Ele tem os dados para acesso ao banco, ao configurar, rode a query abaixo para criar a única tabela que estamos utilizando no teste:

CREATE TABLE compras_maisamigas (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome_produto` VARCHAR(100) NOT NULL,
	`quantidade` INT(11) NOT NULL,
	`info_produto` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

*******
Licença
*******
Pertence a Hipixel mas desenvolvido para a Mais Amigas.


*********
Recursos
*********

- Bootstrap v4
- PHP
- Composer
- MYSQL
- JQUERY
- REST API FROM GITHUB

dúvidas pode me pedir ajuda, gabriel@hipixel.com.br

