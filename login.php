<?php
session_start();
require_once "conexion.php";

$usuario_ingresado = $_POST['usuario'];
$contrasenia_ingresada = $_POST['contrasenia'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario_ingresado' AND contrasenia = '$contrasenia_ingresada'";

$resultado = $conexion->query($sql);

if ($usuario_db = $resultado->fetch_object()) {
    $_SESSION['usuario'] = $usuario_db->usuario;
    $_SESSION['nombre'] = $usuario_db->nombre;
    $_SESSION['rol'] = $usuario_db->rol;

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php?error=login");
    exit;
}

?>