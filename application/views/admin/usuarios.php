<script type="text/javascript" src="<?php echo base_url('resources/js/usuarios.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('resources/css/usuarios.css'); ?>">

<div id="contenedorseleccionusuario">
    <label for="">Seleccione el usuario a editar:</label>
    <select name="" id="usuarios">
        <script>
            getusuarios();
        </script>
    </select>
    <input type="button" value="Editar" id="btneditar" class="boton">
    <input type="button" value="Crear usuario nuevo" id="btnnuevo" class="boton">
</div>

<div id="contenedorcamposusuario" hidden>
    <div id='contenedorimagencontrol' hidden>
        <div id="contenedorfotoeditando">
            <img id="fotousuario" src="<?php echo base_url('resources/img/users/unknown.png'); ?>" alt="">
        </div>

        <?php echo form_open_multipart('admin/subirfoto'); ?>
        <input type="file" name="txt_file" size="20" class="btn btn-info" id="escogerimagen" hidden accept="image/jpeg,image/gif,image/png" />
        <input type="text" name='enviarid' hidden id="enviarid" value="">
        <button type="button" class="boton" id="btnfoto">Cambiar Foto</button>
        <button type="submit" hidden id="btnsubmit"> </button>
        <?php echo form_close(); ?>
    </div>

    <div id="camposfila1" class="contenedorcampostexto">
        <label for="camponombre" id="labelnombre" class="labelcampo">Nombre</label>
        <input type="text" placeholder="Nombre" id="camponombre" class="campotexto" tabindex="2">
        <label for="campocorreo" id="labelcorreo" class="labelcampo">Correo</label>
        <input type="text" placeholder="Correo" id="campocorreo" class="campotexto" tabindex="3">
    </div>
    <label for="campousuario" id="labelusuario" class="labelcampo">Usuario</label>
    <input type="text" placeholder="Nombre de usuario" id="campousuario" class="campotexto" tabindex="1">
    <div id="camposfila3" class="contenedorcampostexto">
        <label for="campocontra" id="labelcontra" class="labelcampo" >Contraseña</label>
        <input type="password" placeholder="Contraseña" id="campocontra" class="campotexto" tabindex="4">
        <label for="labelconfirmarcontra" id="labelconfirmarcontra" class="labelcampo">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar contraseña" id="campoconfirmarcontra" class="campotexto"  tabindex="5">
    </div>
    <div id="contenedorconfirmarcancelar">
        <input type="button" value="Cancelar" id="btncancelarusuario" class="boton">
        <input type="button" value="Guardar" id="btnguardar" class="boton">
    </div>


</div>