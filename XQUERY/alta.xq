declare variable $codigoJuego as xs:string external;
declare variable $nombre as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $genero as xs:string external;
declare variable $precio as xs:string external;

insert node
    <juego id="{$codigoJuego}">
        <nombre>{$nombre}</nombre>
        <descripcion>{$descripcion}</descripcion>
        <genero>{$genero}</genero>
        <precio>{$precio}</precio>
    </juego>
into 
    //juegos