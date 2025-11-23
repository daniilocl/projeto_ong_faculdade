create database maosqueajudam;
use maosqueajudam;
-- drop database maosqueajudam;

create table Usuario (
    idUsuario int primary key auto_increment,
    nome varchar(50) not null unique,
    cpf bigint not null unique,
    email varchar(100) not null unique,
    senha varchar(100) not null,
    tipo_usuario enum('cliente', 'admin', 'voluntario') not null,
    created_at timestamp not null default current_timestamp
);

create table Funcionario(
	idFunc int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf varchar(20) not null,
    cargo varchar(50));

-- criação, alteração e deleção de tabela
create table Funcionario_2(
	idFunc int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    rg varchar(20) not null);

alter table Funcionario_2 add column cargo varchar(50);
alter table Funcionario_2 change rg cpf varchar(20) not null;
alter table Funcionario_2 modify cpf bigint not null;
drop table Funcionario_2;

create table Professor(
	idProf int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null,
    disciplina varchar(50) not null);
    
create table Beneficiario(
	idBen int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null);
    
create table Voluntario(
	idVol int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null);
    
create table Curso(
	idCurso int primary key auto_increment,
    nome varchar(100) not null,
    horaInicio time not null,
    horaFim time not null,
    dataInicio date not null,
    dataFim date not null);
    
create table Patrocinador(
	idPatro int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    localidade varchar(100) not null);

    
create table Doacoes(
	idDoacao int primary key auto_increment,
    valor decimal(10, 2) not null,
    dataDoacao date not null,
    descricao varchar(250));

-- relacionamentos

create table Usuario_Beneficiario(
	idUsuario int not null,
    idBen int not null,
    primary key (idUsuario, idBen),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idBen) references Beneficiario(idBen));
    
create table Usuario_Funcionario(
	idUsuario int not null,
    idFunc int not null,
    primary key (idUsuario, idFunc),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idFunc) references Funcionario(idFunc));
    
create table Usuario_Professor(
	idUsuario int not null,
    idProf int not null,
    primary key (idUsuario, idProf),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idProf) references Professor(idProf));
    
create table Usuario_Voluntario(
	idUsuario int not null,
    idVol int not null,
    primary key (idUsuario, idVol),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idVol) references Voluntario(idVol));
    
create table Beneficiario_Curso(
    idBen int not null,
    idCurso int not null,
    primary key (idBen, idCurso),
    foreign key (idBen) references Beneficiario(idBen),
    foreign key (idCurso) references Curso(idCurso));
    
create table Professor_Curso(
    idProf int not null,
    idCurso int not null,
    primary key (idProf, idCurso),
    foreign key (idProf) references Professor(idProf),
    foreign key (idCurso) references Curso(idCurso));

-- Backups

create table backup_Usuario (
    idUsuario int primary key auto_increment,
    nome varchar(50) not null unique,
    cpf bigint not null unique,
    email varchar(100) not null unique,
    senha varchar(100) not null,
    tipo_usuario enum('cliente', 'admin', 'voluntario') not null,
    created_at timestamp not null default current_timestamp
);

create table backup_Funcionario(
	idFunc int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null,
    cargo varchar(50));
    
create table backup_Professor(
	idProf int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null,
    disciplina varchar(50) not null);
    
create table backup_Beneficiario(
	idBen int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null);
    
create table backup_Voluntario(
	idVol int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    cpf bigint not null);
    
create table backup_Curso(
	idCurso int primary key auto_increment,
    nome varchar(100) not null,
    horaInicio time not null,
    horaFim time not null,
    dataInicio date not null,
    dataFim date not null);
    
create table backup_Patrocinador(
	idPatro int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    localidade varchar(100) not null);
    
create table backup_Doacoes(
	idDoacao int primary key auto_increment,
    valor decimal(10, 2) not null,
    dataDoacao date not null,
    descricao varchar(250));

create table backup_Usuario_Beneficiario(
	idUsuario int not null,
    idBen int not null,
    primary key (idUsuario, idBen),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idBen) references Beneficiario(idBen));
    
create table backup_Usuario_Funcionario(
	idUsuario int not null,
    idFunc int not null,
    primary key (idUsuario, idFunc),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idFunc) references Funcionario(idFunc));
    
