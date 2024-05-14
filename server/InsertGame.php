<?php
    require_once('BDConexion.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Recoger los datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $categoria = $_POST['categoria'];
            $genero = $_POST['genero'];
            $precio = $_POST['precio'];
            $desarrollador = $_POST['desarrollador'];
            $web = $_POST['imagen'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_FILES['foto'];
            $plataforma = $_POST['plataforma'];
            $idioma = $_POST['idioma'];
            $clasificacion = $_POST['clasificacion'];
            $version = $_POST['version'];

            if (isset($id, $nombre, $categoria, $genero, $precio, $desarrollador, $web, $descripcion, $imagen, $plataformas, $idiomas, $clasificacion, $versiones)) {
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
                $session->execute("open tienda");
                $rutaXq = "xquery/alta.xq";
                $fichero = fopen($rutaXq, "r");
                $xq = fread($fichero, filesize($rutaXq));
                fclose($fichero);

                // Ejecutar la consulta con el parámetro "codigo"
                $query = $session->query($xq);

                // Vincular el valor del parámetro "codigo" a la consulta XQuery
                $query->bind('id', $id);
                $query->bind('$nombre', $nombre);
                $query->bind('$categoria', $categoria);
                $query->bind('$genero', $genero);
                $query->bind('$precio', $precio);
                $query->bind('$desarrollador', $desarrollador);
                $query->bind('$web', $web);
                $query->bind('$descripcion', $descripcion);
                $query->bind('$foto', $foto['tmp_name']); // Aquí usamos 'tmp_name' que es la ubicación temporal del archivo subido
                $query->bind('$plataforma', $plataforma);
                $query->bind('$idioma', $idioma);
                $query->bind('$clasificacion', $clasificacion);
                $query->bind('$version', $version);
                
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

                // Crear un nuevo elemento 'juego'
                $juego = $xml->juegos->addChild('juego');

                // Añadir el atributo 'id' al elemento 'juego'
                $juego->addAttribute('id', $id);

                // Añadir los datos al nuevo elemento 'juego'
                $juego->addChild('nombre', $nombre);
                $juego->addChild('categoria', $categoria);
                $juego->addChild('genero', $genero);
                $juego->addChild('precio', $precio);
                $juego->addChild('desarrollador', $desarrollador);
                $juego->addChild('web', $web);
                $juego->addChild('descripcion', $descripcion);
                $juego->addChild('imagen', $imagen);
                $juego->addChild('plataforma', $plataforma);
                $juego->addChild('idioma', $idioma);
                $juego->addChild('clasificacion', $clasificacion);
                $juego->addChild('version', $version);

                // Guardar los cambios en el archivo XML
                $xml->asXML($cargarXml);
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción que ocurra durante la ejecución
            echo $e->getMessage();
        }
    }