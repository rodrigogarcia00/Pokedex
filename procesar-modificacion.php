<?php

session_start();
require_once "conexion.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'ADMIN') {
    header("Location: index.php");
    exit;
}
// DATOS DEL FORM
$id = $_POST['id'];
$numero = $_POST['numero'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$descripcion = $_POST['descripcion'];

// BUSCAR IMAGEN ACTUAL
$sql = "SELECT imagen FROM pokemons WHERE id = $id";
$resultado = $conexion->query($sql);
$pokemon = $resultado->fetch_object();

$imagen = $pokemon->imagen;
// SI SUBIERON NUEVA IMAGEN
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDestino = "img/pokemons/" . $nombreArchivo;
    if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        $imagen = $rutaDestino;
    }
}
// UPDATE
$sql = "UPDATE pokemons SET
            numero = '$numero',
            nombre = '$nombre',
            tipo = '$tipo',
            imagen = '$imagen',
            descripcion = '$descripcion',
            altura = '$altura',
            peso = '$peso'
        WHERE id = $id";

// EJECUTAR UPDATE
if ($conexion->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error al modificar: " . $conexion->error;
}
?>