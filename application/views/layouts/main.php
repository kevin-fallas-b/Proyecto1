<!DOCTYPE HTML>
<html>
  <head>
  	<link rel="icon" href="<?php echo base_url('resources/img/favicon.png');?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('resources/css/style.css');?>">
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
                //echo form_open("Sitio/goView(".$s['nombre'].")");
                echo "<form action='".base_url."'>";
                echo "<input type='submit' class='linkseccion' >";
                echo "</form>";
               // echo form_close();1
                
            }
        ?>
    </div>
  	<div id="main_box">
	   <!-- Aqui se debe cargar los detalles de cada pagina, la parte unica-->
    </div> 
  </body>
</html>