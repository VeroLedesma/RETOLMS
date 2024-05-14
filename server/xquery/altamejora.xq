declare variable $id as xs:string external;
declare variable $nombre as xs:string external;
declare variable $precio as xs:double external;
declare variable $web as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $genero as xs:string external;
declare variable $clasificacion as xs:string external;
declare variable $desarrollador as xs:string external;
declare variable $imagen as xs:string external;
declare variable $plataforma as xs:string external;

declare variable $newJuego := 
    <juego id="{$id}">
        <nombre>{$nombre}</nombre>
        <descripcion>{$descripcion}</descripcion>
        <genero>{$genero}</genero>
        <precio>{$precio}</precio>
        <desarrollador>{$desarrollador}</desarrollador>
        <web>{$web}</web>
        <imagen>{$imagen}</imagen>
        <plataforma>{$plataforma}</plataforma>
        <clasificacion>{$clasificacion}</clasificacion>
    </juego>;

let $lastJuego := //juego[last()]

return insert node $newJuego after $lastJuego