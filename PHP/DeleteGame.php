<?php
require_once('BDConexion.php');

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $rutaXq = "../XQUERY/eliminar.xq";
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
        $query->bind('$id',$_POST["id"]);
        $query->bind('$nombre', $_GET["nombre"]);
        $query->bind('$descripcion', $_GET["descripcion"]);
        $query->bind('$genero',$_GET["genero"]);
        $query->bind('$precio',$_GET["precio"]);
        
        // Ejecutar la consulta
        $result = $query->execute();
    
        // close query
        $query->close();
        // close session
        $session->close();
    
        // Show the result
        echo $result;
    
        // Lanza la xquery
        $xmlSRT = $session->execute("xquery /");
    
        $rutaXSLT = "../XSLT/detailsGame.xsl";
        $xml = new DOMDocument;
        $xml->load($rutaXSLT);
    
        $proc = new XSLTProcessor;
        $xsl = new DOMDocument;
        $xsl ->load($rutaXSLT);
        $proc->importStyleSheet($xsl);
    
    }
   
} catch(Exception $e) {
    echo $e->getMessage();
}