let id, nombre, categoria, precio, desarrollador, imagen, website, descripcion, plataforma, plataformaidioma, genero, clasificacion, version;
const guardar = document.getElementById('guardar');
// Alta de datos
guardar.addEventListener('click', (event) => {
    console.log('me han clicado')
    event.preventDefault();

    // Obtengo el contenido de las variables
    id = document.querySelector('input[name="id"]').value;
    nombre = document.querySelector('input[name="nombre"]').value;
    categoria = document.querySelector('select[name="categoria"]').value;
    genero = document.querySelector('input[name="genero"]').value;
    precio = document.querySelector('input[name="precio"]').value;
    desarrollador = document.querySelector('select[name="desarrollador"]').value;
    imagen = document.querySelector('input[type="file"]').files[0];
    website = document.querySelector('input[name="web"]').value;
    descripcion = document.querySelector('input[name="descripcion"]').value;
    plataforma = document.querySelector('select[name="plataforma"]').value;
    plataformaidioma = document.querySelector('select[name="idioma"]').value;
    clasificacion = document.querySelector('select[name="clasificacion"]').value;
    version = document.querySelector('input[name="version"]:checked');

    // Compruebo que los campos no esten vacios
    if (id === '' || nombre === '' || categoria === '' || precio === '' || desarrollador === '' || !imagen || website === '') {
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
    formData.append('id', id);
    formData.append('nombre', nombre);
    formData.append('categoria', categoria);
    formData.append('genero', genero);
    formData.append('precio', precio);
    formData.append('desarrollador', desarrollador);
    formData.append('imagen', imagen);
    formData.append('web', website);
    formData.append('descripcion', descripcion);
    formData.append('plataforma', plataforma);
    formData.append('idioma', plataformaidioma);
    formData.append('clasificacion', clasificacion);
    formData.append('version', version);

    // Enviar los datos del formulario
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Datos guardados correctamente');
            } else if (xhr.status === 404) {
                console.log('Página no encontrada');
            } else {
                console.log('Error en la solicitud' + xhr.status);
            }
        }
    }
    xhr.send(formData);
})