<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'ADMIN') {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'] ?? null;

if ($id) {
    $sql_img = "SELECT imagen FROM pokemons WHERE id = $id";
    $res_img = $conexion->query($sql_img);
    if ($pokemon = $res_img->fetch_object()) {
        if (file_exists($pokemon->imagen)) {
            unlink($pokemon->imagen);
        }
    }

    $sql = "DELETE FROM pokemons WHERE id = $id";
    $conexion->query($sql);
}

//salimos
header("Location: index.php");
exit;