<div id='contenedorgeneral'>
<div id='contenedorfotos' style="width:50%">
    <?php 
        for($i =0; $i<count($fotos);$i++){
            echo '<div class="mySlides">';
                 echo '<div class="numbertext">'.($i+1).'/'.count($fotos).'</div>';
                 //echo "<img src='".base_url()."/resources/img/galeria/".$fotos[$i]['nombre']."' style='width:50%'>";
                 echo "<img src='".base_url()."/resources/img/galeria/".$fotos[$i]['nombre']."' class='fotoactiva'>";
            echo "</div>";
        }
    ?>

          <!-- Botones para avanzar foto -->
    <a class="anterior" onclick="plusSlides(-1)">&#10094;</a>
    <a class="siguiente" onclick="plusSlides(1)">&#10095;</a>


    <!-- contenedor de descripcion -->
    <div class="contenedordescripcion">
        <p id="descripcion"></p>
    </div>
    
    <!-- Agregar thumbnail -->
    <div class="row">
    <?php
        for($i=0; $i<count($fotos);$i++){
            echo "<div class='column'>";
                echo "<img class='demo cursor' src='".base_url()."/resources/img/galeria/".$fotos[$i]['nombre']."' style='width:100%' onclick='currentSlide(".($i+1).")' alt='".$fotos[$i]['descripcion']."'>";
            echo "</div>";
        }
    ?>
    </div> 
</div>
</div>
