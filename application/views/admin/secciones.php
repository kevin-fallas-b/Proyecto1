<script type="text/javascript" src="<?php echo base_url('resources/js/secciones.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('resources/css/secciones.css'); ?>">

<div id="contenedorseleccionseccion">
    <label for="">Seleccione la seccion a editar:</label>
    <select name="" id="secciones">
        <script>
            getsecciones();
        </script>
    </select>
    <input type="button" value="Editar" id="btneditar" class="boton">
    <input type="button" value="Crear seccion nueva" id="btnnuevo" class="boton">
</div>

<div id="contenedoreditor" >
    <input type="file" value="banner">
    <label for="campotitulo">Titulo</label>
    <input type="text" placeholder="Titulo" id="campotitulo">
    <textarea name="" id="" cols="30" rows="10" placeholder="Detalle de sitio"></textarea>
</div>