create table backup_Usuario_Professor(
	idUsuario int not null,
    idProf int not null,
    primary key (idUsuario, idProf),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idProf) references Professor(idProf));
    
create table backup_Usuario_Voluntario(
	idUsuario int not null,
    idVol int not null,
    primary key (idUsuario, idVol),
    foreign key (idUsuario) references Usuario(idUsuario),
    foreign key (idVol) references Voluntario(idVol));
    
create table backup_Beneficiario_Curso(
    idBen int not null,
    idCurso int not null,
    primary key (idBen, idCurso),
    foreign key (idBen) references Beneficiario(idBen),
    foreign key (idCurso) references Curso(idCurso));
    
create table backup_Professor_Curso(
    idProf int not null,
    idCurso int not null,
    primary key (idProf, idCurso),
    foreign key (idProf) references Professor(idProf),
    foreign key (idCurso) references Curso(idCurso));

-- Triggers Backup

DELIMITER //

create trigger trg_backup_Usuario
after insert on Usuario
for each row
begin
	insert into backup_Usuario(nome, cpf, email, senha, tipo_usuario, created_at) values (new.nome, new.cpf, new.email, new.senha, new.tipo_usuario, new.created_at);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Funcionario
after insert on Funcionario
for each row
begin
	insert into backup_Funcionario (nome, email, cpf, cargo) values (new.nome, new.email, new.cpf, new.cargo);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Professor
after insert on Professor
for each row
begin
	insert into backup_Professor (nome, email, cpf, disciplina) values (new.nome, new.email, new.cpf, new.disciplina);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Beneficiario
after insert on Beneficiario
for each row
begin
	insert into backup_Beneficiario (nome, email, cpf) values (new.nome, new.email, new.cpf);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Voluntario
after insert on Voluntario
for each row
begin
	insert into backup_Voluntario (nome, email, cpf) values (new.nome, new.email, new.cpf);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Curso
after insert on Curso
for each row
begin
	insert into backup_Curso (nome, horaInicio, horaFim, dataInicio, dataFim) values (new.nome, new.horaInicio, new.horaFim, new.dataInicio, new.dataFim);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Patrocinador
after insert on Patrocinador
for each row
begin
	insert into backup_Patrocinador (nome, email, localidade) values (new.nome, new.email, new.localidade);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Doacoes
after insert on Doacoes
for each row
begin
	insert into backup_Doacoes(valor, dataDoacao, descricao) values (new.valor, new.dataDoacao, new.descricao);
end//

DELIMITER ;

-- triggers backup relacionamentos

DELIMITER //

create trigger trg_backup_Usuario_Beneficiario
after insert on Usuario_Beneficiario
for each row
begin
	insert into backup_Usuario_Beneficiario values (new.idUsuario, new.idBen);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Usuario_Funcionario
after insert on Usuario_Funcionario
for each row
begin
	insert into backup_Usuario_Funcionario values (new.idUsuario, new.idFunc);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Usuario_Professor
after insert on Usuario_Professor
for each row
begin
	insert into backup_Usuario_Professor values (new.idUsuario, new.idProf);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Usuario_Voluntario
after insert on Usuario_Voluntario
for each row
begin
	insert into backup_Usuario_Voluntario values (new.idUsuario, new.idVol);
end//

DELIMITER ;
  
DELIMITER //

create trigger trg_backup_Beneficiario_Curso
after insert on Beneficiario_Curso
for each row
begin
	insert into backup_Beneficiario_Curso values (new.idBen, new.idCurso);
end//

DELIMITER ;

DELIMITER //

create trigger trg_backup_Professor_Curso
after insert on Professor_Curso
for each row
begin
	insert into backup_Professor_Curso values (new.idProf, new.idCurso);
end//

DELIMITER ;

-- inserts

