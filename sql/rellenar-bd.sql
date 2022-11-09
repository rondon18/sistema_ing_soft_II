-- PERSONAS

insert into Personas (id_Persona, Nombre, Apellido, Cedula, Fecha_Nac, Ruta_Imagen) values 
(1, 'Morganica', 'Lawty', 'V12649473', '2022-4-14', null),
(2, 'Edythe', 'Rigney', 'V13415496', '2022-1-16', null),
(3, 'Berne', 'Pavlenkov', 'V84769533', '2022-8-9', null),
(4, 'Tull', 'Monget', 'V55945231', '2022-5-9', null),
(5, 'Hobie', 'Barthelet', 'V08851411', '2022-4-21', null),
(6, 'Allin', 'Molineaux', 'V96647829', '2022-1-17', null),
(7, 'Terri', 'Fist', 'V93909125', '2022-10-18', null),
(8, 'Ramsay', 'Roussel', 'V69823294', '2022-7-21', null),
(9, 'Frannie', 'Pirkis', 'V10113385', '2022-8-6', null),
(10, 'Evaleen', 'Bindley', 'V32896787', '2022-4-6', null),
(11, 'Reinaldos', 'Brabham', 'V35029573', '2022-9-1', null),
(12, 'Arny', 'Liverseege', 'V66509818', '2022-1-1', null),
(13, 'Cal', 'Vedyashkin', 'V66298340', '2021-12-7', null),
(14, 'Ralf', 'Barnwall', 'V50950642', '2022-10-7', null),
(15, 'Rebekkah', 'Jaycock', 'V12716584', '2022-10-18', null),
(16, 'Samara', 'Sandy', 'V90653986', '2022-2-4', null),
(17, 'Amy', 'Overnell', 'V70018820', '2022-3-2', null),
(18, 'Emiline', 'Conring', 'V58352407', '2021-11-28', null),
(19, 'Gabbie', 'Duffan', 'V48483148', '2022-8-15', null),
(20, 'Marcelle', 'Sword', 'V31338339', '2022-3-4', null);


-- EMPLEADOS

insert into empleados (id_Empleado, Profesion, Tipo_Cargo, Tiempo_Nomina, id_Personas) values 
(1, 'Associate Professor', 'Media Manager III', 85, 1),
(2, 'Business Systems Development Analyst', 'Environmental Specialist', 24, 2),
(3, 'Safety Technician I', 'Quality Control Specialist', 63, 3),
(4, 'Marketing Assistant', 'Help Desk Operator', 51, 4),
(5, 'Financial Analyst', 'Research Nurse', 68, 5),
(6, 'Administrative Assistant II', 'Dental Hygienist', 84, 6),
(7, 'Assistant Professor', 'Data Coordiator', 85, 7),
(8, 'Senior Cost Accountant', 'Database Administrator I', 83, 8),
(9, 'Assistant Professor', 'Social Worker', 87, 9),
(10, 'Product Engineer', 'Account Executive', 70, 10),
(11, 'Nuclear Power Engineer', 'Human Resources Assistant II', 59, 11),
(12, 'Assistant Professor', 'Quality Engineer', 9, 12),
(13, 'Geologist I', 'Chemical Engineer', 25, 13),
(14, 'Data Coordiator', 'Senior Cost Accountant', 65, 14),
(15, 'General Manager', 'Internal Auditor', 8, 15),
(16, 'Social Worker', 'Media Manager II', 67, 16),
(17, 'General Manager', 'Director of Sales', 60, 17),
(18, 'Human Resources Manager', 'Product Engineer', 95, 18),
(19, 'Internal Auditor', 'Media Manager I', 47, 19),
(20, 'Associate Professor', 'Software Consultant', 8, 20);


-- OBREROS

INSERT INTO `obreros`(`id_Obrero`, `Horas`, `id_Empleado`) VALUES 
(NULL,15,1),
(NULL,15,2),
(NULL,15,3),
(NULL,15,4),
(NULL,15,5),
(NULL,15,6);

-- DOCENTES

INSERT INTO `docentes`(`id_Docente`, `Hrs_Academicas`, `Area`, `id_Empleado`) VALUES 
(NULL,10,'Docencia',7),
(NULL,10,'Docencia',8),
(NULL,10,'Docencia',9),
(NULL,10,'Docencia',10),
(NULL,10,'Docencia',11),
(NULL,10,'Docencia',12);

-- ADMINISTRATIVOS

INSERT INTO `administrativos`(`id_Administrativo`, `id_Empleado`) VALUES 
(NULL,13),
(NULL,14),
(NULL,15),
(NULL,16),
(NULL,17),
(NULL,18),
(NULL,19),
(NULL,20);



-- CONTACTOS

