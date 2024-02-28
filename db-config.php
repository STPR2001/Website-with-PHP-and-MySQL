<?php
$db_user = "usuario_videoclub";
$db_password = "Djd5cQzB";
$db_host = "localhost";
$db_name = "videoclub";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Error conectando la base de datos");
}
;
