<link rel="stylesheet" href="<?php echo base_url('resources/css/subsecciones/servicios.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/css/acordiones.css'); ?>">


<label id='mensajemantservicios'>Servicios</label>

<div id="contenedoreditarservicios">
    <div id="mantserviciosfila1">
        <label for="nombreservicionuevo" class="labelcampo">Nombre</label>
        <input type="text" placeholder="Nombre" class="campotexto" id="nombreservicionuevo">
        <label for="desccortaservicionuevo" class="labelcampo">Descripcion Corta</label>
        <input type="text" placeholder="Descripcion corta" class="campotexto" id="desccortaservicionuevo">
    </div>

    <div id="mantserviciosfila2">
        <label for="descservicionuevo" class="labelcampo">Descripcion</label>
        <input type="text" placeholder="Descripcion" class="campotexto" id="descservicionuevo">
        <input type="button" class="boton" value="Cancelar servicio" id="btncancelarservicio" onclick="cancelarservicio()">
        <input type="button" class="boton" value="Agregar servicio" id="btnguardarservicio" onclick="agregarservicio()">
    </div>

    <div id="contenedoracordiones">

    </div>
</div>