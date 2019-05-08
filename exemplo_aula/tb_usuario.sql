drop table if exists usuarios;
create table usuarios(
	id int not null auto_increment,
    nome varchar(40) not null,
    usuario varchar(40) not null UNIQUE,
    senha varchar(40) not null,
    primary key(id)
);
