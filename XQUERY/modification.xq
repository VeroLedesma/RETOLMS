declare variable $codigoJuego as xs:string external;
declare variable $nombre as xs:string external;
declare variable $descripcion as xs:string external;
declare variable $genero as xs:string external;
declare variable $precio as xs:string external;
declare variable $tipo as xs:string external;
declare variable $categoria as xs:string external;
declare variable $publicado as xs:string external;

let $id := //juego[@id = $codigoJuego]/@id

return (
    replace value of node
    /tienda/juegos/juego[@id=$id]/nombre
    with $nombre,
    replace value of node
    /tienda/juegos/juego[@id=$id]/descripcion
    with $descripcion,
    replace value of node
    /tienda/juegos/juego[@id=$id]/genero
    with $genero,
    replace value of node
    /tienda/juegos/juego[@id=$id]/precio
    with $precio,
    replace value of node
    /tienda/juegos/juego[@id=$id]/tipo
    with $tipo,
    replace value of node
    /tienda/juegos/juego[@id=$id]/categoria
    with $categoria,
    replace value of node
    /tienda/juegos/juego[@id=$id]/@publicado
    with $publicado
)