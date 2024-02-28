<?php
include 'manejo_conexiones.php';
$conn = conectar();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Actor</title>
    <?php 
        include 'components/Head.php';
    ?>
</head>
<body>
    <section>
    <h2>Agregar Actor</h2>
    <form method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required><br><br>
        
        <input type="submit" name="Agregar">
    </form>

    <a class="btn" href="index.php">Volver a la página principal</a> 
</section>
    <?php include "components/Footer.php"; ?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    $sql = "INSERT INTO actores (nombre, apellido) VALUES ('$nombre', '$apellido')";

    if ($conn->query($sql) === TRUE) {
        echo "El actor se ha agregado correctamente.";
        header("Location: actores.php");
    } else {
        echo "Error al agregar el actor: " . $conn->error;
    }
}
desconectar($conn);
?>