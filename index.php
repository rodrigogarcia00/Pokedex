<?php
session_start();
require_once "conexion.php";

$busqueda = "";
$mensaje = "";
$pokemons = [];

if (isset($_GET["busqueda"])) {
    $busqueda = $_GET["busqueda"];
}

if ($busqueda != "") {
    $sql = "SELECT * FROM pokemons WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR numero = '$busqueda'";  
} else {
    $sql = "SELECT * FROM pokemons ORDER BY numero";
}

$resultado = $conexion->query($sql);

while ($pokemon = $resultado->fetch_object()) {
    $pokemons[] = $pokemon;
}

if ($busqueda != "" && empty($pokemons)) {
    $mensaje = "Pokemon no encontrado";

    $sql = "SELECT * FROM pokemons ORDER BY numero";
    $resultado = $conexion->query($sql);

    while ($pokemon = $resultado->fetch_object()) {
        $pokemons[] = $pokemon;
    }
}

include("header.php");
?>

    <main class="w3-container contenedor-principal">
        <section class="w3-margin-top buscador">
            <form method="GET" action="index.php" class="form-buscador">
                <input class="w3-input w3-border input-busqueda" type="text" name="busqueda" placeholder="Ingrese el nombre, tipo o número de Pokémon" value="<?php echo $busqueda; ?>">
                <button class="w3-button w3-border boton-busqueda" type="submit"> ¿Quién es este Pokémon? </button>
            </form>
        </section>

        <?php 
            if ($mensaje != "") {
            echo "<p class='w3-center mensaje-error'>" . $mensaje . "</p>";
            } 
        ?>

        <section class="w3-margin-top tabla-contenedor">
            <table class="w3-table-all w3-centered tabla-pokemons">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Número</th>
                        <th>Nombre</th>
                        <th>Detalle</th>
                        <?php 
                        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'ADMIN') { 
                        echo "<th>Acciones Admin</th>";
                        }
                        ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($pokemons as $pokemon) {
                        echo "<tr>";
                            echo "<td> <img class='imagen-pokemon' src='" . $pokemon->imagen . "' alt='" . $pokemon->nombre . "'> </td>";
                            echo "<td> <img class='imagen-tipo' src='img/tipos/" . $pokemon->tipo . ".png' alt='" . $pokemon->tipo . "'> </td>";
                            echo "<td>" . $pokemon->numero . "</td>";
                            echo "<td class='w3-bold'>" . $pokemon->nombre . "</td>";
                            echo "<td> <a class='w3-button w3-border' href='detalle-pokemon.php?id=" . $pokemon->id . "'> Ver detalle </a> </td>";
                            if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'ADMIN') {
                            echo "<td>";
                            echo "<a class='w3-button w3-blue w3-margin-right' href='modificar-pokemon.php?id=" . $pokemon->id . "'>Modificación</a>";
                            echo "<a class='w3-button w3-red' href='baja-pokemon.php?id=" . $pokemon->id . "'>Baja</a>";
                            echo "</td>";
                            }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'ADMIN'): ?>
                <div class="w3-center w3-margin-top w3-margin-bottom">
                    <a href="alta-pokemon.php" class="w3-button w3-green w3-block">Nuevo pokemon</a>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>