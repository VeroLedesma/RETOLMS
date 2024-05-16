<?php 

require_once("BDConexion.php");

try {
    $genero = $_GET['genero'];

    $rutaXq = "../XML/BaseDeDatos.xq";
    $fichero = fopen($rutaXq, "r"); // Abrimos el fichero $rutaXq en modo lectura "r"
    $xq = fread($fichero, filesize($rutaXq)); // Leemos el contenido del fichero y lo guardamos en la variable $xq
    fclose($fichero); // Cerramos el fichero
    
    // create session
    $session = new Session();    
    // open database
    $session->execute("open tienda"); // open y el nombre de la base de datos en el servidor BaseX
    // xquery
    $query = $session->query($xq);

    // execute result
    $result = $query->execute();

    // guardando el resultado de la query en el archivo resultado.xml
    $myfile = fopen("../XML/resultado.xml", "w") or die("Unable to open file!");
    fwrite($myfile, $result);
    fclose($myfile);

    // close query
    $query->close();
    // close session
    $session->close();

    // Show the result
    $xml = new DOMDocument;

    $xml->load('../XML/resultado.xml');

    // Filtra los juegos por género
    if ($genero != 'all') {
        $xpath = new DOMXPath($xml);
        foreach ($xpath->query("/tienda/juegos/juego[genero!='$genero']") as $node) {
            $node->parentNode->removeChild($node);
        }
    }

    $xsl = new DOMDocument;

    $xsl->load('../XSLT/listaJuegos.xsl');

    $proc = new XSLTProcessor;

    $proc->importStyleSheet($xsl);

    $proc->setParameter('', 'genero', $genero);

    echo $proc->transformToXML($xml);

} catch(Exception $e) {
    echo $e->getMessage();
}

?> 