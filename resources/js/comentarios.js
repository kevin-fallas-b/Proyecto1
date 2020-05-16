//archivo de JS que se encarga de manejar la vista de comentarios en la pagina del admin

window.addEventListener('load', inicial, false);

function inicial() {
    getcomentarios();
    
}

function getcomentarios() {
    var contenedorcomentarios = document.getElementById('contenedormensajes');
    var form = new FormData();
    axios.post('admin/getcomentarios', form)
        .then(function (response) {
            comentarios = response.data;
            for (var i = 0; i < comentarios.length; i++) {
                contenedorcomentarios.innerHTML += "<button class='accordion' value=''>" + comentarios[i]['nombre'] + " | " + comentarios[i]['correo'] + " </button>" +
                    "<div class='panel'>" +
                    comentarios[i]['descripcion'] +
                    "</div>"

            }
            funcionalidadaAcordiones();
        })
        .catch(function (error) {
            console.log('llego a error');
        })

}

function funcionalidadaAcordiones(){
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if(panel.style.maxHeight) {
            panel.style.maxHeight = null;       
        } else {
            panel.style.maxHeight = panel.scrollHeight + "40px";
         }
    });
    }
}