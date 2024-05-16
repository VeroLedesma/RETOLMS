<h1>Se eliminó correctamente<h1>
<?php 

require_once("BDconexion.php");

try {
    //variables
    $id = $_GET["id"];
   

	$rutaXq = "../XQUERY/eliminar.xq";
	if (!file_exists($rutaXq)) {
		die("Error: El archivo eliminar.xq no existe en la ruta especificada.");
	}
	
	$fichero = fopen($rutaXq, "r");
	if ($fichero === false) {
		die("Error: No se pudo abrir el archivo eliminar.xq para lectura.");
	}
	
	$xq = fread($fichero, filesize($rutaXq));
	if ($xq === false) {
		die("Error: No se pudo leer el contenido del archivo eliminar.xq.");
	}
	
	fclose($fichero);
	
    // create session
    $session = new Session();    
    // open database
    $session->execute("open tienda"); // open y el nombre de la base de datos en el servidor BaseX
    // xquery
    $query = $session->query($xq);
    $query->bind('$id',$id);
    
    // execute result
    $result = $query->execute();
    // close query
    $query->close();
    // close session
    $session->close();

    // Show the result
    
    
} catch(Exception $e) {

    echo $e->getMessage();

}

?> 