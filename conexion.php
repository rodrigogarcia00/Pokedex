<?php

$host = "localhost";
$usuario = "root";
$contrasenia = "";
$baseDeDatos = "pokedex_db";

$conexion = mysqli_connect($host, $usuario, $contrasenia, $baseDeDatos);

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
