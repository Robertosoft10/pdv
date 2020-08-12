CREATE DATABASE adminpdv;
USE adminpdv;

CREATE TABLE tb_usuarios(
usuarioId int not null auto_increment primary key,
usuarioNome varchar(255),
usuarioTipo int(11),
usuarioCodigo varchar(255)
);

CREATE TABLE tb_itens(
itemId int not null auto_increment primary key,
itemNome varchar(255),
itemCodigo varchar(30),
itemPreco varchar(20),
itemPeso varchar(20),
itemImagem varchar(255),
descricao varchar(900)
);

CREATE TABLE tb_razaosocial(
razaoId int not null auto_increment primary key,
razaoNome varchar(255),
razaoCnpj varchar(30),
razaoFone varchar(30),
razaoEmail varchar(255),
razaoEndereco varchar(500)
);

CREATE TABLE tb_vendas(
vendaId int not null auto_increment primary key,
vendaValor varchar(20),
vendaData varchar(20)
);

CREATE TABLE tb_itens_venda(
itemVendaId int not null auto_increment primary key,
vendaCodigo int,
itemVenda int,
itemQuant varchar(50),
foreign key (vendaCodigo) references tb_vendas (vendaId)
);