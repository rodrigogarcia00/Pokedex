CREATE DATABASE IF NOT EXISTS pokedex_db;
USE pokedex_db;

DROP TABLE IF EXISTS pokemons;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL,
    rol VARCHAR(30) NOT NULL
);

CREATE TABLE pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    altura DECIMAL(5,2),
    peso DECIMAL(5,2)
);

INSERT INTO usuarios (usuario, nombre, contrasenia, rol) VALUES
('admin_pokedex', 'Admin Pokedex', 'contrasenia', 'ADMIN'),
('visitante', 'Usuario Visitante', 'contrasenia', 'VISITANTE');

INSERT INTO pokemons (numero, nombre, imagen, tipo, descripcion, altura, peso) VALUES
(1, 'Bulbasaur', 'img/pokemons/bulbasaur.png', 'planta', 'Una rara semilla fue plantada en su espalda al nacer. La planta brota y crece con este Pokémon.', 0.70, 6.90),
(2, 'Ivysaur', 'img/pokemons/ivysaur.png', 'planta', 'Cuando el bulbo de su lomo crece, parece perder la capacidad de erguirse sobre sus patas traseras.', 1.00, 13.00),
(3, 'Venusaur', 'img/pokemons/venusaur.png', 'planta', 'La flor de su espalda libera un aroma que calma a quienes lo rodean.', 2.00, 100.00),
(4, 'Charmander', 'img/pokemons/charmander.png', 'fuego', 'Prefiere las cosas calientes. Dicen que cuando llueve le sale vapor de la punta de la cola.', 0.60, 8.50),
(5, 'Charmeleon', 'img/pokemons/charmeleon.png', 'fuego', 'Tiene una naturaleza agresiva. En combate, azota con su ardiente cola y ataca con sus garras.', 1.10, 19.00),
(6, 'Charizard', 'img/pokemons/charizard.png', 'fuego', 'Escupe un fuego tan caliente que funde las rocas. Causa incendios forestales sin querer.', 1.70, 90.50),
(7, 'Squirtle', 'img/pokemons/squirtle.png', 'agua', 'Cuando retrae su largo cuello en el caparazón, dispara agua a una presión increíble.', 0.50, 9.00),
(8, 'Wartortle', 'img/pokemons/wartortle.png', 'agua', 'Se lo reconoce por su cola cubierta de abundante pelaje. Vive mucho tiempo.', 1.00, 22.50),
(9, 'Blastoise', 'img/pokemons/blastoise.png', 'agua', 'Lanza chorros de agua por los cañones de su caparazón con una potencia enorme.', 1.60, 85.50),
(10, 'Caterpie', 'img/pokemons/caterpie.png', 'bicho', 'Sus cortas patas terminan en ventosas que le permiten subir por muros y pendientes.', 0.30, 2.90),
(11, 'Metapod', 'img/pokemons/metapod.png', 'bicho', 'Su cuerpo blando está protegido por una dura coraza mientras espera evolucionar.', 0.70, 9.90),
(12, 'Butterfree', 'img/pokemons/butterfree.png', 'bicho', 'Sus alas están cubiertas de polvo repelente al agua que le permite volar bajo la lluvia.', 1.10, 32.00),
(13, 'Pidgey', 'img/pokemons/pidgey.png', 'volador', 'Muy común en bosques y praderas. Aletea al nivel del suelo para levantar arena.', 0.30, 1.80),
(14, 'Pikachu', 'img/pokemons/pikachu.png', 'electrico', 'Cuando se enfada, libera la energía eléctrica que almacena en las bolsas de sus mejillas.', 0.40, 6.00),
(15, 'Raichu', 'img/pokemons/raichu.png', 'electrico', 'Su larga cola le sirve como toma de tierra para protegerse de su propia electricidad.', 0.80, 30.00),
(16, 'Sandshrew', 'img/pokemons/sandshrew.png', 'tierra', 'Le gusta vivir en lugares secos. Se enrolla para protegerse de sus enemigos.', 0.60, 12.00),
(17, 'Nidoran', 'img/pokemons/nidoran.png', 'veneno', 'Tiene grandes orejas que mueve para detectar sonidos lejanos. Sus púas contienen veneno.', 0.40, 7.00),
(18, 'Clefairy', 'img/pokemons/clefairy.png', 'hada', 'Su adorable aspecto lo hace muy popular. Se dice que aparece en noches de luna llena.', 0.60, 7.50),
(19, 'Vulpix', 'img/pokemons/vulpix.png', 'fuego', 'Al nacer tiene una sola cola blanca que se divide en seis al crecer.', 0.60, 9.90),
(20, 'Jigglypuff', 'img/pokemons/jigglypuff.png', 'normal', 'Cuando sus enormes ojos brillan, canta una melodía misteriosa que duerme a quien la escucha.', 0.50, 5.50);