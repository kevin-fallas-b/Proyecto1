<div id="fila1">
        <input type="file" value="banner" id='escogerbanner' hidden>
        <input type="button" id="btnbanner" value="Escoger Banner" class="boton" onclick='clickbanner()'>
        <img src="" alt="" id="bannerasubir" >
    </div>
    <div id="fila2">
        <label for="campotitulo" class="labelcampo">Titulo</label>
        <input type="text" placeholder="Titulo" id="campotitulo" class="campotexto">
    </div>
    <div id="fila3">
        <label for="campodetalle" class="labelcampo">Detalle de sitio</label>
        <textarea name="" id="campodetalle" cols="30" rows="10" placeholder="Detalle de sitio" class="campotexto"></textarea>
        <label for="" id="lblayuda">Este apartado soporta etiquetas HTML!<br>Usalas para acomodar de mejor manera tu contenido.</label>
        <a href="https://www.w3schools.com/TAGS/default.ASP" id="linkayuda" target="_blank">Click aqui para mas informacion.</a>
    </div>
    <div id="contenedorconfirmarcancelar">
        <input type="button" value="Cancelar" id="btncancelarusuario" class="boton" onclick="cancelarseccion()">
        <input type="button" value="Guardar" id="btnguardar" class="boton" onclick="guardar()">
    </div>