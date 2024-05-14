<?php
require_once("BDConexion.php");

try {
    // Lectura del archivo XQuery
    $rutaXq = "../XQUERY/alta.xq";
    $fichero = fopen($rutaXq, "r");
    $xq = fread($fichero, filesize($rutaXq));
    fclose($fichero);

    // Creación de sesión
    $session = new Session();    
    // Apertura de base de datos
    $session->execute("open tienda");

    // XQuery
    $query = $session->query($xq);

    // Asignar valores de variables externas
    if(isset($_GET['codigoJuego']) && isset($_GET['nombre']) && isset($_GET['descripcion']) && isset($_GET['genero']) && isset($_GET['precio'])){

        $query->bind('$codigoJuego',$_GET["codigoJuego"]);
        $query->bind('$nombre', $_GET["nombre"]);
        $query->bind('$descripcion', $_GET["descripcion"]);
        $query->bind('$genero',$_GET["genero"]);
        $query->bind('$precio',$_GET["precio"]);

        // Ejecutar la consulta
        $result = $query->execute();

        // Cerrar consulta y sesión
        $query->close();
        $session->close();

        // Mostrar el resultado
        echo $result;
       
    }
    
} catch(Exception $e) {
    echo $e->getMessage();
}
header( "Location: ../HTML/addGames.html?resultado=OK" ); 
?>