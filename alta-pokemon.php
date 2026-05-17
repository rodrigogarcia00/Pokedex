<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'ADMIN') {
    header("Location: index.php");
    exit;
}

include "header.php";
?>

<main class="w3-container w3-padding-64">
    <div class="w3-content w3-card-4 w3-white w3-padding w3-round-large" style="max-width:600px">
        <h2 class="w3-center w3-text-green">Registrar Nuevo Pokémon</h2>

        <form action="procesar-alta.php" method="POST" enctype="multipart/form-data">
            <label class="w3-text-bold">Número Identificador Único</label>
            <input class="w3-input w3-border w3-margin-bottom" type="number" name="numero" required>

            <label class="w3-text-bold">Nombre</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="nombre" required>

            <label class="w3-text-bold">Tipo</label>
            <select class="w3-select w3-border w3-margin-bottom" name="tipo" required>
                <option value="" disabled selected>Seleccione un tipo</option>
                <option value="planta">Planta</option>
                <option value="fuego">Fuego</option>
                <option value="agua">Agua</option>
                <option value="bicho">Bicho</option>
                <option value="electrico">Eléctrico</option>
                <option value="tierra">Tierra</option>
                <option value="veneno">Veneno</option>
                <option value="hada">Hada</option>
                <option value="normal">Normal</option>
            </select>

            <label class="w3-text-bold">Imagen del Pokémon</label>
            <input class="w3-input w3-border w3-margin-bottom" type="file" name="imagen" accept="image/*" required>

            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half">
                    <label class="w3-text-bold">Altura (m)</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="number" step="0.01" name="altura">
                </div>
                <div class="w3-half">
                    <label class="w3-text-bold">Peso (kg)</label>
                    <input class="w3-input w3-border w3-margin-bottom" type="number" step="0.01" name="peso">
                </div>
            </div>

            <label class="w3-text-bold">Descripción</label>
            <textarea class="w3-input w3-border w3-margin-bottom" name="descripcion" rows="4" required></textarea>

            <button type="submit" class="w3-button w3-green w3-block w3-margin-top w3-round">Guardar Pokémon</button>
            <a href="index.php" class="w3-button w3-grey w3-block w3-margin-top w3-round">Cancelar</a>
        </form>
    </div>
</main>