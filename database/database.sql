CREATE DATABASE IF NOT EXISTS bda_project;

USE bda_project;



CREATE TABLE IF NOT EXISTS periodos(
id int(255) auto_increment not null,
name varchar(255),
CONSTRAINT pk_periodos PRIMARY KEY(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS postgrados(
id int(255) auto_increment not null,
name varchar(255),
CONSTRAINT pk_postgrados PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS promocions(
id int(255) auto_increment not null,
name varchar(255),
CONSTRAINT pk_promocions PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS pregrados(
id int(255) auto_increment not null,
name varchar(255),
CONSTRAINT pk_pregrado PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS periodogrados(
id int(255) auto_increment not null,
name varchar(255),
CONSTRAINT pk_periodogrados PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS users(
id  int(255) auto_increment not null,
periodo_id int(255),
postgrado_id int(255),
pregrado_id int(255),
periodoGrado_id int(255),
promocion_id int(255),
role    varchar(20),
name varchar(100),
surname varchar(100),
img   varchar(255),
dni varchar(100),
email varchar(255),
password varchar(255),
created_at datetime,
updated_at datetime,
remember_token varchar(255),

CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT fk_periodo_usuarios FOREIGN KEY(periodo_id) REFERENCES periodos(id),
CONSTRAINT fk_postgrado_usuarios FOREIGN KEY(postgrado_id) REFERENCES postgrados(id),
CONSTRAINT fk_pregrado_usuarios FOREIGN KEY(pregrado_id) REFERENCES pregrados(id),
CONSTRAINT fk_periodoGrado_usuarios FOREIGN KEY(periodoGrado_id) REFERENCES periodogrados(id),
CONSTRAINT fk_promocion_usuarios FOREIGN KEY(promocion_id) REFERENCES promocions(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS documents(
id int(255) auto_increment not null,
user_id int(255),
status varchar(20),
planilla_datos_personales varchar(255),
copia_cedula    varchar(255),
record_academico    varchar(255),
constancia_culminacion_servicio_comunitario varchar(255),
acta_evaluacion_pasantias    varchar(255),
certificado_pasantias    varchar(255),
acta_defensa_trabajo_especial_grado varchar(255),
constancia_practicas_educativas  varchar(255),
acta_pasantia_hospitalaria_comunitaria  varchar(255),
certificado_pastantia_hospitalaria_comunitaria varchar(255),
comunicacion_adicional_casos_concretos varchar(255),
reconocimientos_amonestaciones  varchar(255),
titulo_bachiller_fondonegro varchar(255),
copia_titulo_bachiller  varchar(255),
copia_notas_certificadas_educacion_media    varchar(255),
fotocopia_partida_nacimiento    varchar(255),
planilla_rusni  varchar(255),
planilla_din    varchar(255),
created_at datetime,
updated_at datetime,

CONSTRAINT pk_documents PRIMARY KEY(id),
CONSTRAINT fk_documents_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS messages(
id int(255) auto_increment not null,
document_id int(255),
message varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_messages PRIMARY KEY(id),
CONSTRAINT fk_messages_document FOREIGN KEY(document_id) REFERENCES documents(id)
)ENGINE=InnoDb;


INSERT INTO `pregrados` (`id`, `name`) 
VALUES (NULL, 'Ingeniería de Sistemas'), (NULL, 'Ingeniería Civil'),
(NULL, 'Licenciatura en Administración'),
(NULL, 'Ingeniería Eléctrica'),
(NULL, 'Turismo'),
(NULL,'Ingeniería Mecánica'),
(NULL,'Ingeniería Industrial'),
(NULL,'Ingeniería Informática'),
(NULL,'Ingeniería Ambiental');


INSERT INTO `promocions` (`id`, `name`) 
VALUES (NULL, 'I'), (NULL, 'II'),
(NULL, 'III'),(NULL, 'IV'),
(NULL, 'V'),(NULL,'VI'),
(NULL,'VII'),(NULL,'VIII'),
(NULL,'IX'),(NULL,'X'),(NULL,'XI'),(NULL,'XII'),
(NULL,'XII'),(NULL,'XIV'),(NULL,'XV'),(NULL,'XVI'),
(NULL,'XVII'),(NULL,'XVIII'),(NULL,'XIX'),(NULL,'XX'),
(NULL,'XXI'),(NULL,'XXII'),(NULL,'XXIII'),(NULL,'XXIV'),
(NULL,'XXV'),(NULL,'XXVI'),(NULL,'XXVII'),(NULL,'XVIII'),
(NULL,'XXIX'), (NULL,'XXX');


INSERT INTO `postgrados` (`id`, `name`) 
VALUES (NULL, 'POSTGRADO1'), (NULL, 'POSTGRADO2'), (NULL, 'POSTGRADO3'), (NULL, 'POSTGRADO4'),
(NULL, 'POSTGRADO5'), (NULL, 'POSTGRADO6'), (NULL, 'POSTGRADO7'), (NULL, 'POSTGRADO8'),
(NULL, 'POSTGRADO9'), (NULL, 'POSTGRADO10'), (NULL, 'POSTGRADO11'), (NULL, 'POSTGRADO12'),
 (NULL, 'POSTGRADO13'), (NULL, 'POSTGRADO14'), (NULL, 'POSTGRADO15'), (NULL, 'POSTGRADO16');

 INSERT INTO `periodogrados` (`id`, `name`) 
VALUES (NULL, '1-2010'), (NULL, '2-2010'), (NULL, '1-2011'), (NULL, '2-2011'),
(NULL, '1-2012'), (NULL, '2-2012'), (NULL, '1-2013'), (NULL, '2-2013'),
(NULL, '1-2014'), (NULL, '2-2014'), (NULL, '1-2015'), (NULL, '2-2015'),
 (NULL, '1-2016'), (NULL, '2-2016'), (NULL, '1-2017'), (NULL, '2-2017');



  INSERT INTO `periodogrados` (`id`, `name`) 
VALUES (NULL, '1-2018'), (NULL, '2-2018'), (NULL, '1-2019'), (NULL, '2-2019'),
(NULL, '1-2020'), (NULL, '2-2020'), (NULL, '1-2021'), (NULL, '2-2021'),
(NULL, '1-2022'), (NULL, '2-2022'), (NULL, '1-2023'), (NULL, '2-2023'),
 (NULL, '1-2024'), (NULL, '2-2024'), (NULL, '1-2025'), (NULL, '2-2025');



