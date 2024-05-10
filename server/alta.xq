
declare variable $nombre as xs:string external;
declare variable $precio as xs:string external;
declare variable $desarrollador as xs:string external;


declare variable $newDato := 
  <juego>
    <nombre>{$nombre}</nombre>
    <desarrollador>{$desarrollador}</desarrollador>
    <precio>{$precio}</precio>
    
  </juego>;

let $lastDato := //dato[last()]

return insert node $newDato after $lastDato