insert into Usuario (nome, cpf, email, senha, tipo_usuario) values
-- Beneficiários
('Lucas Pereira', 10000000001, 'lucas.pereira@ex.com', 'Lp@2025A!', 'cliente'),
('Juliana Silva', 10000000002, 'juliana.silva@ex.com', 'Js_44pw$', 'cliente'),
('Carlos Santos', 10000000003, 'carlos.santos@ex.com', 'Cs!88x%', 'cliente'),
('Beatriz Gomes', 10000000004, 'beatriz.gomes@ex.com', 'Bg*pw12_', 'cliente'),
('Paulo Henrique', 10000000005, 'paulo.henrique@ex.com', 'Ph#88mm', 'cliente'),
('Larissa Costa', 10000000006, 'larissa.costa@ex.com', 'Lc_pw55#', 'cliente'),
('André Ribeiro', 10000000007, 'andre.ribeiro@ex.com', 'Ar!778h', 'cliente'),
('Mariana Souza', 10000000008, 'mariana.souza@ex.com', 'Ms_22kQ', 'cliente'),
('Rafael Oliveira', 10000000009, 'rafael.oliveira@ex.com', 'Ro*93pw', 'cliente'),
('Patrícia Luz', 10000000010, 'patricia.luz@ex.com', 'Pl@2024#', 'cliente'),
('Daniel Freire', 10000000011, 'daniel.freire@ex.com', 'Df_pw71!', 'cliente'),
('Camila Prado', 10000000012, 'camila.prado@ex.com', 'Cp_99lk$', 'cliente'),

-- Funcionários
('João da Silva', 20000000001, 'joao.silva@ex.com', 'Js!93pw', 'cliente'),
('Marina Costa', 20000000002, 'marina.costa@ex.com', 'Mc_pw66@', 'cliente'),
('Carlos Pereira', 20000000003, 'carlos.pereira@ex.com', 'Cp*117A', 'cliente'),
('Ana Souza', 20000000004, 'ana.souza@ex.com', 'As_pw02$', 'cliente'),
('Bruno Rocha', 20000000005, 'bruno.rocha@ex.com', 'Br!8k2%', 'cliente'),
('Fernanda Lima', 20000000006, 'fernanda.lima@ex.com', 'Fl__2025', 'cliente'),
('Ricardo Gomes', 20000000007, 'ricardo.gomes@ex.com', 'Rg_pw7K#', 'cliente'),
('Tatiane Silva', 20000000008, 'tatiane.silva@ex.com', 'Ts!52qq', 'cliente'),
('Eduardo Ramos', 20000000009, 'eduardo.ramos@ex.com', 'Er@77pp', 'cliente'),
('Paula Nunes', 20000000010, 'paula.nunes@ex.com', 'Pn_pwAB!', 'cliente'),
('Felipe Alves', 20000000011, 'felipe.alves@ex.com', 'Fa_88pw$', 'cliente'),
('Larissa Prado', 20000000012, 'larissa.prado@ex.com', 'Lp*pw62', 'cliente'),

-- Professores
('Marcos Silva', 30000000001, 'marcos.silva@ex.com', 'Ms_pw3Q!', 'admin'),
('Ana Souza Prof', 30000000002, 'anas.prof@ex.com', 'Ap!pw92', 'admin'),
('Ricardo Lima', 30000000003, 'ricardo.lima@ex.com', 'Rl_66ka#', 'admin'),
('João Pedro', 30000000004, 'joao.pedro@ex.com', 'Jp@2025%', 'admin'),
('Maria Clara', 30000000005, 'maria.clara@ex.com', 'Mc*pwQ2', 'admin'),
('Pedro Costa', 30000000006, 'pedro.costa@ex.com', 'Pc_1pw*', 'admin'),
('Fernanda Torres', 30000000007, 'fernanda.torres@ex.com', 'Ft!pw71_', 'admin'),
('Thiago Ramos', 30000000008, 'thiago.ramos@ex.com', 'Tr_pw7S!', 'admin'),
('Juliana Freitas', 30000000009, 'juliana.freitas@ex.com', 'Jf_88pw$', 'admin'),
('Paula Mendes', 30000000010, 'paula.mendes@ex.com', 'Pm!pw4Q', 'admin'),
('Vinicius Prado', 30000000011, 'vinicius.prado@ex.com', 'Vp_pwA8#', 'admin'),
('Gabriel Fonseca',   30000000012, 'gabriel.fonseca@ex.com', 'Gf#9pw2', 'admin'),

