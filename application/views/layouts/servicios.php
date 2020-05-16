
<div id='contenedormensajeservicio'>
    <label>Nuestra empresa ofrece distintos servicos para el publico en general. Estos son algunos de ellos.</label>
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