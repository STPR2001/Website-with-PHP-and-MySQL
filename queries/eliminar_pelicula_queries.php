<?php 
    $q1 = "
    DELETE FROM peliculas WHERE idPelicula = $id";

    /* 
    MODIFICAR ESQUEMA:
    
    ALTER TABLE pagos DROP CONSTRAINT alquiler_fkey 
    ADD CONSTRINT peliculaALquilo FOREIGN KEY(idPeliculaAlquilo) 
    REFERENCES peliculas(idPelicula) ON DELETE CASCADE;

    ALTER TABLE actoresDePeliculas DROP CONSTRAINT actor_de_pelicula_pelicula_id_fkey 
    ADD CONSTRINT peliculaALquilo FOREIGN KEY(idPelicula) 
    REFERENCES peliculas(idPelicula) ON DELETE CASCADE;

    ALTER TABLE inventario ADD CONSTRAINT inventarioPelicula 
    FOREIGN KEY(idPelicula) REFERENCES peliculas(idPelicula) ON DELETE CASCADE;

    ALTER TABLE idiomasDePeliculas ADD CONSTRAINT idiomaPelicula 
    FOREIGN KEY(idPelicula) REFERENCES peliculas(idPelicula) ON DELETE CASCADE;
    
    ALTER TABLE categoriasDePeliculas ADD CONSTRAINT categoriaPelicula 
    FOREIGN KEY(idPelicula) REFERENCES peliculas(idPelicula) ON DELETE CASCADE;

    ALTER TABLE alquileres ADD CONSTRAINT alquilerPelicula 
    FOREIGN KEY(idPelicula) REFERENCES peliculas(idPelicula) ON DELETE CASCADE;
    */ 
?>