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