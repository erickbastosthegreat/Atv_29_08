create database Pessoa;
use Pessoa;

create table Pessoa
(id int not null primary key auto_increment,
nome varchar(255) not null,
cpf char(11) not null unique,
telefone varchar(255) not null);