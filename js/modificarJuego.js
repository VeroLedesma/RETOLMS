function modificarJuego() {
           
    var codigoJuego = document.getElementById("codigoJuego").value;
    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;
    var genero = document.getElementById("genero").value;
    var precio = document.getElementById("precio").value;
    var tipo = document.getElementById("tipo").value;
    var categoria = document.getElementById("categoria").value;
    
    if (codigoJuego === "" || nombre === "" || descripcion === "" || genero=== "" || precio === "" || tipo === ""|| categoria === "") {
        alert("Todos los campos deben estar completos");
        return; 
    }

    var url = "../PHP/ModificationGame.php?codigoJuego=" + codigoJuego;
    document.modificar.action = url;
    document.modificar.method = "GET";
    document.modificar.submit();
} 