<!DOCTYPE HTML>
<html>
  <head>
  	<link rel="icon" href="<?php echo base_url('resources/img/favicon.png');?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('resources/css/style.css');?>">
    <?php
        //si es galeria meter css y js de galeria
        if($seccion['tipo']==2){
          echo "<link rel='stylesheet' href='".base_url('resources/css/galeria.css')."'>";
          echo "<script type='text/javascript' src='".base_url('resources/js/galeria.js')."')></script>";
        }else if($seccion['tipo']==3){
          echo "<link rel='stylesheet' href='".base_url('resources/css/servicios.css')."'>";
          echo "<script type='text/javascript' src='".base_url('resources/js/servicios.js')."')></script>";
        }
     ?>
    <script type="text/javascript" src="<?php echo base_url('resources/js/axios.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('resources/js/functions.js');?>"></script>
    <title><?php echo $seccion['nombre']; ?></title>
  </head>

  <body id="main_page">
    <div id='contenedorbanner'>
        <img id='banner' src="<?php echo base_url('/resources/img/banners/'.$seccion['banner']);?>" alt="banner"> 
    </div>

    <div id='contenedorsecciones'>
        <?php 
            foreach($secciones as $s){
                echo form_open('sitio/goview');
                echo "<input type='submit' class='botonseccion' name='goview' value='".$s['nombre']."' >";
                echo form_close();
            }
        ?>
    </div>
  	<div id="main_box">
            <label id='labeltitulo'><?php echo $seccion['nombre']; ?></label>
            <!-- Aqui se debe cargar los detalles de cada pagina, la parte unica-->
            <?php
              switch($seccion['tipo']){
                case 1:
                  //solamente hay que cargar texto
                  include('sencillo.php');
                break;
                case 2:
                  //tenemos una galeria
                  include ('galeria.php');
                break;
                case 3:
                  //seccion de servicios
                  include('servicios.php');
                break;
                case 4:
                  //seccion de contacto
                break;
              }
            ?>
    </div> 
  </body>
</html>
