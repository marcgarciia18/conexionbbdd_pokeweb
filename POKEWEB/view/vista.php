<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vista.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once '../services/connection.php';
    session_start();
    $usuario = $_SESSION['usuario'];
    if(strcasecmp($usuario, "Blanche") == 0 || strcasecmp($usuario, "Blanche") == 0) {
        echo "<br/><br/>";
        echo "<div class='one-column'><a href='vista_crear_pokemon.php?'class='btncrear'>+</a></div>";
    }   
    ?>
        <div class="logo-btn-out">
            <img src="../img/pokedex_logo.png" alt="">
            <a href="../index.php" class="logo-btn-out">Cerrar Sesión</a>
        </div>
    <div class="container">
        <?php
            include "../services/connection.php";
            $query = "SELECT * FROM pokemons";
            $result = mysqli_query($conn, $query);
            $listaPokemons = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($listaPokemons as $pokemon) {
                echo "<div class='three-column'>
                <h1>{$pokemon['nombre']}</h1>
                <h4>{$pokemon['id_region']}</h4>
                <img src='{$pokemon['img']}' alt='{$pokemon['nombre']}'>
                </div>";
            }
            ?>
    </div>  
</body>
</html>