-- Voluntários
('Luana Dias', 40000000001, 'luana.dias@ex.com', 'Ld_pw66*', 'cliente'),
('Hugo Martins', 40000000002, 'hugo.martins@ex.com', 'Hm!82pp', 'cliente'),
('Iara Mendes', 40000000003, 'iara.mendes@ex.com', 'Im_pw11$', 'cliente'),
('Arthur Vieira', 40000000004, 'arthur.vieira@ex.com', 'Av@pw29', 'cliente'),
('Cecília Braga', 40000000005, 'cecilia.braga@ex.com', 'Cb_77pw!', 'cliente'),
('Mário Pontes', 40000000006, 'mario.pontes@ex.com', 'Mp_pw5K*', 'cliente'),
('Paula Ramos', 40000000007, 'paula.ramos@ex.com', 'Pr@88pw', 'cliente'),
('Eduardo Farias', 40000000008, 'eduardo.farias@ex.com', 'Ef_pw2@Q', 'cliente'),
('Renata Castro', 40000000009, 'renata.castro@ex.com', 'Rc!pw18', 'cliente'),
('Felipe Souza', 40000000010, 'felipe.souza@ex.com', 'Fs_pw33$', 'cliente'),
('Sandra Lopes', 40000000011, 'sandra.lopes@ex.com', 'Sl_pw77!', 'cliente'),
('Diego Ferreira', 40000000012, 'diego.ferreira@ex.com', 'Df!pw90$', 'cliente');

 insert into Beneficiario (nome, email, cpf) values
('Lucas Pereira', 'lucas.pereira@ex.com', 10000000001),
('Juliana Silva', 'juliana.silva@ex.com', 10000000002),
('Carlos Santos', 'carlos.santos@ex.com', 10000000003),
('Beatriz Gomes', 'beatriz.gomes@ex.com', 10000000004),
('Paulo Henrique', 'paulo.henrique@ex.com', 10000000005),
('Larissa Costa', 'larissa.costa@ex.com', 10000000006),
('André Ribeiro', 'andre.ribeiro@ex.com', 10000000007),
('Mariana Souza', 'mariana.souza@ex.com', 10000000008),
('Rafael Oliveira', 'rafael.oliveira@ex.com', 10000000009),
('Patrícia Luz', 'patricia.luz@ex.com', 10000000010),
('Daniel Freire', 'daniel.freire@ex.com', 10000000011),
('Camila Prado', 'camila.prado@ex.com', 10000000012);

insert into Funcionario (nome, email, cpf, cargo) values
('João da Silva', 'joao.silva@ex.com', 20000000001, 'Analista'),
('Marina Costa', 'marina.costa@ex.com', 20000000002, 'Assistente'),
('Carlos Pereira', 'carlos.pereira@ex.com', 20000000003, 'Coordenador'),
('Ana Souza', 'ana.souza@ex.com', 20000000004, 'Gerente'),
('Bruno Rocha', 'bruno.rocha@ex.com', 20000000005, 'Instrutor'),
('Fernanda Lima', 'fernanda.lima@ex.com', 20000000006, 'Auxiliar'),
('Ricardo Gomes', 'ricardo.gomes@ex.com', 20000000007, 'Supervisor'),
('Tatiane Silva', 'tatiane.silva@ex.com', 20000000008, 'Instrutor'),
('Eduardo Ramos', 'eduardo.ramos@ex.com', 20000000009, 'Coordenador'),
('Paula Nunes', 'paula.nunes@ex.com', 20000000010, 'Gerente'),
('Felipe Alves', 'felipe.alves@ex.com', 20000000011, 'Auxiliar'),
('Larissa Prado', 'larissa.prado@ex.com', 20000000012, 'Analista');


insert into Professor (nome, email, cpf, disciplina) values
('Marcos Silva', 'marcos.silva@ex.com', 30000000001, 'Matemática'),
('Ana Souza Prof', 'anas.prof@ex.com', 30000000002, 'História'),
('Ricardo Lima', 'ricardo.lima@ex.com', 30000000003, 'Português'),
('João Pedro', 'joao.pedro@ex.com', 30000000004, 'Geografia'),
('Maria Clara', 'maria.clara@ex.com', 30000000005, 'Física'),
('Pedro Costa', 'pedro.costa@ex.com', 30000000006, 'Química'),
('Fernanda Torres', 'fernanda.torres@ex.com', 30000000007, 'Inglês'),
('Thiago Ramos', 'thiago.ramos@ex.com', 30000000008, 'Biologia'),
('Juliana Freitas', 'juliana.freitas@ex.com', 30000000009, 'Artes'),
('Paula Mendes', 'paula.mendes@ex.com', 30000000010, 'Informática'),
('Vinicius Prado', 'vinicius.prado@ex.com', 30000000011, 'Filosofia'),
('Gabriel Fonseca', 'gabriel.fonseca@ex.com', 30000000012, 'Sociologia');

