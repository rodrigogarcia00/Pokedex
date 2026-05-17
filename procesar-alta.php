<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'ADMIN') {
    header("Location: index.php");
    exit;
}

$numero = $_POST['numero'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$altura = $_POST['altura'] ?? 0;
$peso = $_POST['peso'] ?? 0;
$descripcion = $_POST['descripcion'];

$imagen_ruta = "";
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Se genera un nombre único usando "time()" para evitar colisiones si suben fotos con el mismo nombre
    $nombre_imagen = time() . "_" . $_FILES['imagen']['name'];
    $ruta_destino = "img/pokemons/" . $nombre_imagen;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
        $imagen_ruta = $ruta_destino;
    }
}

// Hay que validar que el número identificador cargado a mano no esté repetido (es UNIQUE en la BD)
$check_sql = "SELECT id FROM pokemons WHERE numero = '$numero'";
$check_res = $conexion->query($check_sql);

if ($check_res && $check_res->num_rows > 0) {
    echo "Error: El número de Pokémon ya se encuentra registrado.)";
    exit;
}

$sql = "INSERT INTO pokemons (numero, nombre, imagen, tipo, descripcion, altura, peso) 
        VALUES ('$numero', '$nombre', '$imagen_ruta', '$tipo', '$descripcion', '$altura', '$peso')";

if ($conexion->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error al guardar el registro: " . $conexion->error;
}