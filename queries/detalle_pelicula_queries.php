<?php 
    $q1 = "
    SELECT idPelicula, titulo, descripcion, anio
    FROM peliculas WHERE idPelicula = $id";

    $q2 = "
    SELECT I.idioma FROM idiomas AS I WHERE I.idIdioma IN (
    SELECT IP.idPelicula FROM idiomasDePeliculas AS IP
    WHERE idPelicula = $id
    )";

    $q3 = "
    SELECT * FROM actores AS A WHERE A.idActor IN (
    SELECT AP.idActor FROM actoresDePeliculas AS AP
    WHERE AP.idPelicula = $id
    )";

    $q4 = "
    SELECT * FROM categorias AS C WHERE C.idCategoria IN (
    SELECT CP.idCategoria FROM categoriasDePeliculas AS CP
    WHERE CP.idPelicula = $id
    )";
?>