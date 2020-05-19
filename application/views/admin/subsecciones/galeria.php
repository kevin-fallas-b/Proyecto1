<link rel="stylesheet" href="<?php echo base_url('resources/css/subsecciones/galeria.css'); ?>">

<label id='mensajemantgaleria'>Galeria</label>

<div id="contenedoreditarservicios">
    <?php echo form_open_multipart('admin/subirimagen'); ?>
    <input type="file" name="txt_file" size="20" class="btn btn-info" id="escogerimagengaleria" hidden accept="image/jpeg,image/gif,image/png" onchange="mostrarpreviewimagen(event)" />
    <input type="text" name='nombfoto' hidden id="nombfoto" value="">
    <input type="text" name='desc' hidden id="desc" value="">
    <button type="button" class="boton" id="btnbuscarfoto" onclick="clickimagen()">Buscar Imagen</button>
    <button type="submit" hidden id="btnsubmitgaleria"> </button>
    <?php echo form_close(); ?>

    <div id="mantserviciosfila2">
        <label for="descservicionuevo" class="labelcampo">Descripcion</label>
        <input type="text" placeholder="Descripcion" class="campotexto" id="descimagen">
        <img src="" alt="" id="previewimagenasubir" hidden>
        <input type="button" class="boton" value="Cancelar imagen" id="btncancelarimagen" onclick="cancelarimagen()">
        <input type="button" class="boton" value="Agregar imagen" id="btnguardarimagen" onclick="agregarimagen()">

    </div>

    <div id="contenedorfotoseditables">
            
    </div>
</div>