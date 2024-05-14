declare variable $id as xs:string external;
declare variable $nombre as xs:string external;
declare variable $categoria as xs:string external;
declare variable $precio as xs:double external;
declare variable $desarrolladores as xs:string external;
declare variable $web as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $foto as xs:string external;
declare variable $plataformas as xs:string external;
declare variable $genero as xs:string external;
declare variable $idiomas as xs:string external;
declare variable $clasificacion as xs:string external;
declare variable $version as xs:string external;

declare variable $newJuego := 
    <juego id="{$id}">
        <nombre>{$nombre}</nombre>
        <categoria>{$categoria}</categoria>
        <genero>{$genero}</genero>
        <precio>{$precio}</precio>
        <desarrollador>{$desarrolladores}</desarrollador>
        <web>{$web}</web>
        <descripcion>{$descripcion}</descripcion>
        <imagen>{$foto}</imagen>
        <plataforma>{$plataformas}</plataforma>
        <idioma>{$idiomas}</idioma>
        <clasificacion>{$clasificacion}</clasificacion>
        <version>{$version}</version>
    </juego>;

let $lastJuego := //juego[last()]

return insert node $newJuego after $lastJuego