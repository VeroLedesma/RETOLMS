declare variable $codigoJuego as xs:string external;
declare variable $nombre as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $genero as xs:string external;
declare variable $precio as xs:string external;
declare variable $tipo as xs:string external;
<<<<<<< HEAD
=======
declare variable $categoria as xs:string external;
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
declare variable $publicado as xs:string external;

insert node
    <juego id="{$codigoJuego}" publicado="{$publicado}">
        <nombre>{$nombre}</nombre>
        <descripcion>{$descripcion}</descripcion>
        <genero>{$genero}</genero>
        <precio>{$precio}</precio>
        <tipo>{$tipo}</tipo>
<<<<<<< HEAD
=======
        <categoria>{$categoria}</categoria>
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
    </juego>
into 
    //juegos