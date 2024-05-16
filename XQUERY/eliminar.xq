declare variable $id as xs:string external;

<<<<<<< HEAD
let $archivo_xml := doc("./XML/tienda.xml")
=======
let $archivo_xml := doc("tienda.xml")
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21

let $juego := $archivo_xml//juego[@id = $id]

return (
    delete node $juego
<<<<<<< HEAD
)
=======
)
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
