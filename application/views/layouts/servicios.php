
<div id='contenedormensajeservicio'>
    <label><?php echo $seccion['texto']?></label>
</div>
<br>
<?php
    $datos ='';
    foreach($servicios as $s){
        $datos .= "<button class='accordion' value=''>".$s['nombre']. ": ".$s['descripcioncorta']." </button>
                <div class='panel'>
                      ".$s['descripcion']."
                </div>";
    }
    echo $datos;

?>