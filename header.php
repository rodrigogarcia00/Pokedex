<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/detalle-pokemon.css">
</head>
<body>
    <header class="w3-row w3-padding header-pokedex">
        <div class="w3-col l3 m3 s12">
            <img src="img/logo-pokedex.png" alt="logo-pokedex" class="logo">
        </div>
        <div class="w3-col l6 m6 s12 titulo">
            <h1>Pokédex</h1>
        </div>
        <div class="w3-col l3 m3 s12 login">
            <?php if (isset($_SESSION['usuario'])) { ?>
                <div class="w3-right">
                    <?php
                    echo "<span>Usuario " . $_SESSION['rol'] . " " . $_SESSION['nombre'] . "</span>";
                    ?>
                    <a href="logout.php" class="w3-button w3-border w3-red w3-small w3-margin-left">Salir</a>
                </div>
            <?php } else { ?>
                <form action="login.php" method="POST">
                    <input class="w3-input w3-border" type="text" name="usuario" placeholder="Usuario" required>
                    <input class="w3-input w3-border" type="password" name="contrasenia" placeholder="Password" required>
                    <input class="w3-button w3-border" type="submit" value="Ingresar"></input>
                </form>
                <?php if (isset($_GET["error"]) && $_GET["error"] == "login") { ?>
                <div class="w3-red w3-center w3-padding-small w3-panel">
                    Usuario o contraseña inválidos
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </header>