insert into contactos (id_Contacto, Correo, Direccion, id_Personas) values 
(1, 'aslinn0@paginegialle.it', '9 Everett Center', 1),
(2, 'athain1@nifty.com', '3782 Riverside Center', 2),
(3, 'shandrahan2@parallels.com', '5706 Blaine Trail', 3),
(4, 'nfranzke3@diigo.com', '0 Anniversary Parkway', 4),
(5, 'cpeddowe4@marriott.com', '22580 Nevada Avenue', 5),
(6, 'kmoxham5@umich.edu', '73486 Mayfield Park', 6),
(7, 'ldevuyst6@nih.gov', '3 Sachs Center', 7),
(8, 'vnafzger7@symantec.com', '033 Hanson Pass', 8),
(9, 'lteodorski8@jimdo.com', '8502 Wayridge Circle', 9),
(10, 'rfeye9@japanpost.jp', '778 American Point', 10),
(11, 'mpotzolda@webs.com', '16853 Mallard Crossing', 11),
(12, 'rlaitb@spiegel.de', '926 Sherman Lane', 12),
(13, 'mcristofaroc@mapquest.com', '568 Commercial Parkway', 13),
(14, 'hlinchd@google.com', '1 Northland Alley', 14),
(15, 'jjoynsone@godaddy.com', '65 Spaight Drive', 15),
(16, 'awickesf@yahoo.co.jp', '879 Dexter Center', 16),
(17, 'vbeninig@phoca.cz', '0402 Eggendart Plaza', 17),
(18, 'nloughanh@jimdo.com', '3747 Sullivan Parkway', 18),
(19, 'mbelfitti@g.co', '733 Pleasure Place', 19),
(20, 'ktothacotj@indiatimes.com', '6 Ilene Drive', 20);

-- TELEFONOS

insert into `telefonos` (`id_Telefono`, `Prefijo`, `Numero`, `Relacion`, `id_Contacto`) VALUES 
(NULL, '3022', '10000000', 'P', 1),
(NULL, '3022', '10000000', 'S', 1),
(NULL, '3022', '10000000', 'A', 1),
(NULL, '2240', '9999999', 'P', 2),
(NULL, '2240', '9999999', 'S', 2),
(NULL, '2240', '9999999', 'A', 2),
(NULL, '3180', '9999999', 'P', 3),
(NULL, '3180', '9999999', 'S', 3),
(NULL, '3180', '9999999', 'A', 3),
(NULL, '7421', '9999999', 'P', 4),
(NULL, '7421', '9999999', 'S', 4),
(NULL, '7421', '9999999', 'A', 4),
(NULL, '5827', '9999999', 'P', 5),
(NULL, '5827', '9999999', 'S', 5),
(NULL, '5827', '9999999', 'A', 5),
(NULL, '4322', '10000000', 'P', 6),
(NULL, '4322', '10000000', 'S', 6),
(NULL, '4322', '10000000', 'A', 6),
(NULL, '1834', '9999999', 'P', 7),
(NULL, '1834', '9999999', 'S', 7),
(NULL, '1834', '9999999', 'A', 7),
(NULL, '7049', '10000000', 'P', 8),
(NULL, '7049', '10000000', 'S', 8),
(NULL, '7049', '10000000', 'A', 8),
(NULL, '8735', '9999999', 'P', 9),
(NULL, '8735', '9999999', 'S', 9),
(NULL, '8735', '9999999', 'A', 9),
(NULL, '1414', '10000000', 'P', 10),
(NULL, '1414', '10000000', 'S', 10),
(NULL, '1414', '10000000', 'A', 10),
(NULL, '2257', '10000000', 'P', 11),
(NULL, '2257', '10000000', 'S', 11),
(NULL, '2257', '10000000', 'A', 11),
(NULL, '7732', '10000000', 'P', 12),
(NULL, '7732', '10000000', 'S', 12),
(NULL, '7732', '10000000', 'A', 12),
(NULL, '9299', '10000000', 'P', 13),
(NULL, '9299', '10000000', 'S', 13),
(NULL, '9299', '10000000', 'A', 13),
(NULL, '7907', '10000000', 'P', 14),
(NULL, '7907', '10000000', 'S', 14),
(NULL, '7907', '10000000', 'A', 14),
(NULL, '1884', '10000000', 'P', 15),
(NULL, '1884', '10000000', 'S', 15),
(NULL, '1884', '10000000', 'A', 15),
(NULL, '6092', '9999999', 'P', 16),
(NULL, '6092', '9999999', 'S', 16),
(NULL, '6092', '9999999', 'A', 16),
(NULL, '9113', '9999999', 'P', 17),
(NULL, '9113', '9999999', 'S', 17),
(NULL, '9113', '9999999', 'A', 17),
(NULL, '1849', '9999999', 'P', 18),
(NULL, '1849', '9999999', 'S', 18),
(NULL, '1849', '9999999', 'A', 18),
(NULL, '6190', '10000000', 'P', 19),
(NULL, '6190', '10000000', 'S', 19),
(NULL, '6190', '10000000', 'A', 19),
(NULL, '8688', '9999999', 'P', 20),
(NULL, '8688', '9999999', 'S', 20),
(NULL, '8688', '9999999', 'A', 20);