/**
 * Esta función se utiliza para modificar la información de un juego.
 * @author Vero
 * @returns
 */
function modificarJuego() {
    // Obtiene los valores de los campos del formulario.
    var codigoJuego = document.getElementById("codigoJuego").value;
    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;
    var genero = document.getElementById("genero").value;
    var precio = document.getElementById("precio").value;
    var tipo = document.getElementById("tipo").value;
    var categoria = document.getElementById("categoria").value;
    var publicado = document.getElementById('publicado').checked;
    
    // Verifica si algún campo está vacío.
    if (codigoJuego === "" || nombre === "" || descripcion === "" || genero=== "" || precio === "" || tipo === ""|| categoria === "") {
        // Si algún campo está vacío, muestra una alerta y sale de la función.
        alert("Todos los campos deben estar completos");
        return; 
    }

    // Construye la URL para enviar la solicitud de modificación del juego al servidor.
    document.formJuego.action = "../PHP/ModificationGame.php?codigoJuego=" + codigoJuego;
    document.formJuego.method = "GET";
    
    // Envía el formulario.
    document.formJuego.submit();
} 