insert into Voluntario (nome, email, cpf) values
('Luana Dias', 'luana.dias@ex.com', 40000000001),
('Hugo Martins', 'hugo.martins@ex.com', 40000000002),
('Iara Mendes', 'iara.mendes@ex.com', 40000000003),
('Arthur Vieira', 'arthur.vieira@ex.com', 40000000004),
('Cecília Braga', 'cecilia.braga@ex.com', 40000000005),
('Mário Pontes', 'mario.pontes@ex.com', 40000000006),
('Paula Ramos', 'paula.ramos@ex.com', 40000000007),
('Eduardo Farias', 'eduardo.farias@ex.com', 40000000008),
('Renata Castro', 'renata.castro@ex.com', 40000000009),
('Felipe Souza', 'felipe.souza@ex.com', 40000000010),
('Sandra Lopes', 'sandra.lopes@ex.com', 40000000011),
('Diego Ferreira', 'diego.ferreira@ex.com', 40000000012);

insert into Curso (nome, horaInicio, horaFim, dataInicio, dataFim) values
('Informática Básica', '08:00', '10:00', '2025-02-01', '2025-05-01'),
('Inglês I', '10:00', '12:00', '2025-02-05', '2025-06-05'),
('Matemática Aplicada', '14:00', '16:00', '2025-03-01', '2025-05:30'),
('Redação', '09:00', '11:00', '2025-01-20', '2025-04:20'),
('Empreendedorismo', '13:00', '15:00', '2025-03-10', '2025-07:10'),
('Culinária Básica', '15:00', '17:00', '2025-02-15', '2025-06:15'),
('Finanças Pessoais', '08:00', '10:00', '2025-04-01', '2025-08:01'),
('Costura Criativa', '10:00', '12:00', '2025-03-22', '2025-06:22'),
('Fotografia', '16:00', '18:00', '2025-02-10', '2025-05:10'),
('Marketing Digital', '18:00', '20:00', '2025-04-05', '2025-07:05'),
('Primeiros Socorros', '08:00', '12:00', '2025-03-01', '2025-03-30'),
('Espanhol Básico', '13:00', '15:00', '2025-02-25', '2025-06:25');

insert into Doacoes (valor, dataDoacao, descricao) values
(150.00, '2025-01-10', 'Doação mensal'),
(200.00, '2025-01-15', 'Campanha de alimentos'),
(500.00, '2025-02-01', 'Doação especial'),
(75.50, '2025-02-10', 'Doação espontânea'),
(1000.00, '2025-02-12', 'Patrocínio evento'),
(120.00, '2025-02-15', 'Contribuição solidária'),
(250.00, '2025-03-01', 'Doação mensal'),
(90.00, '2025-03-03', 'Campanha de livros'),
(340.00, '2025-03-05', 'Doação de associado'),		
(50.00, '2025-03-10', 'Doação simples'),
(600.00, '2025-03-15', 'Doação especial'),
(180.00, '2025-03-20', 'Ação social');

insert into Usuario_Beneficiario values
(1,1),(2,2),(3,3),(4,4),
(5,5),(6,6),(7,7),(8,8),
(9,9),(10,10),(11,11),(12,12);

insert into Usuario_Funcionario values
(13,1),(14,2),(15,3),(16,4),
(17,5),(18,6),(19,7),(20,8),
(21,9),(22,10),(23,11),(24,12);

insert into Usuario_Professor values
(25,1),(26,2),(27,3),(28,4),
(29,5),(30,6),(31,7),(32,8),
(33,9),(34,10),(35,11),(36,12);

INSERT INTO Usuario_Voluntario values
(37,1),(38,2),(39,3),(40,4),
(41,5),(42,6),(43,7),(44,8),
(45,9),(46,10),(47,11),(48,12);

insert into Beneficiario_Curso values
(1,1),(2,2),(3,3),(4,4),
(5,5),(6,6),(7,7),(8,8),
(9,9),(10,10),(11,11),(12,12);

