CREATE DATABASE IF NOT EXISTS project;

USE project;

CREATE TABLE IF NOT EXISTS users(
id  int(255) auto_increment not null,
rol   varchar(20),
nombres varchar(100),
apellidos varchar(100),
cedula varchar(100),
email varchar(255),
telefono varchar(255),
password varchar(255),
created_at datetime,
updated_at datetime,
remember_token varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS carreras(
    id  int(255) auto_increment not null,
    nombre varchar(255),
    codigo varchar(100),
    CONSTRAINT pk_carreras PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS estudiantes(
    id  int(255) auto_increment not null,
    usuario_id int(255),
    carrera_id int (255),
    CONSTRAINT pk_estudiantes PRIMARY KEY(id),
    CONSTRAINT fk_estudiantes_users FOREIGN KEY(usuario_id) REFERENCES users(id),
    CONSTRAINT fk_estudiantes_carreras FOREIGN KEY(carrera_id) REFERENCES carreras(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS empleados(
    id  int(255) auto_increment not null,
    usuario_id int(255),
    cargo varchar(255),
    acceso varchar(255),
    CONSTRAINT pk_empleados PRIMARY KEY(id),
    CONSTRAINT fk_empleados_users FOREIGN KEY(usuario_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS direcciones(
    id int(255) auto_increment not null,
    estado varchar(100),
    municipio varchar(100),
    parroquia varchar(100),
    comunidad varchar(100),
    consejo_comunal varchar(100),
    CONSTRAINT pk_direcciones PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS empresas(
    id int(255) auto_increment not null,
    nombre varchar(100),
    departamento varchar(100),
    email varchar(255),
    telefono varchar(100),
    direccion_id int(100),
    CONSTRAINT pk_empresas PRIMARY KEY(id),
    CONSTRAINT fk_empresas_direcciones FOREIGN KEY(direccion_id) REFERENCES direcciones(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS cargos(
    id int(255) auto_increment not null,
    nombre varchar(100),
    CONSTRAINT pk_cargos PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS especialidades(
    id int(255) auto_increment not null,
    nombre varchar(100),
    CONSTRAINT pk_especialidades PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS expedientes(
    id int(255) auto_increment not null,
    usuario_id int(255) not null,
    estado varchar(100),
    created_at varchar(100),
    updated_at varchar(100),
    deleted_at varchar(100),
    CONSTRAINT pk_expedientes PRIMARY KEY(id),
    CONSTRAINT fk_expedientes_users FOREIGN KEY(usuario_id) REFERENCES users(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS documentos(
    id int(255) auto_increment not null,
    expediente_id int(255) not null,
    estado varchar(100),
    created_at varchar(100),
    updated_at varchar(100),
    deleted_at varchar(100),
    CONSTRAINT pk_documentos PRIMARY KEY(id),
    CONSTRAINT fk_documento_expedientes FOREIGN KEY(expediente_id) REFERENCES expedientes(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS notificaciones(
    id int(255) auto_increment not null,
    documento_id int(255) not null,
    mensaje varchar(100),
    created_at varchar(100),
    updated_at varchar(100),
    CONSTRAINT pk_notificaciones PRIMARY KEY(id),
    CONSTRAINT fk_notificaciones_documentos FOREIGN KEY(documento_id) REFERENCES documentos(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS cargos(
    id int(255) auto_increment not null,
    nombre varchar(100),
    CONSTRAINT pk_cargos PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS tutor_comunitarios(
    id int(255) auto_increment not null,
    nombres varchar(255),
    apellidos varchar(255),
    cedula varchar(255),
    email varchar(255),
    telefono varchar(255),
    direccion_id int(255),
    cargo_id int(255),
    CONSTRAINT pk_tutor_comunitarios PRIMARY KEY(id),
    CONSTRAINT fk_tutor_comunitarios_direcciones FOREIGN KEY(direccion_id) REFERENCES direcciones(id),
    CONSTRAINT fk_tutor_comunitarios_cargos FOREIGN KEY(cargo_id) REFERENCES cargos(id)
)ENGINE=InnoDb;



CREATE TABLE IF NOT EXISTS tutor_institucionals(
    id int(255) auto_increment not null,
    nombres varchar(255),
    apellidos varchar(255),
    cedula varchar(255),
    email varchar(255),
    telefono varchar(255),
    empresa_id int(255),
    especialidad_id int(255),
    CONSTRAINT pk_tutor_institucionals PRIMARY KEY(id),
    CONSTRAINT fk_tutor_institucional_empresas FOREIGN KEY(empresa_id) REFERENCES empresas(id),
    CONSTRAINT fk_tutor_institucional_especialidades FOREIGN KEY(especialidad_id) REFERENCES especialidades(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS tutor_academicos(
    id int(255) auto_increment not null,
    nombres varchar(255),
    apellidos varchar(255),
    cedula varchar(255),
    email varchar(255),
    telefono varchar(255),
    condicion varchar(100),
    especialidad_id int(255),
    CONSTRAINT pk_tutor_academicos PRIMARY KEY(id),
    CONSTRAINT fk_tutor_academicos_especialidad FOREIGN KEY(especialidad_id) REFERENCES especialidades(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS proyecto_comunitarios(
    id int(255) auto_increment not null,
    codigo varchar(255),
    titulo varchar(255),
    fecha_inicio datetime,        
    fecha_final datetime,
    tutor_comunitario_id int (255),
    tutor_academico_id int(255),
    CONSTRAINT pk_proyecto_comunitarios PRIMARY KEY(id),
    CONSTRAINT fk_proyecto_comunitarios_tutor_comunitarios FOREIGN KEY(tutor_comunitario_id) REFERENCES tutor_comunitarios(id),
    CONSTRAINT fk_proyecto_comunitarios_tutor_academicos FOREIGN KEY(tutor_academico_id) REFERENCES tutor_academicos(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS proyecto_pasantias(
    id int(255) auto_increment not null,
    codigo varchar(255),
    titulo varchar(255),
    fecha_inicio datetime,        
    fecha_final datetime,
    tutor_institucional_id int (255),
    tutor_academico_id int(255),
    CONSTRAINT pk_proyecto_pasantias PRIMARY KEY(id),
    CONSTRAINT fk_proyecto_pasantias_tutor_institucionals FOREIGN KEY(tutor_institucional_id) REFERENCES tutor_institucionals(id),
    CONSTRAINT fk_proyecto_pasantias_tutor_academicos FOREIGN KEY(tutor_academico_id) REFERENCES tutor_academicos(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS calificacion_proyecto_comunitarios(
    id int(255) auto_increment not null,
    estudiante_id int(255),
    proyecto_comunitario_id int (255),
    calificacion_tutor_academico int(255),
    calificacion_tutor_comunitario int(255),
    CONSTRAINT pk_calificacion_proyecto_comunitarios PRIMARY KEY(id),
    CONSTRAINT fk_calificacion_proyecto_comunitarios_proyecto_comunitarios FOREIGN KEY(proyecto_comunitario_id) REFERENCES proyecto_comunitarios(id),
    CONSTRAINT fk_proyecto_pasantias_estudiantes FOREIGN KEY(estudiante_id) REFERENCES estudiantes(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS calificacion_pasantias(
    id int(255) auto_increment not null,
    estudiante_id int(255),
    proyecto_pasantias_id int (255),
    calificacion_tutor_academico int(255),
    calificacion_tutor_institucional int(255),
    calificacion_comite_evaluador int(255),
    CONSTRAINT pk_calificacion_pasantias PRIMARY KEY(id),
    CONSTRAINT fk_calificacion_pasantias_proyecto_pasantias FOREIGN KEY(proyecto_pasantias_id) REFERENCES proyecto_pasantias(id),
    CONSTRAINT fk_calificacion_pasantias_estudiantes FOREIGN KEY(estudiante_id) REFERENCES estudiantes(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS docentes(
    id int(255) auto_increment not null,
    user_id int(255),
    especialidad varchar(255),
    telefono_residencial varchar(20),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_docentes PRIMARY KEY(id),
    CONSTRAINT fk_docentes_users FOREIGN KEY(user_id) REFERENCES users(id)

)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS datos_proyectos(
    id int(255) auto_increment not null,
    tutor_institucional_id int(255),
    tutor_academico_id int(255),
    jurado_examinador_id int(255),
    CONSTRAINT pk_datos_proyectos PRIMARY KEY(id),
    CONSTRAINT fk_datos_proyectos_tutor_institucionals FOREIGN KEY(tutor_institucional_id) REFERENCES tutor_institucionals(id),
    CONSTRAINT fk_datos_proyectos_tutor_academicos FOREIGN KEY(tutor_academico_id) REFERENCES tutor_academicos(id),
    CONSTRAINT fk_datos_proyectos_docentes FOREIGN KEY(jurado_examinador_id) REFERENCES docentes(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS proyectos_grados(
    id int(255) auto_increment not null,
    titulo varchar(255) not null,
    autor_id int(255) not null,
    fecha_presentacion datetime,
    datos_proyectos_id int(255),
    tipo_proyecto varchar(100),
    CONSTRAINT pk_proyectos_grados PRIMARY KEY(id),
    CONSTRAINT fk_proyectos_grados_estudiantes FOREIGN KEY(autor_id) REFERENCES estudiantes(id),
    CONSTRAINT fk_proyectos_grados_datos_proyectos FOREIGN KEY(datos_proyectos_id) REFERENCES datos_proyectos(id)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS datos_libros(
    id int(255) auto_increment not null,
    categoria varchar(255),
    cantidad varchar(255) ,
    editorial varchar(255) ,
    year varchar(255),
    seccion varchar(255), 
    pais varchar(255),
    edicion varchar(255), 
    autor varchar(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_datos_libros PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS libros(
    id int(255) auto_increment not null,
    titulo varchar(255),
    estado varchar(255),
    datos_libros_id int(255),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_libros PRIMARY KEY(id),
    CONSTRAINT fk_libros_datos_libros FOREIGN KEY(datos_libros_id) REFERENCES datos_libros(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS prestamo_libros(
    id int(255) auto_increment not null,
    libro_id int(255),
    prestamista_est_id int(255),
    prestamista_doc_id int(255),
    fecha_prestamo datetime,
    fecha_entrega datetime,
    estado varchar(100),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_prestamo_libros PRIMARY KEY(id),
    CONSTRAINT fk_prestamo_libros_libros FOREIGN KEY(libro_id) REFERENCES libros(id),
    CONSTRAINT fk_prestamo_libros_prestamista_est FOREIGN KEY(prestamista_est_id) REFERENCES estudiantes(id),
    CONSTRAINT fk_prestamo_libros_prestamista_doc FOREIGN KEY(prestamista_doc_id) REFERENCES docentes(id)
)ENGINE=InnoDb;

