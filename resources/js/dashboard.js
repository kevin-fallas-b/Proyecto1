window.addEventListener('load',inicial,false);


function inicial(){
    
}

function cambiarboton(boton){
    var selected = document.getElementsByClassName('selected');
    if(selected[0]!=null){
        selected[0].classList.remove('selected');
    }
    boton.classList.add('selected');
}