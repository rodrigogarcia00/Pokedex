<?php
session_start();
require_once("conexion.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "No se indicó ningún Pokémon.";
    exit;
}

$sql = "SELECT * FROM pokemons WHERE id=$id";

$resultado = $conexion->query($sql);

$pokemon = $resultado->fetch_object();

include("header.php");
?>


<main class="w3-container">
    <div class="w3-content w3-card-4 w3-white w3-round-large w3-padding-large detalle-contenedor">
        <div class="w3-center w3-margin-bottom">
            <?php
            echo "<h1 class='w3-text-red'>" . $pokemon->nombre . "</h1>";
            echo "<p><strong>Número: </strong>" . $pokemon->numero . "</p>";
            echo "<img src=" . $pokemon->imagen . " alt=" . $pokemon->nombre ." class='pokemon-imagen'>";
            ?>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half">
                <?php
                echo "<p><strong>Tipo: </strong>" . $pokemon->tipo . "</p>";
                echo "<p><strong>Altura: </strong>" . $pokemon->altura . "</p>";
                echo "<p><strong>Peso: </strong>" . $pokemon->peso . "</p>";
                ?>
            </div>
            <div class="w3-half">
                <p><strong>Descripción:</strong></p>

                <div>
                    <?php echo $pokemon->descripcion; ?>
                </div>            
            </div>
        </div>
        <div class="w3-center w3-margin-top w3-margin-bottom">
            <a href="index.php" class="w3-button w3-red w3-round-large">Volver a la Pokédex</a>
        </div>
    </div>

</main>
</html>