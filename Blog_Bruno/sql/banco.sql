CREATE DATABASE blog;
USE blog;

CREATE TABLE usuario (
    id int not null auto_increment,
    nome varchar(50) not null,
    email varchar(255) not null,
    senha varchar(60) not null,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ativo int not null DEFAULT '0',
    adm int not null DEFAULT '0',
    primary key (id)
);

CREATE TABLE post (
    id int not null auto_increment,
    titulo varchar(255) NOT NULL,
    texto text not null,
    usuario_id int not null,
    data_criacao datetime null default CURRENT_TIMESTAMP,
    data_postagen datetime not null,
    primary key (id),
    key fk_post_usuario_idx (usuario_id),
    constraint fk_post_usuario_idx foreign key (usuario_id) references usuario(id)
);