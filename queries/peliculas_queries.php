<?php
    $q5 = "
    SELECT idPelicula, titulo FROM peliculas
    LIMIT $limit OFFSET $offset";

    $q6 = "
    SELECT count(idPelicula) as cant FROM peliculas";
?>