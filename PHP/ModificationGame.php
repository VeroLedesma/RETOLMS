<?php
require_once('BDConexion.php');

try {
    $rutaXq = "prueba.xq";
    // Abrimos el fichero $rutaXq en modo lectura "r"
    $fichero = fopen($rutaXq, "r"); 
    // Leemos el contenido del fichero y lo guardamos en la variable $xq
    $xq = fread($fichero, filesize($rutaXq));
    // Cerramos el fichero
    fclose($fichero);
    
    // Crear sesion
    $session = new Session();    
    // Abrir y el nombre de la base de datos en el servidor BaseX
    $session->execute("open universidad"); 
    // xquery
    $query = $session->query($xq);
    $query->bind('$views', $_GET["views"]);
    $query->bind('$movies', $_GET["movies"]);
    $query->bind('$rating', $_GET["rating"]);

    // Ejecutar la consulta
    $result = $query->execute();

    // Lanza la xquery
    $xmlSRT = $session->execute("xquery /");

    $rutaXSLT = "";
    $xml = new DOMDocument;
    $xml->load($rutaXSLT);

    $proc = new XSLTProcessor;
    $proc->importStyleSheet($xsl);

    echo $proc->transformToXML($xml);

    // Close any database query if applicable
    $query->close();

    $session->close();

    header("Location: ");
    exit();
} catch(Exception $e) {
    $output = "Error: " . $e->getMessage();
    echo $output;
}