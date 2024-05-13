var botonModificarClicado = false
var botonEliminarClicado = false
const guardado = document.getElementById('guardar');
let modificarB = document.getElementById('modificar');
let eliminarB = document.getElementById('eliminar');
let nombreF = document.getElementById('Nombre');
let precioF = document.getElementById('Precio');
let desarrolladorF = document.getElementById('Desarrollador');


// Alta de datos
guardado.addEventListener('click', (event) => {
    event.preventDefault();
    //Obtengo el contenido de las variables
    const nombre = nombreF.value;
    const precio = precioF.value;
    const desarrollador = desarrolladorF.value;
    //compruebo que los campos no esten vacios
    if (nombre === '' && precio === '' &&  desarrollador=== '' ) {
        alert('No pueden estar los campos vacios');
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/lms-reto/server/BDAccess copy.php', true);

    let formData = new FormData();
    formData.append('Nombre', nombre);
    formData.append('Precio', precio);
    formData.append('Desarrollador', desarrollador );
 
    console.log(nombre,precio,desarrollador)
    if (botonModificarClicado) {
        //Va el metodo de enviar para modificar
        modificar(xhr,formData);
        botonModificarClicado = false;
    } else if (botonEliminarClicado) {
        //Va el metodo de enviar para eliminar
        eliminar(xhr,formData)
        botonEliminarClicado = false;
    } else {
        darAlta(xhr,formData)
    }
})

function darAlta(xhr,formData) {
    formData.append('action', 'alta');
    envioFormulario(xhr,formData);
}

function modificar(xhr,formData) {
    formData.append('action', 'modificar');
    envioFormulario(xhr,formData);
}

function eliminar(xhr,formData) {
    formData.append('action', 'eliminar');
    envioFormulario(xhr,formData);
}

modificarB.addEventListener('click', (event) => {
    event.preventDefault();
    let mod = 'modificar'
    rellenarFormulario(mod)
})

eliminarB.addEventListener('click', (event) => {
    event.preventDefault();
    let mod = 'eliminar'
    rellenarFormulario(mod)
})

function rellenarFormulario(mod){
    let valor = prompt(`Introduce un nombre que quieras ${mod}:`);
    let formData = new FormData();
    formData.append('Valor', valor);
    formData.append('action', 'obtenerDatos');
    if (valor !== null) {
        fetch('http://localhost/lms-reto/server/BDAccess copy.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('Nombre').value = data.nombre;
                document.getElementById('Precio').value = data.precio;
                document.getElementById('Desarrollador').value = data.desarrollador;
            
                if(mod === "modificar"){
                    botonModificarClicado = true
                }else{
                    botonEliminarClicado = true
                }
                
            })
            .catch(error => {
                console.error('Error: ', error);
            })
    } else {
        console.log('el usuario cancela');
    }
}

//Borrado de datos del formulario
function borrado() {
    document.getElementById('Nombre').value = '';
    document.getElementById('Precio').value = '';
    document.getElementById('Desarrollador').value = '';
}

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
    borrado();
    xhr.send(formData);
}

//Actualizar la pagina tras enviar el formulario, no se si es necesario este metodo teniendo
// el del index.html
function update() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/lms-reto/server/BDAccess copy.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            document.getElementById('respuesta').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}


// Metodo para la confirmación de que quiere insertar los datos
function submit() {

}