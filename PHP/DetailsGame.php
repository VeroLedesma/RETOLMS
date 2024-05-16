
<?php
    // Obtén el ID del juego del parámetro de la URL
    $id = $_GET['id'];

    // Carga el documento XML
    $xml = new DOMDocument;
    $xml->load('../XML/resultado.xml');

    // Carga la hoja de estilo XSL
    $xsl = new DOMDocument;
    $xsl->load('../XSLT/detailsGame.xsl');

    // Configura el procesador XSL
    $proc = new XSLTProcessor;
    $proc->importStyleSheet($xsl);

    // Establece el ID del juego como un parámetro para la transformación XSL
    $proc->setParameter('', 'id', $id);

    // Transforma el XML
    echo $proc->transformToXML($xml);
?>