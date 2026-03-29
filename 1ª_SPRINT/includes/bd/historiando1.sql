create schema historiando1;

use  historiando1;

create table usuario (

id_usuario int primary key auto_increment,
nome_usuario varchar(100),
email_usuario varchar(70),
senha_usuario varchar(50),
xp_usuario int,
nivel_usuario int

);

select * from usuario;

insert into usuario ( nome_usuario, email_usuario, senha_usuario, xp_usuario, nivel_usuario)
values ('Pedro Arthur', 'pedroarthur@gmail.com', 321, null, null);
