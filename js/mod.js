function checkForm() {
    var boolean = false;
    const movies = document.getElementById('movie');
    const rating = document.getElementById('rating');
    const views = document.getElementById('views');

    var platforms;

    if(boolean) {
        var data = [
            movie, rating, views
        ];
    }
    console.log(data);
    enviarDatos();
}

function enviarDatos() {
    var answer = window.confirm("Mensaje que nosotros queramos");
    if(answer) {
        document.formSend.action = "nuestro php";
        document.formSend.method
        document.formSend.submit();
    } else {
        alert();
    }

}