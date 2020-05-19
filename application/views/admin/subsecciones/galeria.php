<link rel="stylesheet" href="<?php echo base_url('resources/css/subsecciones/servicios.css'); ?>">

<label id='mensajemantservicios'>Galeria</label>

<div id="contenedoreditarservicios">
    <?php echo form_open_multipart('admin/subirimagen'); ?>
	    <input type="file" name="txt_file" size="20" class="btn btn-info" id="escogerimagen" hidden accept="image/jpeg,image/gif,image/png" />
	    <input type="text" name='enviarid' hidden id="enviarid" value="">
	    <button type="button" class="boton" id="btnfoto" onclick="clickimagen()">Subir Imagen</button>
	    <button type="submit" hidden id="btnsubmit"> </button>
    <?php echo form_close(); ?>

     <div id="mantserviciosfila2">
        <label for="descservicionuevo" class="labelcampo">Descripcion</label>
        <input type="text" placeholder="Descripcion" class="campotexto" id="descimagen">
        <input type="button" class="boton" value="Cancelar imagen" id="btncancelarservicio" onclick="cancelariamgen()">
        <input type="button" class="boton" value="Agregar imagen" id="btnguardarservicio" onclick="agregarimagen()">
    </div>
</div>