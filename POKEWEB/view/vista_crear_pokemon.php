<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/crear_pokemon.css">
    <title>Crear pokemon</title>
</head>
<body>
<?php 
include "../services/connection.php";
?>
<br><br>
<form action="./insert_pokemon.php" method="post" class="form">
    <div class="caja_form">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="">
    </div>
    <div class="caja_form">
        <label for="region" id="region">Region:</label>
        <select name="region" id="region">
         <option disabled selected>Escoge una region</option>
            <?php
            $sql = "SELECT id, nombre_region FROM regiones";
            $result = mysqli_query($conn, $sql);
            $listaRegiones = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($listaRegiones as $region) {
                echo "<option value='{$region['id']}'>{$region['nombre_region']}</option>";
            }
            ?>
        </select>

    </div>
    <div class="caja_form">
        <label for="file">Imagen:</label>
        <input type="text" name="img" id="">
    </div>
    <input type="submit" value="Insertar">
</form>

<div class="logo-btn-out">
            <img src="../img/pokedex_logo.png" alt="">
            <a href="../index.php" class="logo-btn-out">Atras</a>
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
                <h4>{$pokemon['id']}</h4>
                <img src='{$pokemon['img']}' alt='{$pokemon['nombre']}'>
                </div>";
            }
            ?>
    </div>

</body>
</html>