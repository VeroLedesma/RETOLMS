declare variable $id as xs:string external;

let $archivo_xml := doc("./XML/tienda.xml")

let $juego := $archivo_xml//juego[@id = $id]

return (
    delete node $juego
)