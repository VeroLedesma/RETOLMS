/**
 * Hacer código autoincremental para los videojuegos
 * @author Santiago Medina
 */

// Variables
let nombre, genero, plataforma, desarrollador, web, clasificacion, precio, imagen, descripcion, errores, codigo;

// Se define un objeto 'campos' con las claves correspondientes a los nombres de los campos del formulario
let campos = {
    'nombre': nombre,
    'descripcion': descripcion,
    'genero': genero,
    'precio': precio,
    'desarrollador': desarrollador,
    'web': web,
    'imagen': imagen,
    'plataforma': plataforma,
    'clasificacion': clasificacion
};

// Recoger el archivo XML y analizarlo para hacer que el ID sea autoincremental
fetch('./server/xml/database.xml')
    .then(response => response.text())
    .then(data => {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(data, 'text/xml');
        const juegos = xmlDoc.getElementsByTagName('juego');
        let largestID = 0;
        for (let i = 0; i < juegos.length; i++) {
            const juegoID = parseInt(juegos[i].getAttribute('id'));
            if (juegoID > largestID) {
                largestID = juegoID;
            }
        }
        codigoJuego = largestID + 1; // Set the value of the hidden input field
    })
    .catch(error => console.error('Error fetching XML:', error)
);

// Alta de datos
const guardar = document.getElementById('guardar');

guardar.addEventListener('click', (event) => {
    console.log('me han clicado');
    event.preventDefault();

    // Asignar los valores de los campos del formulario a las variables
    nombre = document.getElementById('nombre').value;
    descripcion = document.getElementById('descripcion').value;
    genero = document.getElementById('genero').value;
    precio = document.getElementById('precio').value;
    desarrollador = document.getElementById('desarrollador').value;
    web = document.getElementById('web').value;
    plataforma = document.getElementById('plataforma').value;
    clasificacion = document.getElementById('clasificacion').value;
    imagen = document.getElementById('imagen').value;
    errores = document.getElementById('errores');
    codigoJuego = document.getElementById('codigoJuego').value;

    // Actualizar los valores de 'campos'
    campos.nombre = nombre;
    campos.descripcion = descripcion;
    campos.genero = genero;
    campos.precio = precio;
    campos.desarrollador = desarrollador;
    campos.web = web;
    campos.imagen = imagen;
    campos.plataforma = plataforma;
    campos.clasificacion = clasificacion;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/RETOLMS/server/InsertMejora.php', true);

    // Crear un objeto FormData y añadir los datos del formulario
    let formData = new FormData();

    for (let campo in campos) {
        formData.append(campo, campos[campo]);
    }

    // Enviar los datos del formulario
    envioFormulario(xhr,formData);
})

// Función para enviar los datos del formulario
function envioFormulario(xhr,formData){
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
    xhr.send(formData);
}

// Función para validar los campos del formulario
// function comprobarCampos() {
//     // Se itera sobre cada campo en el objeto 'campos'.
//     for (let campo in campos) {
//         // Si el valor del campo actual es una cadena vacía, se muestra un mensaje de error y se detiene la ejecución de la función.
//         if (campos[campo] === '') {
//             errores.innerHTML = `El campo ${campo} no puede estar vacío.`;
//             return false;
//         }
//     }

//     // Si todo está correcto, se envía el formulario
//     return true;
// }

// Función para borrar los datos de los campos
function borrado() {
    nombre.value = '';
    descripcion.value = '';
    genero.value = '';
    precio.value = '';
    desarrollador.value = '';
    web.value = '';
    imagen.value = '';
    plataforma.value = '';
    clasificacion.value = '';
}