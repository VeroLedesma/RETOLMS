function modificarJuego() {
           
    var codigoJuego = document.getElementById("codigoJuego").value;
    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;
    var genero = document.getElementById("genero").value;
    var precio = document.getElementById("precio").value;
    var tipo = document.getElementById("tipo").value;
    var categoria = document.getElementById("categoria").value;
    var publicado = document.getElementById('publicado').checked;
    
    if (codigoJuego === "" || nombre === "" || descripcion === "" || genero=== "" || precio === "" || tipo === ""|| categoria === "") {
        alert("Todos los campos deben estar completos");
        return; 
    }

    
    document.formJuego.action = "../PHP/ModificationGame.php?codigoJuego=" + codigoJuego;
    document.formJuego.method = "GET";
    document.formJuego.submit();
} 