<?php
include "../services/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $imgpath = "../img/" . $_REQUEST['img'];
    $nombre = $_REQUEST['nombre'];
    $id_region = $_REQUEST['region'];
    $error = false;

    // Obtener el contador para id_pokemon
    $sql = "SELECT COUNT(id) + 1 AS contador_resultados FROM pokemons";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $resultado = mysqli_fetch_assoc($result);
        $contador_id = $resultado['contador_resultados'];

// Insertar Pokémon
        $query1 = "INSERT INTO pokemons(id, nombre, id_region, img) VALUES (?, ?, ?, ?)";
        $sentencia1 = mysqli_prepare($conn, $query1);

        if ($sentencia1) {
            mysqli_stmt_bind_param($sentencia1, "isis", $contador_id, $nombre, $id_region, $imgpath);

            if (!mysqli_stmt_execute($sentencia1)) {
                $error = true;
            }
            mysqli_stmt_close($sentencia1);
        }else{
            $error = true;
        }
    }else{
        $error = true;
    }

// Manejo de errores y redirección
    if ($error) {
        header("Location:../view/vista_crear_pokemon.php?error=1");
    }else{
        header("Location:../view/vista_crear_pokemon.php");
    }
}else{
    header("Location:../view/vista_crear_pokemon.php?error=1");
}

// Cerrar conexión
mysqli_close($conn);
?>

?>