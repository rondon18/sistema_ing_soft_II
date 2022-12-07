-- Cargar desde phpmyadmin


-- PERSONAS

INSERT IGNORE INTO `personas` (id_Persona, Nombre, Apellido, Cedula, Fecha_Nac, Ruta_Imagen,Sexo) VALUES 
(1, 'Morganica', 'Lawty', 'V12649473', '2022-4-14', 'V12649473.jpg','M'),
(2, 'Edythe', 'Rigney', 'V13415496', '2022-1-16', 'V13415496.jpg','M'),
(3, 'Berne', 'Pavlenkov', 'V84769533', '2022-8-9', 'V84769533.jpg','F'),
(4, 'Tull', 'Monget', 'V55945231', '2022-5-9', 'V55945231.jpg','M'),
(5, 'Hobie', 'Barthelet', 'V08851411', '2022-4-21', 'V08851411.jpg','F'),
(6, 'Allin', 'Molineaux', 'V96647829', '2022-1-17', 'V96647829.jpg','M'),
(7, 'Terri', 'Fist', 'V93909125', '2022-10-18', 'V93909125.jpg','F'),
(8, 'Ramsay', 'Roussel', 'V69823294', '2022-7-21', 'V69823294.png','M'),
(9, 'Frannie', 'Pirkis', 'V10113385', '2022-8-6', 'V10113385.png','M'),
(10, 'Evaleen', 'Bindley', 'V32896787', '2022-4-6', 'V32896787.jpg','M'),
(11, 'Reinaldos', 'Brabham', 'V35029573', '2022-9-1', 'V35029573.jpg','F'),
(12, 'Arny', 'Liverseege', 'V66509818', '2022-1-1', 'V66509818.jpg','M'),
(13, 'Cal', 'Vedyashkin', 'V66298340', '2021-12-7', 'V66298340.jpg','M'),
(14, 'Ralf', 'Barnwall', 'V50950642', '2022-10-7', 'V50950642.jpg','M'),
(15, 'Rebekkah', 'Jaycock', 'V12716584', '2022-10-18', 'V12716584.jpg','F'),
(16, 'Samara', 'Sandy', 'V90653986', '2022-2-4', 'V90653986.jpg','M'),
(17, 'Amy', 'Overnell', 'V70018820', '2022-3-2', 'V70018820.jpg','M'),
(18, 'Emiline', 'Conring', 'V58352407', '2021-11-28', 'V58352407.jpg','M'),
(19, 'Gabbie', 'Duffan', 'V48483148', '2022-8-15', 'V48483148.png','F'),
(20, 'Marcelle', 'Sword', 'V31338339', '2022-3-4', 'V31338339.jpg','M');


-- EMPLEADOS

INSERT IGNORE INTO `empleados` (id_Empleado, Fecha_Ingreso, id_Personas) VALUES 
(1,'2022-08-30',1),
(2,'2022-08-30',2),
(3,'2022-08-30',3),
(4,'2022-03-30',4),
(5,'2022-05-30',5),
(6,'2022-07-30',6),
(7,'2022-08-30',7),
(8,'2022-08-30',8),
(9,'2022-08-30',9),
(10,'2021-08-30',10),
(11,'2022-08-30',11),
(12,'2022-04-30',12),
(13,'2022-08-30',13),
(14,'2022-08-30',14),
(15,'2020-08-30',15),
(16,'2019-08-30',16),
(17,'2022-08-30',17),
(18,'2022-08-30',18),
(19,'2022-08-30',19),
(20,'2022-08-30',20);


-- OBREROS

INSERT IGNORE INTO `obreros`(`id_Obrero`, `Rol`, `id_Empleado`) VALUES 
(1,'Limpieza',1),
(2,'Cocina',2),
(3,'Limpieza',3),
(4,'Mantenimiento',4),
(5,'Limpieza',5),
(6,'Jardineria',6);

-- DOCENTES

INSERT IGNORE INTO `docentes`(`id_Docente`, `Area`, `Horas_Clase_S`, `id_Empleado`) VALUES 
(1,'Inglés', 16,7),
(2,'Castellano', 26,8),
(3,'Matemática', 18,9),
(4,'Cálculo', 13,10),
(5,'Educ. Fisica', 10,11),
(6,'Química', 32,12);

-- ADMINISTRATIVOS

INSERT IGNORE INTO `administrativos`(`id_Administrativo`, `id_Empleado`) VALUES 
(1,13),
(2,14),
(3,15),
(4,16),
(5,17),
(6,18),
(7,19),
(8,20);

-- CONTACTOS

