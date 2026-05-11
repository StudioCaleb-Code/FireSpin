CREATE DATABASE IF NOT EXISTS emprende_mas DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

USE emprende_mas;

-- =====================================================
-- ROLES
-- =====================================================

CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- =====================================================
-- PERMISOS
-- =====================================================

CREATE TABLE permisos (
    id_permiso INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- =====================================================
-- RELACION ROL - PERMISO
-- =====================================================

CREATE TABLE rol_permiso (
    id_rol INT NOT NULL,
    id_permiso INT NOT NULL,
    PRIMARY KEY (id_rol, id_permiso),
    CONSTRAINT fk_rolperm_rol FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_rolperm_perm FOREIGN KEY (id_permiso) REFERENCES permisos (id_permiso) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- ESTADOS GENERALES
-- =====================================================

CREATE TABLE estados (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- =====================================================
-- EMPRESAS
-- =====================================================

CREATE TABLE empresas (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    ruc CHAR(11) NOT NULL UNIQUE,
    dni_dueno CHAR(8),
    nombre_empresa VARCHAR(255) NOT NULL,
    dueno VARCHAR(255) NOT NULL,
    encargado VARCHAR(255),
    telefono VARCHAR(15),
    direccion VARCHAR(255) NOT NULL,
    logo_empresa VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME NULL
) ENGINE = InnoDB;

-- =====================================================
-- DATOS PERSONALES USUARIOS
-- =====================================================

CREATE TABLE datos_usuario (
    id_datos_usuario INT AUTO_INCREMENT PRIMARY KEY,
    dni CHAR(8) NOT NULL,
    nombres VARCHAR(150) NOT NULL,
    apellidos VARCHAR(150) NOT NULL,
    telefono VARCHAR(15),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB;

-- =====================================================
-- USUARIOS DEL PANEL
-- =====================================================


CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,

    id_rol INT NOT NULL,
    id_datos_usuario INT NOT NULL,

-- NULL para superadmin global
id_empresa INT NULL,

    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,

    id_estado INT DEFAULT 1,

    ultimo_login DATETIME NULL,

    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME NULL,

    CONSTRAINT fk_usuario_rol
    FOREIGN KEY (id_rol)
    REFERENCES roles(id_rol)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,

    CONSTRAINT fk_usuario_estado
    FOREIGN KEY (id_estado)
    REFERENCES estados(id_estado)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

    CONSTRAINT fk_usuario_datos
    FOREIGN KEY (id_datos_usuario)
    REFERENCES datos_usuario(id_datos_usuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_usuario_empresa
    FOREIGN KEY (id_empresa)
    REFERENCES empresas(id_empresa)
    ON DELETE SET NULL
    ON UPDATE CASCADE

) ENGINE=InnoDB;

-- =====================================================
-- GALERIAS
-- =====================================================

CREATE TABLE galerias (
    id_galeria INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_galeria_empresa FOREIGN KEY (id_empresa) REFERENCES empresas (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- PREMIOS
-- =====================================================

CREATE TABLE premios (
    id_premio INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    id_galeria INT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    stock INT DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_premio_empresa FOREIGN KEY (id_empresa) REFERENCES empresas (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_premio_galeria FOREIGN KEY (id_galeria) REFERENCES galerias (id_galeria) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- MULTIPLES IMAGENES DE PREMIOS
-- =====================================================

CREATE TABLE premio_imagenes (
    id_imagen INT AUTO_INCREMENT PRIMARY KEY,
    id_premio INT NOT NULL,
    ruta VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_imagen_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- EVENTOS
-- =====================================================

CREATE TABLE eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    token VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT,
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    imagen VARCHAR(255),
    diseno VARCHAR(100),
    reutilizar_participantes TINYINT(1) DEFAULT 0,
    id_estado INT DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME NULL,
    CONSTRAINT fk_evento_empresa FOREIGN KEY (id_empresa) REFERENCES empresas (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_evento_estado FOREIGN KEY (id_estado) REFERENCES estados (id_estado) ON DELETE SET NULL ON UPDATE CASCADE,
    UNIQUE KEY uk_empresa_slug (id_empresa, slug)
) ENGINE = InnoDB;

-- =====================================================
-- EVENTO - PREMIOS
-- =====================================================

CREATE TABLE evento_premio (
    id_evento INT NOT NULL,
    id_premio INT NOT NULL,
    cantidad INT DEFAULT 1,
    PRIMARY KEY (id_evento, id_premio),
    CONSTRAINT fk_evento_premio_evento FOREIGN KEY (id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_evento_premio_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- PARTICIPANTES
-- CADA EMPRESA TIENE SUS PARTICIPANTES
-- =====================================================


CREATE TABLE participantes (
    id_participante INT AUTO_INCREMENT PRIMARY KEY,

    id_empresa INT NOT NULL,

    dni CHAR(8) NOT NULL,

    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(150) NOT NULL,

    telefono VARCHAR(15),
    direccion VARCHAR(255),
    email VARCHAR(255),

    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_participante_empresa
    FOREIGN KEY (id_empresa)
    REFERENCES empresas(id_empresa)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

-- evita duplicado SOLO dentro de la misma empresa
UNIQUE KEY uk_empresa_dni (id_empresa, dni) ) ENGINE=InnoDB;

-- =====================================================
-- REGISTRO DE PARTICIPANTES A EVENTOS
-- =====================================================


CREATE TABLE registro_evento (
    id_registro INT AUTO_INCREMENT PRIMARY KEY,

    id_evento INT NOT NULL,
    id_participante INT NOT NULL,

    numero_ticket VARCHAR(50) NULL,

    es_ganador TINYINT(1) DEFAULT 0,
    activo TINYINT(1) DEFAULT 1,

    id_estado INT DEFAULT 1,

    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_registro_evento
    FOREIGN KEY (id_evento)
    REFERENCES eventos(id_evento)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_registro_participante
    FOREIGN KEY (id_participante)
    REFERENCES participantes(id_participante)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_registro_estado
    FOREIGN KEY (id_estado)
    REFERENCES estados(id_estado)
    ON DELETE SET NULL
    ON UPDATE CASCADE,

-- evita duplicarse en el MISMO evento
UNIQUE KEY uk_evento_participante (id_evento, id_participante)

) ENGINE=InnoDB;

-- =====================================================
-- GANADORES
-- =====================================================

CREATE TABLE ganadores (
    id_ganador INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT NOT NULL,
    id_participante INT NOT NULL,
    id_premio INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_ganador_evento FOREIGN KEY (id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_ganador_participante FOREIGN KEY (id_participante) REFERENCES participantes (id_participante) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_ganador_premio FOREIGN KEY (id_premio) REFERENCES premios (id_premio) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- =====================================================
-- DATOS INICIALES
-- =====================================================

INSERT INTO
    permisos (nombre, descripcion)
VALUES (
        'ver_usuarios',
        'Ver usuarios'
    ),
    (
        'crear_usuarios',
        'Crear usuarios'
    ),
    (
        'editar_usuarios',
        'Editar usuarios'
    ),
    (
        'eliminar_usuarios',
        'Eliminar usuarios'
    ),
    (
        'ver_empresas',
        'Ver empresas'
    ),
    (
        'crear_empresas',
        'Crear empresas'
    ),
    (
        'editar_empresas',
        'Editar empresas'
    ),
    (
        'eliminar_empresas',
        'Eliminar empresas'
    ),
    ('ver_eventos', 'Ver eventos'),
    (
        'crear_eventos',
        'Crear eventos'
    ),
    (
        'editar_eventos',
        'Editar eventos'
    ),
    (
        'eliminar_eventos',
        'Eliminar eventos'
    ),
    (
        'ver_participantes',
        'Ver participantes'
    ),
    (
        'crear_participantes',
        'Crear participantes'
    ),
    ('usar_ruleta', 'Usar ruleta');

-- =====================================================
-- TODOS LOS PERMISOS AL SUPERADMIN
-- =====================================================

INSERT INTO
    rol_permiso (id_rol, id_permiso)
SELECT 1, id_permiso
FROM permisos;