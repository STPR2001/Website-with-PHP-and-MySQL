<?php
    $q7 = "
    SELECT idActor, nombre, apellido FROM actores
    LIMIT $limit OFFSET $offset";
  
    $q8 = "
    SELECT count(idActor) as cant FROM actores";
?>