INSERT IGNORE INTO contactos (id_Contacto, Correo, id_Personas) VALUES 
(1, 'aslinn0@paginegialle.i',1),
(2, 'athain1@nifty.co',2),
(3, 'shandrahan2@parallels.co',3),
(4, 'nfranzke3@diigo.co',4),
(5, 'cpeddowe4@marriott.co',5),
(6, 'kmoxham5@umich.ed',6),
(7, 'ldevuyst6@nih.go',7),
(8, 'vnafzger7@symantec.co',8),
(9, 'lteodorski8@jimdo.co',9),
(10, 'rfeye9@japanpost.jp',10),
(11, 'mpotzolda@webs.com',11),
(12, 'rlaitb@spiegel.de',12),
(13, 'mcristofaroc@mapquest.com',13),
(14, 'hlinchd@google.com',14),
(15, 'jjoynsone@godaddy.com',15),
(16, 'awickesf@yahoo.co',16),
(17, 'vbeninig@phoca.cz',17),
(18, 'nloughanh@jimdo.com',18),
(19, 'mbelfitti@g.co',19),
(20, 'ktothacotj@indiatimes.com',20);

-- TELEFONOS

INSERT IGNORE INTO `telefonos` (`id_Telefono`, `Prefijo`, `Numero`, `Relacion`, `id_Contacto`) VALUES 
(1, '3022', '10000000', 'P', 1),
(2, '3022', '10000000', 'S', 1),
(3, '3022', '10000000', 'A', 1),
(4, '2240', '9999999', 'P', 2),
(5, '2240', '9999999', 'S', 2),
(6, '2240', '9999999', 'A', 2),
(7, '3180', '9999999', 'P', 3),
(8, '3180', '9999999', 'S', 3),
(9, '3180', '9999999', 'A', 3),
(10, '7421', '9999999', 'P', 4),
(11, '7421', '9999999', 'S', 4),
(12, '7421', '9999999', 'A', 4),
(13, '5827', '9999999', 'P', 5),
(14, '5827', '9999999', 'S', 5),
(15, '5827', '9999999', 'A', 5),
(16, '4322', '10000000', 'P', 6),
(17, '4322', '10000000', 'S', 6),
(18, '4322', '10000000', 'A', 6),
(19, '1834', '9999999', 'P', 7),
(20, '1834', '9999999', 'S', 7),
(21, '1834', '9999999', 'A', 7),
(22, '7049', '10000000', 'P', 8),
(23, '7049', '10000000', 'S', 8),
(24, '7049', '10000000', 'A', 8),
(25, '8735', '9999999', 'P', 9),
(26, '8735', '9999999', 'S', 9),
(27, '8735', '9999999', 'A', 9),
(28, '1414', '10000000', 'P', 10),
(29, '1414', '10000000', 'S', 10),
(30, '1414', '10000000', 'A', 10),
(31, '2257', '10000000', 'P', 11),
(32, '2257', '10000000', 'S', 11),
(33, '2257', '10000000', 'A', 11),
(34, '7732', '10000000', 'P', 12),
(35, '7732', '10000000', 'S', 12),
(36, '7732', '10000000', 'A', 12),
(37, '9299', '10000000', 'P', 13),
(38, '9299', '10000000', 'S', 13),
(39, '9299', '10000000', 'A', 13),
(40, '7907', '10000000', 'P', 14),
(41, '7907', '10000000', 'S', 14),
(42, '7907', '10000000', 'A', 14),
(43, '1884', '10000000', 'P', 15),
(44, '1884', '10000000', 'S', 15),
(45, '1884', '10000000', 'A', 15),
(46, '6092', '9999999', 'P', 16),
(47, '6092', '9999999', 'S', 16),
(48, '6092', '9999999', 'A', 16),
(49, '9113', '9999999', 'P', 17),
(50, '9113', '9999999', 'S', 17),
(51, '9113', '9999999', 'A', 17),
(52, '1849', '9999999', 'P', 18),
(53, '1849', '9999999', 'S', 18),
(54, '1849', '9999999', 'A', 18),
(55, '6190', '10000000', 'P', 19),
(56, '6190', '10000000', 'S', 19),
(57, '6190', '10000000', 'A', 19),
(58, '8688', '9999999', 'P', 20),
(59, '8688', '9999999', 'S', 20),
(60, '8688', '9999999', 'A', 20);

-- DIRECCIONES
INSERT IGNORE INTO direcciones (id_Direccion, Municipio, Parroquia, Direccion, Contactos_id_Contacto) VALUES 
(1, 'Leiria', 'Casal Galego', '1 Sauthoff Terrace', 1),
(2, 'Missouri', 'Jefferson City', '499 Bultman Circle', 2),
(3, 'Missouri', 'Ben Arous', '494 Moulton Alley', 3),
(4, 'Missouri', 'Guli', '8 Vernon Trail', 4),
(5, 'Missouri', 'Madoi', '95 Fulton Plaza', 5),
(6, 'Missouri', 'Cajuru', '38588 Miller Way', 6),
(7, 'Missouri', 'Perniö', '899 Laurel Center', 7),
(8, 'Missouri', 'Tarragona', '867 Menomonie Trail', 8),
(9, 'Missouri', 'Jankovec', '334 Sherman Circle', 9),
(10, 'Missouri', 'Zarasai', '8 Bartillon Trail', 10),
(11, 'Missouri', 'Koceljeva', '1658 Anzinger Street', 11),
(12, 'British Columbia', 'North Saanich', '3735 Westridge Center', 12),
(13, 'Missouri', 'General Alvear', '3 Iowa Park', 13),
(14, 'Missouri', 'Pantano do Sul', '454 Bultman Pass', 14),
(15, 'Missouri', 'Shōbu', '17201 Old Gate Way', 15),
(16, 'Missouri', 'Shambu', '9606 Elmside Point', 16),
(17, 'Texas', 'Fort Worth', '57167 Marcy Hill', 17),
(18, 'Halland', 'Halmstad', '09 Jackson Crossing', 18),
(19, 'Missouri', 'Zárate', '744 Brown Parkway', 19),
(20, 'Missouri', 'Borgarnes', '3211 Northridge Lane', 20);

