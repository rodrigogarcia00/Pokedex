<?php
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header class="w3-row w3-padding header-pokedex">
        <div class="w3-col l3 m3 s12 logo">
            Logo
        </div>
        <div class="w3-col l6 m6 s12 titulo">
            <h1>Pokédex</h1>
        </div>
        <div class="w3-col l3 m3 s12 login">
            <form>
                <input class="w3-input w3-border" type="text" placeholder="Usuario">
                <input class="w3-input w3-border" type="password" placeholder="Password">
                <input class="w3-button w3-border" type="submit" value="Ingresar"></input>
            </form>
        </div>
    </header>
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
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>