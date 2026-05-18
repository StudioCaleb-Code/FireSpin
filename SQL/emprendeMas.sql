CREATE DATABASE IF NOT EXISTS emprende_mas DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

USE emprende_mas;

-- =========================
-- ROLES
-- =========================
CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
) ENGINE = InnoDB;

-- =========================
-- PERMISOS
-- =========================
CREATE TABLE permisos (
    id_permiso INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
) ENGINE = InnoDB;

-- =========================
-- RELACION ROL - PERMISO
-- =========================
CREATE TABLE rol_permiso (
    id_rol INT NOT NULL,
    id_permiso INT NOT NULL,
    PRIMARY KEY (id_rol, id_permiso),
    CONSTRAINT fk_rolperm_rol FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_rolperm_perm FOREIGN KEY (id_permiso) REFERENCES permisos (id_permiso) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- ESTADOS GENERALES
-- =========================
CREATE TABLE estados (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255)
) ENGINE = InnoDB;

-- =========================
-- USUARIOS (DATOS)
-- =========================
CREATE TABLE datosU (
    id_datosU INT AUTO_INCREMENT PRIMARY KEY,
    dni CHAR(8) NOT NULL,
    nombres VARCHAR(150) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    telefono VARCHAR(15) NOT NULL
);

CREATE TABLE empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    ruc CHAR(11) NOT NULL,
    dni CHAR(8) NOT NULL,
    nombre_empresa VARCHAR(255) NOT NULL,
    dueno VARCHAR(255) NOT NULL,
    encargado VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    logo_empresa VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;
-- =========================
-- USUARIOS (PANEL)
-- =========================
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    id_rol INT NOT NULL,
    id_datosU INT NOT NULL,
    id_empresa INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_estado INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON UPDATE CASCADE,
    CONSTRAINT fk_usuario_estado FOREIGN KEY (id_estado) REFERENCES estados (id_estado) ON UPDATE CASCADE,
    CONSTRAINT fk_usuario_datosU FOREIGN KEY (id_datosU) REFERENCES datosU (id_datosU) ON UPDATE CASCADE,
    CONSTRAINT fk_usuario_empresa FOREIGN KEY (id_empresa) REFERENCES empresa (id_empresa) ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- GALERIAS
-- =========================
CREATE TABLE galerias (
    id_galeria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(255)
) ENGINE = InnoDB;

-- =========================
-- PREMIOS
-- =========================
CREATE TABLE premios (
    id_premio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255),
    id_galeria INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_premio_galeria FOREIGN KEY (id_galeria) REFERENCES galerias (id_galeria) ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- MULTIPLES IMAGENES POR PREMIO
-- =========================
CREATE TABLE premio_imagen (
    id_imagen INT AUTO_INCREMENT PRIMARY KEY,
    id_premio INT NOT NULL,
    ruta VARCHAR(255) NOT NULL,
    CONSTRAINT fk_img_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- EVENTOS
-- =========================
CREATE TABLE eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    slug VARCHAR(255) UNIQUE, -- para link tipo /registro/sorteo-navidad
    descripcion TEXT,
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    imagen VARCHAR(255),
    diseno VARCHAR(50),
    id_estado INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_evento_estado FOREIGN KEY (id_estado) REFERENCES estados (id_estado) ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- EVENTO - PREMIOS
-- =========================
CREATE TABLE evento_premio (
    id_evento INT NOT NULL,
    id_premio INT NOT NULL,
    cantidad INT DEFAULT 1,
    PRIMARY KEY (id_evento, id_premio),
    CONSTRAINT fk_ep_evento FOREIGN KEY (id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_ep_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- PARTICIPANTES
-- =========================
CREATE TABLE participantes (
    id_participante INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(8) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(150) NOT NULL,
    telefono VARCHAR(15),
    direccion VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- =========================
-- REGISTRO A EVENTOS
-- =========================
CREATE TABLE registro_evento (
    id_registro INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT NOT NULL,
    id_participante INT NOT NULL,
    id_estado INT,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uk_evento_participante (id_evento, id_participante),
    CONSTRAINT fk_reg_evento FOREIGN KEY (id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_reg_participante FOREIGN KEY (id_participante) REFERENCES participantes (id_participante) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_reg_estado FOREIGN KEY (id_estado) REFERENCES estados (id_estado) ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =========================
-- GANADORES (RULETA)
-- =========================
CREATE TABLE ganadores (
    id_ganador INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT NOT NULL,
    id_participante INT NOT NULL,
    id_premio INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_gan_evento FOREIGN KEY (id_evento) REFERENCES eventos (id_evento) ON UPDATE CASCADE,
    CONSTRAINT fk_gan_participante FOREIGN KEY (id_participante) REFERENCES participantes (id_participante) ON UPDATE CASCADE,
    CONSTRAINT fk_gan_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON UPDATE CASCADE
) ENGINE = InnoDB;

