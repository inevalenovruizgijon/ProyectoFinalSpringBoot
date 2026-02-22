-- PostgreSQL compatible dump for cs_skin_market

-- --------------------------------------------------------
-- Tabla carrito_item
-- --------------------------------------------------------
CREATE TABLE carrito_item (
    id BIGSERIAL PRIMARY KEY,
    cantidad INTEGER NOT NULL,
    skin_id BIGINT,
    user_id BIGINT
);

-- --------------------------------------------------------
-- Tabla categoria
-- --------------------------------------------------------
CREATE TABLE categoria (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE
);

-- Datos categoria
INSERT INTO categoria (id, nombre) VALUES
(5, 'Escopeta'),
(3, 'Francotirador'),
(2, 'Pistola'),
(1, 'Rifle'),
(4, 'SMG');

-- --------------------------------------------------------
-- Tabla skin
-- --------------------------------------------------------
CREATE TABLE skin (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255),
    precio DOUBLE PRECISION NOT NULL,
    tipo_id BIGINT NOT NULL,
    usuario_id BIGINT,
    imagen_url VARCHAR(600),
    rareza VARCHAR(255),
    owner_id BIGINT,
    categoria_id BIGINT NOT NULL
);

-- --------------------------------------------------------
-- Tabla skinsDisponibles
-- --------------------------------------------------------
CREATE TABLE skinsDisponibles (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tipo_id BIGINT NOT NULL
);

-- --------------------------------------------------------
-- Tabla skinsisponibles
-- --------------------------------------------------------
CREATE TABLE skinsisponibles (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255),
    tipo_id BIGINT NOT NULL
);

-- --------------------------------------------------------
-- Tabla skins_disponibles
-- --------------------------------------------------------
CREATE TABLE skins_disponibles (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255),
    tipo_id BIGINT NOT NULL
);

-- --------------------------------------------------------
-- Tabla tipo
-- --------------------------------------------------------
CREATE TABLE tipo (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    categoria_id BIGINT NOT NULL
);

-- Datos tipo
INSERT INTO tipo (id, nombre, categoria_id) VALUES
(1, 'AK-47', 1),
(2, 'M4A1-S', 1),
(3, 'AWP', 3),
(4, 'Glock-18', 2),
(5, 'Desert Eagle', 2),
(6, 'MP9', 4),
(7, 'P90', 4),
(8, 'Nova', 5),
(9, 'Sawed-Off', 5);

-- --------------------------------------------------------
-- Tabla users
-- --------------------------------------------------------
CREATE TABLE users (
    id BIGSERIAL PRIMARY KEY,
    nombre VARCHAR(255) UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    correo VARCHAR(255) UNIQUE,
    enabled BOOLEAN NOT NULL DEFAULT TRUE
);

-- --------------------------------------------------------
-- Foreign Keys
-- --------------------------------------------------------
ALTER TABLE carrito_item
    ADD CONSTRAINT fk_carrito_skin FOREIGN KEY (skin_id) REFERENCES skin(id),
    ADD CONSTRAINT fk_carrito_user FOREIGN KEY (user_id) REFERENCES users(id);

ALTER TABLE skin
    ADD CONSTRAINT fk_skin_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id),
    ADD CONSTRAINT fk_skin_tipo FOREIGN KEY (tipo_id) REFERENCES tipo(id) ON DELETE CASCADE,
    ADD CONSTRAINT fk_skin_usuario FOREIGN KEY (usuario_id) REFERENCES users(id) ON DELETE SET NULL,
    ADD CONSTRAINT fk_skin_owner FOREIGN KEY (owner_id) REFERENCES users(id);

ALTER TABLE skinsDisponibles
    ADD CONSTRAINT fk_skinsdisponibles_tipo FOREIGN KEY (tipo_id) REFERENCES tipo(id);

ALTER TABLE skinsisponibles
    ADD CONSTRAINT fk_skinsisponibles_tipo FOREIGN KEY (tipo_id) REFERENCES tipo(id);

ALTER TABLE skins_disponibles
    ADD CONSTRAINT fk_skins_disponibles_tipo FOREIGN KEY (tipo_id) REFERENCES tipo(id);

ALTER TABLE tipo
    ADD CONSTRAINT fk_tipo_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id) ON DELETE CASCADE;