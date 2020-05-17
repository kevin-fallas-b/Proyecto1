window.addEventListener('load', inicial, false);

var seccionesregistradas; //secciones con toda la informacion que recuperamos de BD
var btneditar;
var btnnuevo;
var contenedoreditor;//contiene todos los campos de editar
var opciones;
var idseleccionado; //id de la seccion a editar
var seccionseleccionada; //seccion que estamos editando, mas facil tenerla aqui

function inicial() {
    btneditar = document.getElementById('btneditar');
    btnnuevo = document.getElementById('btnnuevo');
    contenedoreditor = document.getElementById('contenedoreditor')
    opciones = document.getElementById('secciones');

    btnnuevo.addEventListener('click', seccionnueva);
    btneditar.addEventListener('click',editar);
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
    form.append('tipo', 'nueva');
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
    for(var i=0;i<seccionesregistradas.length;i++){
        if(seccionesregistradas[i]['id'] == idseleccionado){
            seccionseleccionada = seccionesregistradas[i];
            break;
        }
    }
    
    
    btneditar.setAttribute('disabled', true);
    btnnuevo.setAttribute('disabled', true);
    opciones.setAttribute('disabled', true);
    //leer php de seccion nueva y meterlo a contenedoreditor
    /*
    para mas facil, hacer en el controller un metodo que me retorne el view adecuado y asi uso axios para pedirle al controller el php
    */
    var form = new FormData();
    form.append('tipo', '"' + seccionseleccionada['tipo'] + '"');
    form.append('id', idseleccionado);
    axios.post('admin/getsec', form)
        .then(function (response) {
            contenedoreditor.innerHTML += response.data;
        }).catch(function (error) {

        });
}

function guardar() {
    console.log('click en guardar');
}