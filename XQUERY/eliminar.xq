declare variable $id as xs:string external;
let $juego := //juego [@id = $id]

return delete node $juego
