<?php
    //
    require_once('BDConexion.php');

    try {
        // Recoger los datos del formulario
        $nombre = $_POST["nombre"];
        $category = $_POST["category"];
        $precio = $_POST["precio"];
        $developers = $_POST["developers"];
        $website = $_POST["website"];
        $foto = $_FILES["foto"];
        $platforms = $_POST["platforms"];

        if(isset($nombre, $category, $precio, $developers, $website, $foto, $platforms)) {
            // Comprueba si la imagen se cargó correctamente
            if ($foto['error'] !== UPLOAD_ERR_OK) {
                die('Error al subir la imagen');
            }
                
            // Crea un nombre único para la imagen
            $nombreImagen = uniqid() . '-' . $foto['name'];

            // Mueve la imagen a la carpeta deseada
            $rutaImagen = '../imagenes/' . $nombreImagen;
            if (!move_uploaded_file($foto['tmp_name'], $rutaImagen)) {
                die('Error al mover la imagen');
            }

            // Crear sesión
            $session = new Session();

            // Abrir la base de datos
            $session->execute("open RETOLMS");
            $rutaXq = "xquery/alta.xq";
            $fichero = fopen($rutaXq, "r");
            $xq = fread($fichero, filesize($rutaXq));
            fclose($fichero);

            // Ejecutar la consulta con el parámetro "codigo"
            $query = $session->query($xq);

            // Vincular el valor del parámetro "codigo" a la consulta XQuery
            $query->bind('nombre', $nombre);
            $query->bind('category', $category);
            $query->bind('precio', $precio);
            $query->bind('developers', $developers);
            $query->bind('website', $website);
            $query->bind('foto', $foto['tmp_name']); // Aquí usamos 'tmp_name' que es la ubicación temporal del archivo subido
            $query->bind('platforms', $platforms);

            // Ejecutar la consulta
            $result = $query->execute();

            // Cerrar la consulta y la sesión
            $query->close();
            $session->close();

            // Cargamos el archivo XML a nivel local
            $cargarXml = "../xml/tienda.xml";
            if (!file_exists($cargarXml)) {
                exit;
            }

            // Verificamos si hubo un error al cargar el archivo XML
            $xml = simplexml_load_file($cargarXml);
            if ($xml === false) {
                echo 'Error al cargar el archivo XML.';
                exit;
            }

            // Creamos un nuevo elemento 'juego' en el archivo XML
            $xml->addChild('juego');

            // Añadimos los datos al nuevo elemento
            $xml->addChild('nombre', $nombre);
            $xml->addChild('category', $category);
            $xml->addChild('precio', $precio);
            $xml->addChild('developers', $developers);
            $xml->addChild('website', $website);

            // Convertir la imagen a base64
            $imagenBase64 = base64_encode(file_get_contents($foto['tmp_name']));
            $juego->addChild('foto', $imagenBase64);

            $xml->addChild('platforms', $platforms);

            // Guardamos los cambios en el archivo XML
            $xml->asXML($cargarXml);
        }
    } catch (Exception $e) {
        // Manejar cualquier excepción que ocurra durante la ejecución
        echo $e->getMessage();
    }
?>