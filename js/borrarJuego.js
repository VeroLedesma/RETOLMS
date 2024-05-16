function borrarJuego(){
    var id = document.getElementById("id").value;

    if (id === ""){
        alert("Completa los campos");
        return;
    }
    
    var url = "../PHP/DeleteGame.php?id=" + id;
    document.formJuego.action = url;
    document.formJuego.method = "GET";
    document.formJuego.submit();
}