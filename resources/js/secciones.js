window.addEventListener('load', inicial, false);

var seccionesregistradas; //secciones con toda la informacion que recuperamos de BD
var btneditar;
var btnnuevo;
var contenedoreditor;//contiene todos los campos de editar
var opciones;
var idseleccionado; //id de la seccion a editar
var seccionseleccionada; //seccion que estamos editando, mas facil tenerla aqui
var btnbanner;// btn mostrado al usuario, se encarga de abrir el file picker
var escogerbanner;//filepicker
var editando;//bandera que me ayuda a guardar


function inicial() {
    btneditar = document.getElementById('btneditar');
    btnnuevo = document.getElementById('btnnuevo');
    contenedoreditor = document.getElementById('contenedoreditor')
    opciones = document.getElementById('secciones');
    editando = false;

    btnnuevo.addEventListener('click', seccionnueva);
    btneditar.addEventListener('click', editar);

}

function getsecciones() {
    opciones = document.getElementById('secciones');
    opciones.innerHTML = '';
    var form = new FormData();
    axios.post('admin/getsecciones', form)
        .then(function (response) {
            seccionesregistradas = response.data;
            for (var i = 0; i < seccionesregistradas.length; i++) {
                opciones.innerHTML += "<option value='" + seccionesregistradas[i]['id'] + "'>" + seccionesregistradas[i]['nombre'] + "</option>"
            }
        })
        .catch(function (error) {
            console.log('llego a error');
        })
}

function seccionnueva() {
    btneditar.setAttribute('disabled', true);
    btnnuevo.setAttribute('disabled', true);
    opciones.setAttribute('disabled', true);
    //leer php de seccion nueva y meterlo a contenedoreditor
    /*
    para mas facil, hacer en el controller un metodo que me retorne el view adecuado y asi uso axios para pedirle al controller el php
    */
    var form = new FormData();
    form.append('tipo', 1);
    axios.post('admin/getsec', form)
        .then(function (response) {
            contenedoreditor.innerHTML += response.data;
        }).catch(function (error) {

        });
}

function editar() {
    //agarrar elemento seleccionado por usuario
    var lista = document.getElementById('secciones');
    idseleccionado = lista.options[lista.selectedIndex].value;
    for (var i = 0; i < seccionesregistradas.length; i++) {
        if (seccionesregistradas[i]['id'] == idseleccionado) {
            seccionseleccionada = seccionesregistradas[i];
            break;
        }
    }

    btneditar.setAttribute('disabled', true);
    btnnuevo.setAttribute('disabled', true);
    opciones.setAttribute('disabled', true);


    var form = new FormData();
    form.append('tipo', seccionseleccionada['tipo']);
    axios.post('admin/getsec', form)
        .then(function (response) {
            contenedoreditor.innerHTML += response.data;
            editando = true;
            setdatos();
            if (seccionseleccionada['tipo'] == 1 && idseleccionado > 5) {
                document.getElementById('eliminarseccion').removeAttribute('hidden');
            }
        }).catch(function (error) {

        });

}

function setdatos() {
    document.getElementById('campotitulo').value = seccionseleccionada['nombre'];
    document.getElementById('campodetalle').value = seccionseleccionada['texto'];
    document.getElementById('bannerasubir').src = getbaseurl() + '/resources/img/banners/' + seccionseleccionada['banner'];
    document.getElementById('bannerasubir').removeAttribute('hidden');
}

function guardar() {
    var titulo = document.getElementById('campotitulo').value;
    var detalle = document.getElementById('campodetalle').value;
    if (stringvalido(titulo, 50) && stringvalido(detalle, 3000)) {
        //campos buenos, ver si estoy editando o creando uno nuevo
        var form = new FormData();
        form.append('titulo', titulo);
        form.append('detalle', detalle);

        if (!editando) {
            //guardar nuevo
            //todo bien, hacer post a guardar
            axios.post('admin/secnueva', form)
                .then(function (response) {
                    alertify.success('Seccion guardada correctamente');
                    cancelarseccion();
                    getsecciones();
                }).catch(function (error) {

                });
        } else {
            //estoy editando
            form.append('id', idseleccionado);
            axios.post('admin/editarsec', form)
                .then(function (response) {
                    alertify.success('Seccion editada correctamente');
                    cancelarseccion();
                    getsecciones();
                }).catch(function (error) {

                });
        }
    } else {
        //campos invalidos
        alertify.error('por favor revise los campos');
    }

}

//como cargamos dinamicamente, debo crear muchas funciones asi para meterlo desde HTML
function clickbanner() {
    if (editando) {
        escogerbanner = document.getElementById('escogerbanner');
        escogerbanner.click();
    } else {
        //esta creando, aun no puede subir banner
        alertify.error('Para seleccionar un banner. Guarde la seccion luego modifiquela.')
    }
}

function cancelarseccion() {
    editando = false;
    contenedoreditor.innerHTML = '';
    btneditar.removeAttribute('disabled');
    btnnuevo.removeAttribute('disabled');
    opciones.removeAttribute('disabled');
}

function eliminarseccion() {
    alertify.confirm('Eliminar Seccion', '¿Esta seguro que desea eliminar esta seccion? Esto no se puede deshacer.', function () {
        //hacer post a eliminar
        var form = new FormData();
        form.append('id', idseleccionado);
        axios.post('admin/eliminarsec', form)
            .then(function (response) {
                alertify.success('Seccion eliminada correctamente');
                cancelarseccion();
                getsecciones();
            }).catch(function (error) {

            });
    }, '');
}

function subirbanner(){
    document.getElementById('enviarid').value =idseleccionado;
    document.getElementById('btnsubmit').click();
}