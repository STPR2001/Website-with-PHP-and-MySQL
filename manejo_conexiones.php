<?php
function conectar() {
    // usuario_videoclub
    $db_user = "usuario_videoclub";
    // Djd5cQzB
    $db_pw = "Djd5cQzB";
    $db_host = "localhost";
    $db_name = "videoclub";

    $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    if (!$conn) {
        die("Error conectando la base de datos");
    } else return $conn;
}

function desconectar($conn) {
    mysqli_close($conn);
}
?>
