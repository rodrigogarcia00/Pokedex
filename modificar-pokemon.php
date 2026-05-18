<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'ADMIN') {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM pokemons WHERE id = $id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 0) {
    header("Location: index.php");
    exit;
}

$pokemon = $resultado->fetch_object();

include "header.php";
?>

<main class="w3-container w3-padding-64">
    <div class="w3-content w3-card-4 w3-white w3-padding w3-round-large" style="max-width:600px">

        <h2 class="w3-center w3-text-blue">Modificar Pokémon</h2>

        <form action="procesar-modificacion.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $pokemon->id; ?>">

            <label class="w3-text-bold">Número Identificador Único</label>
            <input 
                class="w3-input w3-border w3-margin-bottom"
                type="number"
                name="numero"
                value="<?php echo $pokemon->numero; ?>"
                required
            >

            <label class="w3-text-bold">Nombre</label>
            <input 
                class="w3-input w3-border w3-margin-bottom"
                type="text"
                name="nombre"
                value="<?php echo $pokemon->nombre; ?>"
                required
            >

            <label class="w3-text-bold">Tipo</label>
            <select class="w3-select w3-border w3-margin-bottom" name="tipo" required>

                <option value="planta" <?php if($pokemon->tipo == 'planta') echo 'selected'; ?>>
                    Planta
                </option>

                <option value="fuego" <?php if($pokemon->tipo == 'fuego') echo 'selected'; ?>>
                    Fuego
                </option>

                <option value="agua" <?php if($pokemon->tipo == 'agua') echo 'selected'; ?>>
                    Agua
                </option>

                <option value="bicho" <?php if($pokemon->tipo == 'bicho') echo 'selected'; ?>>
                    Bicho
                </option>

                <option value="electrico" <?php if($pokemon->tipo == 'electrico') echo 'selected'; ?>>
                    Eléctrico
                </option>

                <option value="tierra" <?php if($pokemon->tipo == 'tierra') echo 'selected'; ?>>
                    Tierra
                </option>

                <option value="veneno" <?php if($pokemon->tipo == 'veneno') echo 'selected'; ?>>
                    Veneno
                </option>

                <option value="hada" <?php if($pokemon->tipo == 'hada') echo 'selected'; ?>>
                    Hada
                </option>

                <option value="normal" <?php if($pokemon->tipo == 'normal') echo 'selected'; ?>>
                    Normal
                </option>

            </select>

            <label class="w3-text-bold">Imagen Actual</label>

            <div class="w3-margin-bottom">
                <img 
                    src="<?php echo $pokemon->imagen; ?>" 
                    alt="<?php echo $pokemon->nombre; ?>"
                    style="width:150px"
                    class="w3-border w3-padding"
                >
            </div>

            <label class="w3-text-bold">Nueva Imagen (opcional)</label>
            <input 
                class="w3-input w3-border w3-margin-bottom"
                type="file"
                name="imagen"
                accept="image/*"
            >

            <div class="w3-row-padding" style="margin:0 -16px">

                <div class="w3-half">
                    <label class="w3-text-bold">Altura (m)</label>

                    <input 
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        step="0.01"
                        name="altura"
                        value="<?php echo $pokemon->altura; ?>"
                    >
                </div>

                <div class="w3-half">
                    <label class="w3-text-bold">Peso (kg)</label>

                    <input 
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        step="0.01"
                        name="peso"
                        value="<?php echo $pokemon->peso; ?>"
                    >
                </div>

            </div>

            <label class="w3-text-bold">Descripción</label>

            <textarea 
                class="w3-input w3-border w3-margin-bottom"
                name="descripcion"
                rows="4"
                required
            ><?php echo $pokemon->descripcion; ?></textarea>

            <button 
                type="submit"
                class="w3-button w3-blue w3-block w3-margin-top w3-round"
            >
                Guardar Cambios
            </button>

            <a 
                href="index.php"
                class="w3-button w3-grey w3-block w3-margin-top w3-round"
            >
                Cancelar
            </a>

        </form>

    </div>
</main>

</body>
</html>