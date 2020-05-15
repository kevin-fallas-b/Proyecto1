window.addEventListener('load',inicial,false);

var botoneslinks; //botones con link como editarsecciones, agregar/editar usuarios

function inicial(){
    //agregar onclick a botones link
    botoneslinks = document.getElementsByClassName('btnlink');
    for(var i=0;i<botoneslinks.length-1;i++){
        agregaronclick(botoneslinks[i]);
    }
}


function agregaronclick(boton){
    boton.addEventListener('click',function(){
        //ponerle color al link seleccionado
        var selected = document.getElementsByClassName('selected');
        selected[0].classList.remove('selected');
        boton.classList.add('selected');
    })

}

function cambiarboton(boton){
    var selected = document.getElementsByClassName('selected');
    if(selected[0]!=null){
        selected[0].classList.remove('selected');
    }
    boton.classList.add('selected');
}