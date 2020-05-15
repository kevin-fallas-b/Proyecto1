window.addEventListener('load',inicial,false);

var usuarios;
var btneditar;
var btnnuevo;
var btnguardar;
var editando;//bandera para saber si estoy editando o creando usuario nuevo. util para la hora de guardar

function inicial(){
    btneditar = document.getElementById('btneditar');
    btnnuevo = document.getElementById('btnnuevo');
    btnguardar = document.getElementById('btnguardar');

    btneditar.addEventListener('click',editar,false);
    btnguardar.addEventListener('click',guardar,false);
}

function cambiarboton(boton){
    var selected = document.getElementsByClassName('selected');
    if(selected[0]!=null){
        selected[0].classList.remove('selected');
    }
    boton.classList.add('selected');
}

function getusuarios(){
    var opciones = document.getElementById('usuarios');
    var form = new FormData();
    axios.post('admin/getusers', form)
    .then(function (response) {
        usuarios = response.data;
        for(var i=0;i<usuarios.length;i++){
            opciones.innerHTML += "<option value='"+usuarios[i]['id']+"'>"+usuarios[i]['nombrereal'] +"</option>"
        }
    })
    .catch(function (error) {
        console.log('llego a error');
    })
}

function editar(){
    //agarrar elemento seleccionado por usuario
    var lista = document.getElementById('usuarios');
    var idseleccionado = lista.options[lista.selectedIndex].value;

    //buscarlo en mi array de objetos usuario y guardar el usuario seleccionado en variable usuario
    var usuario;
    for(var i=0;i<usuarios.length;i++){
        if(usuarios[i]['id']==idseleccionado){
            usuario = usuarios[i];
            break;
        }
    }
    //ya tengo mi usuario, poner bandera de editando en true para cuando guarde y llenar los campos con informacion
    editando=true;
    document.getElementById('camponombre').value=usuario['nombrereal'];
    document.getElementById('campocorreo').value=usuario['correo'];
    document.getElementById('campousuario').value=usuario['usuario'];
}

function guardar(){
    console.log('le dio guardar');
}