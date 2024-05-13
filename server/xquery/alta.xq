declare variable $nombre as xs:string external;
declare variable $category as xs:string external;
declare variable $precio as xs:string external;
declare variable $developers as xs:string external;
declare variable $website as xs:string external;
declare variable $foto as xs:string external;
declare variable $platforms as xs:string external;

declare variable $newJuego := 
    <juego>
        <nombre>{$nombre}</nombre>
        <category>{$category}</category>
        <precio>{$precio}</precio>
        <developers>{$developers}</developers>
        <website>{$website}</website>
        <foto>{$foto}</foto>
        <platforms>{$platforms}</platforms>
    </juego>;

let $lastJuego := //juego[last()]

return insert node $newJuego after $lastJuego