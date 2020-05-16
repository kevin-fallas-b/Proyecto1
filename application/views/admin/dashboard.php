<!DOCTYPE HTML>
<html>

<head>
    <link rel="icon" href="<?php echo base_url('resources/img/favicon.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('resources/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/css/alertify.min.css'); ?>">
    <script type='text/javascript' src="<?php echo base_url('resources/js/dashboard.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/js/axios.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/js/alertify.min.js'); ?>"></script>
    <title>Panel administracion</title>
</head>

<body id="main_page">
    <label id='mensajebienvenido'>Bienvenido <?php echo $this->session->userdata['logged_in']['nombre'] ?>!</label>
    <div id='contenedorlinks'>
        <form action="dashboard" method="POST">
            <input type="submit" value="Editar secciones" id="btneditarsecciones" name='tipo' class="btnlink selected">
        </form>

        <form action="dashboard" method="POST">
            <input type="submit" value="Agregar/editar usuarios" id="btneditarusuarios" name='tipo' class="btnlink">
        </form>

        <form action="dashboard" method="POST">
            <input type="submit" value="Ver comentarios" id="btnvercomentarios" name='tipo' class="btnlink">
        </form>

        <form action="logout" method="POST">
            <input type="submit" value="Cerrar sesion" id='btncerrarsession' class="btnlink">
        </form>
    </div>

    <div id='contenedorprincipal'>
        <?php
        //aqui hacer un switch con lo que viene en post de pagina, como en el layout main
        if( $this->input->post('tipo')){
            switch ($this->input->post('tipo')) {
                case 'Editar secciones': include('secciones.php');
                echo "<script> cambiarboton(btneditarsecciones); </script>";
            break;
                case 'Agregar/editar usuarios': include('usuarios.php');
                echo "<script> cambiarboton(btneditarusuarios); </script>";
            break;
            case 'Ver comentarios': include('comentarios.php');
                echo "<script> cambiarboton(btnvercomentarios); </script>";
            break;
            }
        }else{
                include('secciones.php');
                echo "<script> cambiarboton(btneditarsecciones); </script>";
        }
        ?>
        
    </div>
</body>

</html>