-- ESTUDIOS
INSERT IGNORE INTO estudios (id_Estudio, Nivel_Acad, Titulo_Obt, Mencion, Estudio_2do_Nvl, Empleados_id_Empleado) VALUES
(1, 0, 'Internal Auditor', 'Biostatistician IV', 'Senior Editor', 1),
(2, 3, 'Senior Sales Associate', 'Recruiter', 'Junior Executive', 2),
(3, 2, 'Graphic Designer', 'General Manager', 'Web Developer IV', 3),
(4, 1, 'Clinical Specialist', 'Systems Administrator II', 'Marketing Manager', 4),
(5, 2, 'Payment Adjustment Coordinator', 'Database Administrator IV', 'Director of Sales', 5),
(6, 1, 'Geologist II', 'Media Manager IV', 'Paralegal', 6),
(7, 3, 'Database Administrator I', 'VP Product Management', 'Pharmacist', 7),
(8, 2, 'Executive Secretary', 'Technical Writer', 'Analog Circuit Design manager', 8),
(9, 1, 'Database Administrator II', 'Assistant Media Planner', 'Human Resources Assistant II', 9),
(10, 1, 'Budget/Accounting Analyst III', 'Software Consultant', 'Design Engineer', 10),
(11, 1, 'Financial Analyst', 'Accountant II', 'Dental Hygienist', 11),
(12, 2, 'Business Systems Development Analyst', 'Civil Engineer', 'Staff Accountant I', 12),
(13, 1, 'Programmer Analyst III', 'Legal Assistant', 'Financial Analyst', 13),
(14, 2, 'Actuary', 'Environmental Tech', 'Staff Scientist', 14),
(15, 1, 'Nuclear Power Engineer', 'Operator', 'Speech Pathologist', 15),
(16, 0, 'Accountant I', 'Teacher', 'Biostatistician III', 16),
(17, 0, 'Graphic Designer', 'Media Manager IV', 'Executive Secretary', 17),
(18, 0, 'Account Representative I', 'Quality Engineer', 'Safety Technician I', 18),
(19, 1, 'Recruiter', 'Staff Scientist', 'Web Developer IV', 19),
(20, 1, 'Executive Secretary', 'Database Administrator II', 'Technical Writer', 20);

-- CARGA HORARIA
INSERT IGNORE INTO carga_horaria (id_Carga_Horaria, Carga_Horaria_Semanal, Empleados_id_Empleado) VALUES 
(1, 51, 1),
(2, 127, 2),
(3, 72, 3),
(4, 106, 4),
(5, 63, 5),
(6, 140, 6),
(7, 21, 7),
(8, 23, 8),
(9, 94, 9),
(10, 89, 10),
(11, 41, 11),
(12, 108, 12),
(13, 96, 13),
(14, 20, 14),
(15, 130, 15),
(16, 34, 16),
(17, 78, 17),
(18, 71, 18),
(19, 61, 19),
(20, 91, 20);

-- INFORMES
INSERT INTO informes (id_Informe, Cert_Salud, Tarjeta_Vac, Personas_id_Persona) VALUES 
(1, 'Valido', 'Valido', 1),
(2, 'Valido', 'No valido', 2),
(3, 'Valido', 'Valido', 3),
(4, 'No valido', 'No valido', 4),
(5, 'Valido', 'Valido', 5),
(6, 'No valido', 'No valido', 6),
(7, 'Valido', 'No valido', 7),
(8, 'Valido', 'No valido', 8),
(9, 'No valido', 'No valido', 9),
(10, 'Valido', 'No valido', 10),
(11, 'No valido', 'No valido', 11),
(12, 'Valido', 'No valido', 12),
(13, 'No valido', 'Valido', 13),
(14, 'No valido', 'Valido', 14),
(15, 'No valido', 'Valido', 15),
(16, 'Valido', 'No valido', 16),
(17, 'Valido', 'No valido', 17),
(18, 'No valido', 'No valido', 18),
(19, 'Valido', 'No valido', 19),
(20, 'Valido', 'Valido', 20);