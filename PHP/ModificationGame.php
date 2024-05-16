<?php
require_once('BDConexion.php');

try {
    $rutaXq = "../XQUERY/modification.xq";
    // Abrimos el fichero $rutaXq en modo lectura "r"
    $fichero = fopen($rutaXq, "r"); 
    // Leemos el contenido del fichero y lo guardamos en la variable $xq
    $xq = fread($fichero, filesize($rutaXq));
    // Cerramos el fichero
    fclose($fichero);
    
    // Crear sesion
    $session = new Session();    
    // Abrir y el nombre de la base de datos en el servidor BaseX
    $session->execute("open tienda"); 
    // xquery
    $query = $session->query($xq);
    $query->bind('$codigoJuego',$_GET["codigoJuego"]);
    $query->bind('$nombre', $_GET["nombre"]);
    $query->bind('$descripcion', $_GET["descripcion"]);
    $query->bind('$genero',$_GET["genero"]);
    $query->bind('$precio',$_GET["precio"]);
    $query->bind('$tipo',$_GET["tipo"]);
    $query->bind('$categoria',$_GET["categoria"]);

    echo 'Valor seleccionado: '.$_GET["codigoJuego"].' '.$_GET["nombre"].' '.$_GET["descripcion"].' '.$_GET["genero"].' '.$_GET["precio"].'<br>';


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