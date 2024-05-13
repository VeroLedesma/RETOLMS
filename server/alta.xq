declare variable $nombre as xs:string external;
declare variable $precio as xs:string external;
declare variable $desarrollador as xs:string external;
declare variable $web as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $imagen as xs:string external;
declare variable $plataformas as xs:string external;
declare variable $idiomas as xs:string external;
declare variable $clasificacion as xs:string external;
declare variable $versiones as xs:string external;

declare variable $newJuego := 
  <juego>
    <nombre>{$nombre}</nombre>
    <precio>{$precio}</precio>
    <desarrollador>{$desarrollador}</desarrollador>
    <web>{$web}</web>
    <descripcion>{$descripcion}</descripcion>
    <imagen>{$imagen}</imagen>
    <plataformas>{$plataformas}</plataformas>
    <idiomas>{$idiomas}</idiomas>
    <clasificación>{$clasificacion}</clasificación>
    <versiones>{$versiones}</versiones>
  </juego>;

let $lastJuego := //juego[last()]

return insert node $newJuego after $lastJuego
