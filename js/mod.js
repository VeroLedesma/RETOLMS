let nombre, categoria, precio, desarrollador, imagen, website;

// Alta de datos
function altaJuego(event) {
    event.preventDefault();

    // Obtengo el contenido de las variables
    nombre = document.querySelector('input[name="nombre"]').value;
    categoria = document.querySelector('select[name="Categoria"]').value;
    precio = document.querySelector('input[name="precio"]').value;
    desarrollador = document.querySelector('select[name="Desarrollador"]').value;
    imagen = document.querySelector('input[type="file"]').files[0];
    website = document.querySelector('input[name="website"]').value;

    // Compruebo que los campos no esten vacios
    if (nombre === '' || categoria === '' || precio === '' || desarrollador === '' || !imagen || website === '') {
        alert('No pueden estar los campos vacios');
        return;
    }

    // Compruebo que la imagen no sea demasiado grande
    if (imagen.size > 1048576) {
        alert('La imagen es demasiado grande');
        return;
    }  

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/RETOLMS/server/InsertGame.php', true);

    // Crear un objeto FormData y añadir los datos del formulario
    let formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('categoria', categoria);
    formData.append('precio', precio);
    formData.append('desarrollador', desarrollador);
    formData.append('imagen', imagen);
    formData.append('website', website);

    // Enviar los datos del formulario
    xhr.send(formData);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Datos guardados correctamente');
                update();
            } else if (xhr.status === 404) {
                console.log('Página no encontrada');
            } else {
                console.log('Error en la solicitud' + xhr.status);
            }
        }
    }
}

// Obtener el formulario y añadir un manejador de eventos para el envío
const form = document.querySelector('form');
form.addEventListener('submit', altaJuego);