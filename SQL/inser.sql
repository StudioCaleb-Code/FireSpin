-- ROLES
INSERT INTO roles (nombre) VALUES ('admin'), ('operador');

-- ESTADOS
INSERT INTO estados (nombre, descripcion) VALUES
('activo', 'Activo'),
('inactivo', 'Inactivo'),
('ganador', 'Ya ganó'),
('pendiente', 'Pendiente');

-- PERMISOS
INSERT INTO permisos (nombre, descripcion) VALUES
('ver_usuarios', 'Ver usuarios'),
('crear_usuarios', 'Crear usuarios'),
('ver_eventos', 'Ver eventos'),
('crear_eventos', 'Crear eventos'),
('usar_ruleta', 'Usar ruleta');