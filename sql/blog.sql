create database blog;
use blog;

create table usuario (
	id 				int(11) 		not null auto_increment,
    nome 			varchar(50)		not null,
    email			varchar(255)	not null,
    senha			char(60)		not null,
    data_criacao 	datetime		not null,
    ativo 			tinyint(4)		not null default '0',
    adm 			tinyint(4)		not null default '0',
    primary key (id)
);

create table post (
	id 				int(11) 		not null auto_increment,
    titulo 			varchar(255)	not null,
    texto			text			not null,
    usuario_id		int(11)			not null,
    data_criacao 	datetime		not null default current_timestamp,
    data_postagem 	datetime		not null,
    primary key (id),
    key fk_post_1_idx (usuario_id),
    constraint fk_post_1 foreign key (usuario_id) references usuario (id)
);