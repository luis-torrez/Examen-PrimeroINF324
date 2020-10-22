CREATE DATABASE academico;

create table identificador(
	ci varchar(30),
    nombrecom varchar(100),
    fechanac date,
    codep char(2),
    PRIMARY key (ci)
)

INSERT INTO identificador (ci, nombrecom, fechanac, codep) 
VALUES 
('12345','Miriam Perez Lucana', '1995-01-01','01'), 
('12346','Luis Gabriel Torrez Rojas', '1996-09-29','02'),
('12347','Juan Mamani Perez', '1995-11-01','02'),
('12348','Luis Miguel Aguirre Laura', '1995-12-26','02'),
('12349','Luis Fernando Mamani Vino', '1994-10-05','03'),
('12334','Maria del Carmen Mendoza Ramos', '1996-09-18','03'),
('123234','Carla Morrison Laruta', '1996-08-17','04'),
('1234224','Monserrat Rojas Snachez', '1994-07-16','05'),
('12342342','Ricardo Bustamante Salas', '1993-06-23','06'),
('123452423','Ramiro Lecoña Ruis', '1992-05-24','07'),
('12345242','Camila Banda Aguirre', '1999-04-25','08'),
('1234','Gabriela Montes Huanca', '2000-03-26','09');


create table usuario(
	ci varchar(30),
    clave varchar(100),
    color varchar(100),
    PRIMARY key (ci),
    FOREIGN KEY (ci) REFERENCES identificador (ci)
)

INSERT INTO usuario (ci, clave, color) VALUES
('123234', '123234', 'gray'),
('12334', '12334', 'gray'),
('1234', '1234', 'gray'),
('1234224', '1234224', 'gray'),
('12342342', '12342342', 'gray'),
('12345', '12345', 'gray'),
('12345242', '12345242', 'gray'),
('123452423', '123452423', 'gray'),
('12346', '12346', 'gray'),
('12347', '12347', 'gray'),
('12348', '12348', 'gray'),
('12349', '12349', 'gray');

create table notas(
	ci varchar(30),
    materia varchar(10),
    nota integer,
    FOREIGN KEY (ci) REFERENCES identificador (ci)
)
INSERT INTO notas (ci, materia, nota) 
VALUES 
('12345','inf-111','45'), 
('12346','inf-112','52'),
('12347','inf-111','32'),
('12348','inf-322','65'),
('12349','inf-112','70'),
('12334','lab.122','56'),
('123234','inf-124','69'),
('1234224','inf-232','90'),
('12342342','inf-320','100'),
('123452423','inf-154','51'),
('12345242','inf-132','54'),
('12345','inf-131','45'), 
('12346','inf-112','52'),
('12347','inf-123','32'),
('12348','inf-166','65'),
('12349','inf-166','70'),
('12334','inf-166','56'),
('123234','inf-166','69'),
('1234224','inf-132','90'),
('12342342','inf-121','100'),
('123452423','inf-121','51'),
('12345242','inf-131','54'),
('1234','inf-131','90');
