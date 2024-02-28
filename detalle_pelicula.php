<?php
$id;
if(isset($_POST['id'])) $id = $_POST['id'];
else $id = $_GET['id'];

include 'manejo_conexiones.php';
include 'queries/detalle_pelicula_queries.php';

$conn = conectar();
$film = mysqli_fetch_assoc($conn->query($q1));

if (!$film) {
    header("Location: 404.php");
    exit();
}

$categories = $conn->query($q4);
$languages = $conn->query($q2);
$actors = $conn->query($q3);

desconectar($conn);
?>

<!doctype html>
<html>
    <?php 
        $title = $film['titulo'];
        $styles = 'styles/detalle_pelicula.css';
        include 'components/Head.php';
    ?>
    <body>
        <section>
            <div>
                <h1><?php echo "#" . $film['idPelicula']; ?></h1>
                <h1><?php echo strtolower($film['titulo']) . " (" . $film['anio'] . ")" ?></h1>
            </div>
            <?php if ($categories->num_rows) {
                        while ($row = $categories->fetch_array()) {
                            echo "<span>" . ($row['categoria']);
                        }
                } ?>
            <?php if ($languages->num_rows) {
                    echo " | Idiomas disponibles: </span>";
                    while ($row = $languages->fetch_array()) {
                        echo "<span>" . ($row['idioma']) . "</span>";
                    }
                } else {
                    echo "</span>";
                } ?><br/><br/><br/>
            <div>
                <?php if ($actors->num_rows) {
                        echo "<div class='actors-container'>";
                        echo "<h4>Reparto</h4><br/>";
                            while ($row = $actors->fetch_array()) {
                                echo "<span>" . strtolower($row['nombre']) . 
                                " " . strtolower($row['apellido']) . "</span>";
                            }
                        echo "</div>";
                    } ?>
                <div>
                    <p><?php echo $film['descripcion'] ?></p><br/>
                    <form method='POST' action='eliminar_pelicula.php'>
                    <input type='hidden' name='id' value='<?php echo $id ?>' />
                    <input type='hidden' name='name' value='<?php echo $film['titulo'] ?>' />
                        <button type='submit' id="red-btn">
                            Eliminar película
                        </button>
                    </form>
                    <a href="index.php">Volver</a>
                </div>
            </div>
        </section>
        <?php include "components/Footer.php"; ?>
    </body>
</html>