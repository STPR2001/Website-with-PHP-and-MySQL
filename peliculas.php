<?php
$limit = $_GET['limit'] ?? 50;
$offset = $_GET['offset'] ?? 0;

include 'queries/peliculas_queries.php';
include 'manejo_conexiones.php';

$title = 'Películas';
$conn = conectar();
$result = $conn->query($q5);
$pagesCount = mysqli_fetch_assoc($conn->query($q6))['cant'];
$pages = round($pagesCount / 50);

if (!$result) {
    header("Location: 404.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <?php
        $styles = 'styles/peliculas.css'; 
        include 'components/Head.php'; 
    ?>
    <body>
        <section>
            <h1>Lista de películas</h1>

            <form method="POST" action="detalle_pelicula.php">
                <label for="idPelicula">Buscar por ID: &nbsp;</label>
                <input type="text" id="idPelicula" name="id" 
                placeholder="Id de la pelicula">
                <input id="submit" type="submit" value="Buscar">
            </form><br/>

            <?php
                $href = 'peliculas.php';
                include 'components/Pagination.php';

                if (isset($_GET['idPelicula'])) {
                    $idPelicula = $_GET['idPelicula'];

                    $q6 = "SELECT idPelicula, titulo FROM nombre_de_la_tabla WHERE idPelicula = '$idPelicula'";
                    $result = $conn->query($q6);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>ID Película</th><th>Título</th></tr>";
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["idPelicula"] . "</td>";
                            echo "<td>" . strtolower($row["titulo"]) . "</td>";
                            echo "</tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "No se encontraron películas con el ID proporcionado.";
                    }
                } else {
                    $sql = "SELECT idPelicula, titulo FROM nombre_de_la_tabla";
                    $result = $conn->query($q5);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>ID Película</th><th>Título</th></tr>";
                        
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["idPelicula"];
                            $titulo = strtolower($row["titulo"]);
                            
                            echo "<tr>";
                            echo "<td>".$row["idPelicula"]."</td>";
                            echo "<td> <a href='detalle_pelicula.php?id="
                            . $id . "'>" . $titulo . "</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No se encontraron películas en la base de datos.";
                    }
                }
                desconectar($conn);
            ?>
            <br/><br/>
            <a class="btn" href="index.php">
                Volver a la página principal
            </a>
            <?php include "components/Footer.php"; ?>
        </section>
    </body>
</html>







