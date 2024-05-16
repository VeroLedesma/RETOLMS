// Esta función se utiliza para borrar un juego.
function borrarJuego(){
    // Obtiene el ID del juego del campo de entrada en el formulario.
    var id = document.getElementById("id").value;

    // Verifica si el campo está vacío.
    if (id === ""){
        // Si está vacío, muestra una alerta y sale de la función.
        alert("Completa los campos");
        return;
    }
    
    // Construye la URL para enviar la solicitud de eliminación del juego al servidor.
    var url = "../PHP/DeleteGame.php?id=" + id;
    
    // Configura la acción y el método del formulario para enviar la solicitud.
    document.formJuego.action = url;
    document.formJuego.method = "GET";
    
    // Envía el formulario.
    document.formJuego.submit();
}
