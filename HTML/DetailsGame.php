<<<<<<< HEAD
<?php
if (isset($_GET['id'])) {
     //Obtén el ID del juego del parámetro de la URL
=======

<?php
    // Obtén el ID del juego del parámetro de la URL
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
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
<<<<<<< HEAD
    $htmlOutput = $proc->transformToXML($xml);

    echo $htmlOutput;

           // Muestra el formulario para eliminar el juego
           echo "<form method='post' action='../PHP/DeleteGame.php'>";
           echo "<input type='hidden' name='id' value='$id' />";
           echo "<button type='submit'>Eliminar juego</button>";
           echo "</form>";
       } else {
           // Si no se proporciona un ID válido, muestra un mensaje de error o redirecciona a otra página
         echo "Error: ID de juego no proporcionado.";
      }
   
?>
=======
    echo $proc->transformToXML($xml);
?>
>>>>>>> eb8a0721894bf1a1ce89b4d3af93bf36aaf1ac21
