declare variable $nombre as xs:string external;
declare variable $categoria as xs:string external;
declare variable $precio as xs:double external;
declare variable $desarrolladores as xs:string external;
declare variable $web as xs:string external;
declare variable $foto as xs:string external;
declare variable $plataformas as xs:string external;
declare variable $genero as xs:string external;
declare variable $idiomas as xs:string external;
declare variable $clasificacion as xs:string external;
declare variable $version as xs:string external;

declare variable $newJuego := 
    <juego>
        <nombre>{$nombre}</nombre>
        <categoria>{$categoria}</categoria>
        <genero>{$genero}</genero>
        <precio>{$precio}</precio>
        <desarrollador>{$desarrolladores}</desarrollador>
        <web>{$web}</web>
        <imagen>{$foto}</imagen>
        <plataforma>{$plataformas}</plataforma>
        <idiomas><idioma>{$idiomas}</idioma>
        <clasificacion>{$edad}</clasificacion>
        <version>{$version}</version>
    </juego>;

let $lastJuego := //juego[last()]

return insert node $newJuego after $lastJuego