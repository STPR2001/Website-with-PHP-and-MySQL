<?php
$limit = $_GET['limit'] ?? 50;
$offset = $_GET['offset'] ?? 0;

include 'queries/actores_queries.php';
include 'manejo_conexiones.php';

$title = 'Actores';
$conn = conectar();
$result = $conn->query($q7);
$pagesCount = mysqli_fetch_assoc($conn->query($q8))['cant'];
$pages = round($pagesCount / 50);

if (!$result) {
    header("Location: 404.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<?php include 'components/Head.php' ?>
<body>
    <section>
        <h1>Lista de actores</h1>

        <?php 
        $href = 'actores.php';
        include 'components/Pagination.php';

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>NOMBRE</th><th>APELLIDO</th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    $id = $row["idActor"];
                    $nombre = $row["nombre"];
                    $apellido = $row["apellido"];
                    
                    echo "<tr>";
                    echo "<td>" . $row["idActor"] . "</td>";
                    echo "<td>" . strtolower($row["nombre"]) . "</td>";
                    echo "<td>" . strtolower($row["apellido"]) . "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";


            } else {
                echo "No se encontraron actores en la base de datos.";
            }

        desconectar($conn);
        ?>
        <br/><br/>
        <a class="btn" href="index.php">Volver a la página principal</a> 
        <a class="btn" href="agregar_actor.php">Agregar actor</a> 
        <br>
    </section>
    <?php include "components/Footer.php"; ?>
</body>
</html>







