<?php
$id = $_POST['id'];
$name = $_POST['name'];

if(!isset($id)) {
    header("Location: peliculas.php");
    exit();
}

include 'manejo_conexiones.php';
include 'queries/eliminar_pelicula_queries.php';

$conn = conectar();
$result = $conn->query($q1);

desconectar($conn);
?>

<!doctype html>
<html>
    <?php 
        $title = 'Película eliminada';
        $styles = 'styles/eliminar_pelicula.css';
        include 'components/Head.php';
    ?>
    <body>
        <section>
            <h1><?php echo strtolower($name) ?></h1>
            <h1>se eliminó con éxito <br/> (˵´•‿•`˵ ⑅)</h1>
            <br/><br/><a class=".btn" href="index.php">Volver</a>
        </section>
    </body>
</html>