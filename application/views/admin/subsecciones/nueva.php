<div id="fila1">


    <?php echo form_open_multipart('admin/subirbanner'); ?>
    <input type="file" name="txt_file" size="20" class="btn btn-info" id="escogerbanner" onchange="subirbanner()" hidden accept="image/jpeg,image/gif,image/png" />
    <input type="text" name='enviarid' hidden id="enviarid" value="">
    <button type="button" class="boton" id="btnfoto" onclick="clickbanner()">Cambiar Banner</button>
    <button type="submit" hidden id="btnsubmit"> </button>
    <?php echo form_close(); ?>

    <img src="" alt="" id="bannerasubir" hidden>
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
    <input type="button" id='eliminarseccion' onclick="eliminarseccion()" value='Eliminar Seccion' class="boton" hidden>
</div>
<div id="contenedorconfirmarcancelar">
    <input type="button" value="Cancelar" id="btncancelarusuario" class="boton" onclick="cancelarseccion()">
    <input type="button" value="Guardar" id="btnguardar" class="boton" onclick="guardar()">
</div>