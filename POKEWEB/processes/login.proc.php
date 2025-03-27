<?php
include '../services/config.php';
include '../services/connection.php';

if (isset($_POST['usuario']) && isset ($_POST['pass'])){
   session_start();
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM entrenadores WHERE usuario = '$usuario' AND pass = MD5('{$pass}')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['usuario'] = $usuario;
        header ("location:../view/vista.php?usuario=$usuario");
    } else {
        header ("location:../view/login.html");
    }
}
?>