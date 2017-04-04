<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Carga Mantenimiento mes de <?php echo nombremes(date('m')); ?></h4>
    </div>
    <div class="block-content">
    <form id="form_datos" method="post" class="form-horizontal" >
        <div class="control-group">
            <label class="control-label" for="general-text">Equipo: </label>
            <div class="controls">
                <input type="hidden" value="<?php echo $result->tipo_equipo;?>" id="tipo_equipo" name="tipo_equipo"/>
                <?php echo $result->armado."".$result->num_interno." ".$result->descripcion ?>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="general-text">Tipo de Mantenimiento </label>
            <div class="controls">
                <select  id="tipo_mantenimiento" onchange="buscar_item_matenimiento()"  name="tipo_mantenimiento">
                    <option value="0">Seleccione tipo de mantenimiento</option>
                    <?php
                    $id_persona = $consultas->getPersonabyUsuario();
                    $resultados = $consultas->getPersonasEquipo($_REQUEST['id_equipo'],$id_persona);
                    foreach ($resultados as $r) {
                         echo ($r->tipo_mantenimiento==1)?"<option value='1'>Primer Nivel</option>":"";
                        echo ($r->tipo_mantenimiento==2)?"<option value='2'>Preventivo</option>":"";
                        echo ($r->tipo_mantenimiento==3)?"<option value='3'>Calibracion</option>":"";

                    }
                    ?>
                </select>

            </div>
        </div>
        <div id="cartel_mantenimiento" style="width: 48%; float: right; display: none; position: absolute; margin-top: -90px; margin-left: 600px;">
            <img src="./img/verde.png"> Mantenimiento Realizado en fecha <br>
            <img src="./img/gris.png"> Mantenimiento impedido por equipo fuera de funcionamiento<br>
            <img src="img/rojo.png"> Mantenimiento No Realizado<br>
            <img src="img/amarillo.png"> Mantenieminto realizado fuera de fecha<br>
            <img src="img/menu_azul.png"> Mantenimiento planificado<br>
            <img src="img/caution.gif"> Advertencia de mantenimiento pendiente<br>

        </div>
        <div id="cartel_calibracion" style="width: 48%; float: right; display: none; position: absolute; margin-top: -90px; margin-left: 600px;">
            <img src="./img/verde.png"> Calibracion Realizado en fecha <br>
            <img src="./img/gris.png"> Calibracion impedido por equipo fuera de funcionamiento<br>
            <img src="img/rojo.png"> Calibracion No Realizado<br>
            <img src="img/amarillo.png"> Calibracion realizado fuera de fecha<br>
            <img src="img/menu_azul.png"> Calibracion planificado<br>
            <img src="img/caution.gif"> Advertencia de Calibracion pendiente<br>

        </div>
        <div class="control-group">
            <input type="hidden" value="<?php echo $_REQUEST['id_equipo'];?>" id="id_equipo" name="id_equipo"/>
            <button type="reset" onclick="location.href='controlador.php?action=busca_equipo'" class="btn btn-danger"><i class="icon-repeat"></i>Atras</button>
        </div>
        <br><br>    <br><br>
    <div id="item_mantenimiento">
        
    </div>   
    </form>    
    
    </div>
    
    
</div>    
</div>
</body>
</html>
<?php
function nombremes($mes){
    setlocale(LC_TIME, 'spanish');
    $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
    return $nombre; 
} ?>
<?php include_once 'footer.php' ?>

