/**
 * Hacer código autoincremental para los videojuegos
 * @author Santiago Medina
 */

function enviarDatos() {
    let codigoJuego = document.getElementById('codigoJuego').value;
    var nombre = document.getElementById('nombre').value;
    var descripcion = document.getElementById('descripcion').value;
    var genero = document.getElementById('genero').value;
    var precio = document.getElementById('precio').value;
    var tipo = document.getElementById('tipo').value;
    var publicado = document.getElementById('publicado').checked; // Esto será true si el checkbox está marcado, y false si no lo está

    // Verificar si algún campo está vacío
    if (codigoJuego === '' || descripcion === '' || nombre === '' || genero === '' || precio === '' || tipo === '') {
        // Mostrar una alerta pidiendo al usuario que complete todos los campos
        alert("Por favor, complete todos los campos del formulario.");
    } else {
        //Confirmar envio
        var respuesta = confirm("¿Estás seguro de que quieres enviar la respuesta?");
        if (respuesta) {
            //Enviar a php
            document.formJuego.action = "../PHP/InsertGame.php";
            document.formJuego.method = "GET";
            document.formJuego.submit();
            alert("La respuesta ha sido enviada correctamente");
        } else {
            alert("ERROR. La respuesta no ha sido enviada");
        }
    }
}

function recibirRespuesta() {
    var paramString = window.location.search.substr(1);
    var parametros = new URLSearchParams(paramString);
    if (parametros.get("resultado") == "OK") {
        alert("La respuesta ha sido recibida correctamente");
    }
}