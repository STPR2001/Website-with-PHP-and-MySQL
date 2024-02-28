<?php http_response_code(404); ?>

<!DOCTYPE html>
<html>
    <?php 
        $title = '404';
        include 'components/Head.php';
    ?>
    <body>
        <section>
            <h1>No se encontró la página que estabas buscando (◡︵◡)</h1>
            <?php include "components/Footer.php"; ?>
        </section>
    </body>
</html>