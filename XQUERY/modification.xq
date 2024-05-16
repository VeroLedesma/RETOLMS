<<<<<<< HEAD
declare variable $views as xs:string external;
declare variable $movies as xs:string external;
declare variable $rating as xs:string external;

let $id := //film[title = movies]/@id

return (
    replace value of node
    /films/film[@id=$id]/ratings
    with $rating,
    replace value of node
    /films/film[@id=$id]/views
    with $views
)
=======
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
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
