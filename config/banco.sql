create database trabalho2;
use trabalho2;

create table compra (
	id_compra int primary key auto_increment,
    dtCompra date,
    valorTotalCompra double
);

create table livro (
	id_livro int primary key auto_increment,
    titulo varchar(250),
    anoPublicacao int,
    fotoCapa varchar(250),
    idCategoria int
);

create table autor (
	id_autor int primary key auto_increment,
    nome varchar(250),
    sobrenome varchar(250)
);

create table intensCompra (
	id_itens int primary key auto_increment,
    id_livro int,
    id_compra int,
    valorUnitario double,
    quantidade int,
    valorTotalItem double,
    foreign key (id_livro) references livro (id_livro),
    foreign key (id_compra) references compra (id_compra)
);

create table categorias (
	id_categoria int primary key auto_increment,
    descricao varchar(250)
);

create table usuario (
	id_usuario int primary key auto_increment,
    nome varchar(250),
    email varchar(250),
    senha varchar(250),
    nivelPermissao int,
    cpf int
);
