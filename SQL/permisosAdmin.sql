-- =========================
-- DATOS BASE
-- =========================

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
    ('usar_ruleta', 'Usar ruleta');

-- asignar todos los permisos al admin
INSERT INTO
    rol_permiso (id_rol, id_permiso)
SELECT 1, id_permiso
FROM permisos;