<div id="contenedorseleccionusuario">
    <label for="">Seleccione el usuario a editar:</label>
    <select name="" id="usuarios">
        <script> getusuarios(); </script>
    </select>
    <input type="button" value="Editar" id="btneditar">
    <input type="button" value="Crear usuario nuevo" id="btnnuevo">
</div>

<div id="contenedorcampos">
    <input type="text" placeholder="Nombre" id="camponombre">
    <input type="text" placeholder="Correo" id="campocorreo">
    <input type="text" placeholder="Nombre de usuario" id="campousuario">
    <input type="password" placeholder="Contraseña" id="campocontra">
    <input type="password" placeholder="Confirmar contraseña" id="campoconfirmarcontra">
    <input type="button" value="Guardar" id="btnguardar">
</div>