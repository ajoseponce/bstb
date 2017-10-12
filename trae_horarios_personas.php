<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 08/08/2016
 * Time: 11:33 AM
 */
include('lib/DB_Conectar.php');
include('classes/consultas.php');
/*print_r($_REQUEST);
exit;*/
$result = $consultas->getPersonasReloj($_REQUEST['persona']);
$número_dias = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['periodo'], $_REQUEST['anio']); //calcula la cantidad de dias  del maes
?>
<div style="display:none; border: 1px solid black; position: fixed; width: 80%; height:80%; margin-top: -100px; background: #FFF; " id="ventana_carga_horario">
    <div class="modal-header">
        <button type="button" onclick="cierra_carga_horario()" class="close" data-dismiss="modal">×</button>
        <h4>Detalle Horario del Dia</h4>
    </div>
    <div style="font-size: 16px;" class="modal-header" id="tiene_hs">

    </div>
    <div style="background-color: white;">
        <table>
            <tr id="horario_entrada">
                <td>Horario </td>
                <td>
                    <select id="altaHoraEnt">
                        <?php for($i=0;$i<24;$i++) {?>
                            <option value="<?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select> :
                    <select id="altaMinEnt">
                        <?php for($i=0;$i<60;$i++) {?>
                            <option value="<?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr id="horario_salida">
                <td>Horario </td>
                <td>
                    <select id="altaHoraSal">
                        <?php for($i=0;$i<24;$i++) {?>
                            <option value="<?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select> :
                    <select id="altaMinSal">
                        <?php for($i=0;$i<60;$i++) {?>
                            <option value="<?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?>" ><?php echo str_pad($i,2, "0", STR_PAD_LEFT); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div style="background-color: white;">
        <input type="hidden" id="id_reloj">
        <input type="hidden" id="fecha_horario">
        <button type="button" onclick="guardarHorarioPersona()" class="btn btn-success">Guardar Horario</button>
    </div>

</div>
<table class="sui-table">
    <thead>
    <tr style="background: red; color: white;"  >
        <th width="5%">Persona</th>
        <?php for ($i = 1; $i <= $número_dias; $i++) {

            echo "<th>";echo saber_dia($i,$_REQUEST['periodo'],$_REQUEST['anio'])."<br> ".$i."</th>";
        }
        ?>
        <th  width="5%">Total Horas</th>
    </tr>
    </thead>
    <?php
    if($result){
        foreach ($result as $v) {
            $diferencia_total=0;
            $icono = "<img src='img/line.png'>";
            ?>
            <tr style="height: 100px;   ">
                <td><strong><?php echo $v->nombre; ?></strong></td>
                <?php
                 $periodo =$_REQUEST['periodo'] ;
                for ($i = 1; $i <= $número_dias; $i++) {
                    $color_hoy="#fff";
                    if ($i<10) { $fecha_bloke = "0".$i."-".$periodo."-".$_REQUEST['anio'];}else{ $fecha_bloke = $i."-".$periodo."-".$_REQUEST['anio']; }
                    $fecha_filtro=substr($fecha_bloke, 6, 4)."-".substr($fecha_bloke, 3, 2)."-".substr($fecha_bloke, 0, 2);
                    $horario_Dia = $consultas->getHorariosFecha($v->id_reloj, $fecha_filtro);
                    //echo count($horario_Dia);
                    $fechaFin="";
                    $fechaIni="";
                    $error=0;
                    $fechaMostrar=0;
                    if($horario_Dia!=0) {
                        //print "cantidad registros".$horario_Dia."<br><br><br>";
                        if (count($horario_Dia) > 1) {
                            if ($horario_Dia[0]->fecha) {
                                $fechaIni = $horario_Dia[0]->fecha;

                            } else {
                                $fechaMostrar = $horario_Dia[0]->fecha;
                                $error = 1;
                            }
                            if ($horario_Dia[1]->fecha) {
                                $fechaFin = $horario_Dia[1]->fecha;
                            } else {
                                $fechaMostrar = $horario_Dia[0]->fecha;
                                $error = 1;
                            }

                        }else {
                            $fechaMostrar = $horario_Dia[0]->fecha;
                            $error = 1;
                        }
                    // separo las partes de cada fecha
                    }else{
                        //print "entra".$horario_Dia;
                        //$fechaMostrar = $horario_Dia[0]->fecha;
                        $error = 2;
                    }

                    if($error==1){

                        $icono = "<img src='img/horario_alerta.png' style='cursor:pointer;' onclick='carga_horario(\"".$fecha_filtro."\",".$v->id_reloj.",\"A\",\"".$fechaMostrar."\")'>";
                    }else{
                        if($error==2) {
                            $icono = "<img src='img/horario_ block.png' style:'cursor:pointer;' data-toggle='popover' data-html='true'  data-trigger='hover' data-content='<strong>No Contiene datos este dia</strong>' onclick='carga_horario(\"".$fecha_filtro."\",".$v->id_reloj.",\"C\")'>";
                        }else{
                            list($iniDia, $iniHora) = split(" ", $fechaIni);
                            list($anyo, $mes, $dia) = split("-", $iniDia);
                            list($hora, $min, $seg) = split(":", $iniHora);
                            $tiempoIni = mktime($hora + 0, $min + 0, $seg + 0, $mes + 0, $dia + 0, $anyo);
                            list($finDia, $finHora) = split(" ", $fechaFin);
                            list($anyo, $mes, $dia) = split("-", $finDia);
                            list($hora, $min, $seg) = split(":", $finHora);
                            $tiempoFin = mktime($hora + 0, $min + 0, $seg + 0, $mes + 0, $dia + 0, $anyo);
                            $diferencia = $tiempoFin - $tiempoIni;
                            $diferencia_total = $diferencia_total + $diferencia;
                            $icono = "<img src='img/horario_ok.png' style='cursor:pointer;'  data-toggle='popover' data-html='true'  data-trigger='hover' data-content='<strong>Cant. Hs: ".conversorSegundosHoras($diferencia)."</strong>' >";
                        }
                    }
                    if(saber_dia($i,$_REQUEST['periodo'],$_REQUEST['anio'])=='D'){$color_hoy="#000";}
                    if(saber_dia($i,$_REQUEST['periodo'],$_REQUEST['anio'])!='D'){
                        echo "<td style=' text-align: center;  background-color: ".$color_hoy." '>".$icono."</td>";
                    }else{
                        echo "<td style=' text-align: center;  background-color: ".$color_hoy." '>&nbsp;</td>";
                    }
                    //echo $i;
                }
                //echo "diferencia total".$diferencia_total;
                ?>
                <td><?php echo substr(conversorSegundosHoras($diferencia_total),0,5).""; ?></td>
            </tr>
            
            <?php 
        }?>

    <?php }else{?>
        <tr>
            <td colspan="3">No contiene Personas</td>
        </tr>
        <?php
    }
    ?>

</table>

<?php

function conversorSegundosHoras($tiempo_en_segundos) {
    $horas = floor($tiempo_en_segundos / 3600);
    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

    return $horas . ':' . $minutos . ":" . $segundos;
}
function saber_dia($dia,$mes,$anio) {
//echo $nombredia;
    if ($dia<10) {
        $fecha = "0" . $dia . "-" . $mes . "-" . $anio; //5 agosto de 2004 por ejemplo
    }else{
        $fecha = $dia . "-" . $mes . "-" . $anio; //5 agosto de 2004 por ejemplo
    }
    $fechats = strtotime($fecha);
    switch (date('w', $fechats)){
        case 0: return "D"; break;
        case 1: return "L"; break;
        case 2: return "Ma"; break;
        case 3: return "Mi"; break;
        case 4: return "J"; break;
        case 5: return "V"; break;
        case 6: return "S"; break;
    }
}
//(cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 0 );
?>

<?php
function arregla_dia($fecha){
    $cadena=explode("-", $fecha);
    if ($cadena[2]<10) {
        $fecha = $cadena[0]. "-" . $cadena[1] . "-0" . $cadena[2]; //5 agosto de 2004 por ejemplo
    }
    return $fecha;
}
?>
<script>
    $('[data-toggle="popover"]').popover();
    $(document).ajaxComplete(function() {
        $('[data-toggle="popover"]').popover();
    });
    function carga_horario(value,id_reloj,bandera,tiene){
        //alert('bueno o lo se');
        if(bandera=='A'){
            $("#horario_entrada").hide();
            $("#tiene_hs").html("Horario que tiene: "+tiene);
        }

        $("#fecha_horario").val(value);
        $("#id_reloj").val(id_reloj);
        $("#bandera").val(bandera);
        $("#ventana_carga_horario").show();
    }
    function cierra_carga_horario(){
        $("#fecha_horario").val("");
        $("#id_reloj").val("");
        $("#ventana_carga_horario").hide();
    }
</script>