insert into Professor_Curso values
(1,1),(2,2),(3,3),(4,4),
(5,5),(6,6),(7,7),(8,8),
(9,9),(10,10),(11,11),(12,12);

-- updates e deletes

update Usuario set tipo_usuario = 'voluntario' where idUsuario between 37 and 48;

update Usuario u
inner join Usuario_Funcionario uf on u.idUsuario = uf.idUsuario
inner join Funcionario f on f.idFunc = uf.idFunc
set u.tipo_usuario = 'admin'
where f.cargo in ('Coordenador', 'Gerente', 'Supervisor');

delete from Doacoes where idDoacao = 12;

-- selects para cada tabela

select * from Usuario;
select * from Funcionario;
select * from Professor;
select * from Beneficiario;
select * from Voluntario;
select * from Curso;
select * from Doacoes;
select * from Usuario_Beneficiario;
select * from Usuario_Funcionario;
select * from Usuario_Professor;
select * from Usuario_Voluntario;
select * from Beneficiario_Curso;
select * from Professor_Curso;

-- selects para campos específicos das tabelas

select nome from Usuario where nome like 'A%';
select nome, horaInicio, horaFim from Curso;
select nome, disciplina from Professor;
select nome, email from Voluntario where nome like '%L%';
select nome, email from Funcionario where cargo like 'Auxiliar';

-- selects conjutos

select p.nome as Professor,
	c.nome as Curso
from Professor p
join Professor_Curso pc on p.idProf = pc.idProf
join Curso c on c.idCurso = pc.idCurso;

select b.nome as Aluno,
 c.nome as Curso
 from Beneficiario b
 join Beneficiario_Curso bc on b.idBen = bc.idBen
 join Curso c on c.idCurso = bc.idCurso;
 
 select p.nome as Professor,
 c.nome as Curso,
 c.horaInicio as Inicio,
 c.horaFim as Fim
from Professor p
join Professor_Curso pc on p.idProf = pc.idProf
join Curso c on c.idCurso = pc.idCurso;

select b.nome as Beneficiario,
b.email as Email,
u.idUsuario as IdConta
from Beneficiario b 
join Usuario_Beneficiario ub on b.idBen = ub.idBen
join Usuario u on u.idUsuario = ub.idUsuario;

select p.nome as Professor,
c.nome as Curso,
b.nome as Aluno
from Professor p 
join Professor_Curso pc on p.idProf = pc.idProf
join Curso c on c.idCurso = pc.idCurso
join Beneficiario_Curso bc on c.idCurso = bc.idCurso
join Beneficiario b on b.idBen = bc.idBen;

-- selects conjuntos inner join

select v.nome as Voluntario,
v.email as Email,
u.idUsuario as IdConta,
u.tipo_usuario as NivelAcesso
from Voluntario v
inner join Usuario_Voluntario uv on v.idVol = uv.idVol
inner join Usuario u on u.idUsuario = uv.idUsuario;

select f.nome as Funcionario,
f.cargo as Cargo,
f.email as Email,
u.idUsuario as IdConta,
u.tipo_usuario as NivelAcesso
from Funcionario f
inner join Usuario_Funcionario uf on f.idFunc = uf.idFunc
inner join Usuario u on u.idUsuario = uf.idUsuario;

select c.nome as Curso,
count(bc.idBen) as QuantidadeAlunos
from Curso c 
inner join Beneficiario_Curso bc on c.idCurso = bc.idCurso
group by c.idCurso, c.nome;

select p.nome as Professor,
count(b.idBen) as TotalAlunos
from Professor p 
inner join Professor_Curso pc on p.idProf = pc.idProf
inner join Curso c on c.idCurso = pc.idCurso
inner join Beneficiario_Curso bc on c.idCurso = bc.idCurso
inner join Beneficiario b on b.idBen = bc.idBen
group by p.idProf, p.nome
order by TotalAlunos desc, p.nome asc;

select u.tipo_usuario as Tipo,
count(u.idUsuario) as QuantidadeUsuarios
from Usuario u
inner join (
    select idUsuario from Usuario_Beneficiario
    union all
    select idUsuario from Usuario_Funcionario
    union all
    select idUsuario from Usuario_Professor
    union all
    select idUsuario from Usuario_Voluntario
) pessoas on pessoas.idUsuario = u.idUsuario
group by u.tipo_usuario
order by QuantidadeUsuarios desc;