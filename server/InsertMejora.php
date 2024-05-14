<?php
    require_once('BDConexion.php');

    // Comprobar si la solicitud es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Obtener los datos del formulario de la superglobal $_POST
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $genero = $_POST['genero'];
            $precio = $_POST['precio'];
            $desarrollador = $_POST['desarrollador'];
            $web = $_POST['web'];
            $imagen = $_POST['imagen'];
            $plataforma = $_POST['plataforma'];
            $clasificacion = $_POST['clasificacion'];

            $rutaXq = "./xquery/altamejora.xq";
            $fichero = fopen($rutaXq, "r"); // Abrimos el fichero $rutaXq en modo lectura "r"
            $xq = fread($fichero, filesize($rutaXq)); // Leemos el contenido del fichero y lo guardamos en la variable $xq
            fclose($fichero); // Cerramos el fichero
            
            // Crear una sesión
            $session = new Session();

            // Abrir la base de datos
            $session->execute("open database"); // open y el nombre de la base de datos en el servidor BaseX

            // Crear una consulta
            $query = $session->query($xq);

            // Vincular los datos del formulario a la consulta
            $query->bind('$id', $id);
            $query->bind('$nombre', $nombre);
            $query->bind('$descripcion', $descripcion);
            $query->bind('$genero', $genero);
            $query->bind('$precio', $precio);
            $query->bind('$desarrollador', $desarrollador);
            $query->bind('$web', $web);
            $query->bind('$imagen', $imagen);
            $query->bind('$plataforma', $plataforma);
            $query->bind('$clasificacion', $clasificacion);

            // Ejecutar la consulta
            $query->execute();

            // Si todo va bien, puedes enviar una respuesta de éxito
            http_response_code(200);
            echo 'Datos guardados correctamente';

        } catch(Exception $e) {
            echo $e->getMessage();
        }
    } else {
        // Si la solicitud no es una solicitud POST, enviar una respuesta de error
        http_response_code(400);
        echo 'Solicitud inválida';
    }
?>