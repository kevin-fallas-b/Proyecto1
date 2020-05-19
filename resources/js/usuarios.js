//archivo JS que se encarga de controlar la seccion de agregar/editar usuarios en la pagina del ADMIN

window.addEventListener('load', inicial, false);

var usuarios; //contiene todos los usuarios recuperados de BD
var btneditar;
var btnnuevo;
var btnguardar;
var btncancelarusuario; //btn para cancelar editar usuario o crear usuario
var editando;//bandera para saber si estoy editando o creando usuario nuevo. util para la hora de guardar
var idseleccionado;//usuario que estoy editando
var cambiocontra;//bandera para cuando guardo
var selectorusuarios;//selector de usuarios en pantalla
var btncambiarfoto;//boton en si
var escogerfoto;//filepicker

function inicial() {
    btneditar = document.getElementById('btneditar');
    btnnuevo = document.getElementById('btnnuevo');
    btnguardar = document.getElementById('btnguardar');
    btncancelarusuario = document.getElementById('btncancelarusuario');
    selectorusuarios = document.getElementById('usuarios');

    btneditar.addEventListener('click', editar, false);
    btnguardar.addEventListener('click', guardar, false);
    btncancelarusuario.addEventListener('click', cancelarusuario, false);
    btnnuevo.addEventListener('click', function () {
        editando = false;
        document.getElementById('contenedorcamposusuario').removeAttribute('hidden');
        btneditar.setAttribute('disabled', true);
        selectorusuarios.setAttribute('disabled', true);
        btnnuevo.setAttribute('disabled', true);
    });

    btncambiarfoto = document.getElementById('btnfoto');
    escogerfoto = document.getElementById('escogerimagen');
    escogerfoto.addEventListener('change',subirfoto,false);
    btncambiarfoto.addEventListener('click',function(){
        escogerfoto.click();
    });
}

function getusuarios() {
    var opciones = document.getElementById('usuarios');
    opciones.innerHTML='';
    var form = new FormData();
    axios.post('admin/getusers', form)
        .then(function (response) {
            usuarios = response.data;
            for (var i = 0; i < usuarios.length; i++) {
                opciones.innerHTML += "<option value='" + usuarios[i]['id'] + "'>" + usuarios[i]['nombrereal'] + "</option>"
            }
        })
        .catch(function (error) {
            console.log('llego a error');
        })
}

function editar() {
    //agarrar elemento seleccionado por usuario
    var lista = document.getElementById('usuarios');
    idseleccionado = lista.options[lista.selectedIndex].value;

    //buscarlo en mi array de objetos usuario y guardar el usuario seleccionado en variable usuario
    var usuario;
    for (var i = 0; i < usuarios.length; i++) {
        if (usuarios[i]['id'] == idseleccionado) {
            usuario = usuarios[i];
            break;
        }
    }
    //ya tengo mi usuario, poner bandera de editando en true para cuando guarde y llenar los campos con informacion
    editando = true;
    document.getElementById('camponombre').value = usuario['nombrereal'];
    document.getElementById('campocorreo').value = usuario['correo'];
    document.getElementById('campousuario').value = usuario['usuario'];
    document.getElementById('contenedorcamposusuario').removeAttribute('hidden');
    document.getElementById('contenedorimagencontrol').removeAttribute('hidden');
    //poner foto
    document.getElementById('fotousuario').src=getbaseurl()+'/resources/img/users/'+usuario['foto'];
    btnnuevo.setAttribute('disabled', true);
    selectorusuarios.setAttribute('disabled', true);
    btneditar.setAttribute('disabled', true);

}

function guardar() {
    if (validarcampos()) {

        var nombre = document.getElementById('camponombre').value;
        var correo = document.getElementById('campocorreo').value;
        var usuario = document.getElementById('campousuario').value;
        var contra = document.getElementById('campocontra').value;

        var form = new FormData();
        form.append('nombre', nombre);
        form.append('correo', correo);
        form.append('usuario', usuario);


        var direccion;
        if (editando) {
            //actualizar user
            direccion = 'admin/actualizarusuario'
            form.append('id', idseleccionado);
            if (cambiocontra) {
                form.append('contra', contra);
            }
        } else {
            //crear usuario
            direccion = 'admin/crearusuario'
            form.append('contra', contra);

        }

        axios.post(direccion, form)
            .then(function (response) {
                if(editando){
                    alertify.success("Usuario editado exitosamente");
                }else{
                    alertify.success("Usuario guardado exitosamente");
                }
                cancelarusuario();
                getusuarios();
            })
            .catch(function (error) {
                console.log('Error al guardar');
            })


    } else {
    }

}

function cancelarusuario() {
    editando = false;
    document.getElementById('camponombre').value = '';
    document.getElementById('campocorreo').value = '';
    document.getElementById('campousuario').value = '';
    document.getElementById('campocontra').value = '';
    document.getElementById('campoconfirmarcontra').value = '';
    document.getElementById('contenedorcamposusuario').setAttribute('hidden', true);
    document.getElementById('contenedorimagencontrol').setAttribute('hidden', true);

    btnnuevo.removeAttribute('disabled');
    btneditar.removeAttribute('disabled');
    selectorusuarios.removeAttribute('disabled');
}

function validarcampos() {
    var nombre = document.getElementById('camponombre').value;
    var correo = document.getElementById('campocorreo').value;
    var usuario = document.getElementById('campousuario').value;
    var contra = document.getElementById('campocontra').value;
    var confirmarcontra = document.getElementById('campoconfirmarcontra').value;

    if (!stringvalido(nombre, 64) || !stringvalido(correo, 64) || !stringvalido(usuario, 64)) {
        alertify.error("Por favor revise los campos.");
        return false;
    }

    if (editando) {
        //si esta editando y el campo de contra tiene algo escrito, validar tambien contraseñas
        if (stringvalido(contra, 128)) {
            if (contra === confirmarcontra) {
                cambiocontra = true;
            } else {
                alertify.error("Las contraseñas no coinciden.");
                return false;
            }
        } else {
            cambiocontra = false;
        }
    } else {
        //no esta editando, validar contraseñas
        if (!(stringvalido(contra, 128) && stringvalido(confirmarcontra, 128) && contra === confirmarcontra)) {
            alertify.error("Por favor revise los campos de contraseña.");
            return false;
        }
    }
    for(var i=0;i<usuarios.length;i++){
        if(usuario.toUpperCase() == usuarios[i]['usuario'].toUpperCase()){
            //nombre de usuario ya existe, revisar si no es que me estoy editando yo mismo
            if(editando && idseleccionado === usuarios[i]['id']){
                // no pasa nada oigame
            }else{
                alertify.error("Nombre de usuario ya registrado.");
                return false;
            }
        }
        if(correo.toUpperCase() == usuarios[i]['correo'].toUpperCase()){
            //Correo ya existe, revisar si no es que me estoy editando yo mismo
            if(editando && idseleccionado === usuarios[i]['id']){
                // no pasa nada oigame
            }else{
                alertify.error("Correo ya registrado.");
                return false;
            }
        }
    }
    return true;
}

//metodo que se ejecuta cuando hay change en el filepicker, si esta editando, enviar la foto al controlador para que la suba, si no, guardarla de momento
function subirfoto(){
    document.getElementById('enviarid').value =idseleccionado;
    document.getElementById('btnsubmit').click();
}

