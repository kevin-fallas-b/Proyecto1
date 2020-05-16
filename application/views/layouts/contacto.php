<div id='contenedormensajecontacto'>
    <label>Para nosotros es importante la opinion de nuestros clientes. A continuacion dejamos un formulario de contacto.</label>
</div>

<div id='contenedorformulario'>
    <form method='post' action='enviarcomentario'>
        <div id="contactofila1">
            <label for="nombre" class="labelcampo">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder='Nombre' size='50' class="campotexto" required>

        </div>
        <div id="contactofila2">
            <label for="correo" class="labelcampo">Correo</label>
            <input type="text" name="correo" id="correo" placeholder='Correo' size='50' class="campotexto" required>
        </div>
        <div id="contactofila3">
            <label for="comentario" class="labelcampo">Comentario</label>
            <textarea name='comentario' placeholder="Comentario" size='1000' required class="campotexto" id='campocomentario'></textarea>
        </div>

        <input type="submit" name="" id="btnenviarcomentario" value='Enviar comentario' class="boton">
    </form>
</div>