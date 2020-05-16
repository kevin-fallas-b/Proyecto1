window.addEventListener('load', inicial, false);



function inicial() {
    alertify.set('notifier','position','top-right');
}

function cambiarboton(boton) {
    var selected = document.getElementsByClassName('selected');
    if (selected[0] != null) {
        selected[0].classList.remove('selected');
    }
    boton.classList.add('selected');
}


function stringvalido(revisar, tamanomax) {
    //revisar que no sea nulo
    if (!revisar || /^\s*$/.test(revisar)) {
        return false;
    }
    //revisar que no sean puros espacios
    if (revisar.length === 0 || !revisar.trim()) {
        return false;
    }
    //revisar que no sobrepase tamano max
    if (revisar.length > tamanomax) {
        return false;
    }
    return true;
}