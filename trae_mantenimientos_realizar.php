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
/***************************************/
$result = $consultas->getMantenimientosActualizar($_REQUEST['id_equipo']);

    $k=0;
    if($result){
       // echo "entra";
        foreach ($result as $r) {
            if($r->fecha_debe<date('Y-m-d')) {
                $tiene = $consultas->getDebeActualizar($r->fecha_debe, $r->id_equipo, $r->tipo_mantenimiento, $r->id_item);
                if ($tiene == 0) {

                    $f = $consultas->getItemsMantenimeinto($r->tipo_equipo, $r->tipo_mantenimiento,$r->id_item);
                    $contador++;

                    //echo "frecuencia".$f[0]->frecuencia;
                    switch ($f[0]->frecuencia) {
                        case "1":

                            $fecha_debe=$r->fecha_debe;
                            $dias_count=calculadora($r->fecha_debe);
                            // echo  "frcueencia".$f[0]->frecuencia;
                            //echo "<br>";
                            $i = $dias_count;
                            while ($i >= $f[0]->frecuencia) {
//                                echo "<br>";
//                                echo "paso y valia---------->".$i;
                                $fecha_deberia = $fecha_debe;
                                $fecha_debe = strtotime('+1 day', strtotime($fecha_debe));
                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                $fecha_debe = arregla_dia($fecha_debe);

                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($r->id_equipo, $r->tipo_equipo, $r->tipo_mantenimiento, $fecha_deberia, $fecha_debe);
                                $valor = "Mantenieminto no relaizado";
                                $id_detallle = $consultas->save_mantenimiento_detalle($id_cabecera, $r->id_item, $valor);

                                $i=$i-$f[0]->frecuencia;
                            }
                            //echo "----->".$dias_count;
                            break;
                        case "7":
                            $fecha_debe=$r->fecha_debe;
                            $dias_count=calculadora($r->fecha_debe);
                           // echo  "frcueencia".$f[0]->frecuencia;
                            //echo "<br>";
                            $i = $dias_count;
                            while ($i >= $f[0]->frecuencia) {
//                                echo "<br>";
//                                echo "paso y valia---------->".$i;
                                $fecha_deberia = $fecha_debe;
                                $fecha_debe = strtotime('+7 day', strtotime($fecha_debe));
                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                $fecha_debe = arregla_dia($fecha_debe);

                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($r->id_equipo, $r->tipo_equipo, $r->tipo_mantenimiento, $fecha_deberia, $fecha_debe);
                                 $valor = "Mantenieminto no relaizado";
                                 $id_detallle = $consultas->save_mantenimiento_detalle($id_cabecera, $r->id_item, $valor);

                                $i=$i-$f[0]->frecuencia;
                            }
                            //echo "----->".$dias_count;
                            break;
                        case "15":
                            $fecha_debe=$r->fecha_debe;
                            $dias_count=calculadora($r->fecha_debe);
                            // echo  "frcueencia".$f[0]->frecuencia;
                            //echo "<br>";
                            $i = $dias_count;
                            while ($i >= $f[0]->frecuencia) {
//                                echo "<br>";
//                                echo "paso y valia---------->".$i;
                                $fecha_deberia = $fecha_debe;
                            $fecha_debe = strtotime('+14 day', strtotime($fecha_debe));
                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                $fecha_debe = arregla_dia($fecha_debe);

                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($r->id_equipo, $r->tipo_equipo, $r->tipo_mantenimiento, $fecha_deberia, $fecha_debe);
                                $valor = "Mantenieminto no relaizado";
                                $id_detallle = $consultas->save_mantenimiento_detalle($id_cabecera, $r->id_item, $valor);

                                $i=$i-$f[0]->frecuencia;
                            }
                            //echo "----->".$dias_count;
                            break;
                        case "30":

                            $fecha_debe=$r->fecha_debe;
                            $dias_count=calculadora($r->fecha_debe);
                            // echo  "frcueencia".$f[0]->frecuencia;
                            //echo "<br>";
                            $i = $dias_count;
                            while ($i >= $f[0]->frecuencia) {
//                                echo "<br>";
//                                echo "paso y valia---------->".$i;
                                $fecha_deberia = $fecha_debe;
                                $fecha_debe = strtotime('+28 day', strtotime($fecha_debe));
                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                $fecha_debe = arregla_dia($fecha_debe);

                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($r->id_equipo, $r->tipo_equipo, $r->tipo_mantenimiento, $fecha_deberia, $fecha_debe);
                                $valor = "Mantenieminto no relaizado";
                                $id_detallle = $consultas->save_mantenimiento_detalle($id_cabecera, $r->id_item, $valor);

                                $i=$i-$f[0]->frecuencia;
                            }
                            //echo "----->".$dias_count;
                            break;
                    }
                } else {
                    $sibueno = "";
                }
            }
            ?>

        <?php  }}

    function calculadora($fecha_debe){
        //echo $fecha_debe;
        /***********************************/
        $now = time(); // or your date as well
        $your_date = strtotime($fecha_debe);
        $datediff = $now - $your_date;
        return floor($datediff/(60*60*24));
        /***********************************/
    }
    ?>


<?php
//exit;
$result = $consultas->getItemsMantenimeinto($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);
$número_dias = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')); //calcula la cantidad de dias  del maes

?>
<div style="display:none; border: 1px solid black; position: fixed; width: 55%; height:80%; margin-top: -150px; background: #FFF; " id="ventana_carga">
    <div class="modal-header">
        <button type="button" onclick="cierraModal()" class="close" data-dismiss="modal">×</button>
        <h4> Carga Mantenimiento  </h4>
    </div>
    <div style="background-color: white;">
        <h3>Observacion/Motivo de retraso</h3>
        <p>
            <textarea id="observaciones" style="width: 1253px; height: 197px;"></textarea>
            <input type="hidden" id="item">
            <input type="hidden" id="estado_mant">
            <br>
            Deberia Cargarse:
            <input type="text" readonly id="fecha_deberia">
            <br>
            Debe
            <input type="text" readonly id="fecha_debe">
        </p>
    </div>
    <div style="background-color: white;">
        <button type="button" onclick="guardarMantenimiento()" class="btn btn-success">Guardar Mantenimiento</button>
    </div>

</div>
<div style="display:none; border: 1px solid black; position: fixed; width: 50%; height:60%; margin-top: -150px; background: #FFF; " id="detalle_mantenimiento">
</div>
<table width="100%" class="sui-table">
    <tr>
        <td style="text-align: right">
            <a href="controlador.php?action=solicitud_mantenimiento&id_equipo=<?php echo  $_REQUEST['id_equipo']; ?>">
                <img src="img/correctivo.png" style="cursor: pointer;">Enviar Solicitud de Correctivos
            </a>
        </td>
    </tr>
</table>
<table class="sui-table">
        <thead>
        <tr style="background: red; color: white;"  >
            <th width="5%">Titulo</th>
             <th  width="5%">Frecuencia</th>
            <?php for ($i = 1; $i <= $número_dias; $i++) {
                echo "<th>";echo saber_dia($i)."<br> ".$i."</th>";
            }
            ?>
        </tr>
        </thead>
        <?php

        if($result){
            foreach ($result as $v) {
                $item=$v->id_registro;
                $icono = "<img src='img/line.png'>";
                $ultimo = $consultas->getMantenimientoUltimo($item, $_REQUEST['id_equipo']);
                ?>
                <tr style="height: 100px;   ">
                    <td><strong><?php echo $v->titulo; ?></strong><img onclick="ver_detalle_item(<?php echo $item;?>)" style="width: 20px; height: 20px; cursor: pointer;" src='img/mas_info.png'></td>
                    <td><strong><?php echo nombre_frecuencia($v->frecuencia); ?></strong></td>
                    <?php
                    $count_mantenimiento=0;
                    $nuevafecha=0;
                    $count_mantenimiento = $consultas->getMantenimientosByEquipoExistente($v->id_registro, $_REQUEST['tipo_mantenimiento'], $_REQUEST['id_equipo']);
                    ?>
                    <?php for ($i = 1; $i <= $número_dias; $i++) {
                        ($i==date('d'))?$color_hoy="#DDD":$color_hoy="#fff";
                        if ($i<10) { $fecha_bloke = "0".$i."-". date('m')."-".date('Y');}else{ $fecha_bloke = $i."-".date('m')."-".date('Y'); }
                        $fecha_filtro=substr($fecha_bloke, 6, 4)."-".substr($fecha_bloke, 3, 2)."-".substr($fecha_bloke, 0, 2);
                        /************buscar mantenieminto de equipos    *************/
//                    $cont_sol = $consultas->getCountSolicitudByIDEquipo($_REQUEST['id_equipo'],$fecha_filtro);
//                    if($cont_sol==0) {
//echo $v->frecuencia;
                        if ($count_mantenimiento == 0) {
                            //echo "hola";
                            switch ($v->frecuencia) {
                                case "1":
                                    $fecha_debe = strtotime('+1 day', strtotime($fecha_filtro));
                                    $fecha_debe = date('Y-m-j', $fecha_debe);
                                    $fecha_debe=arregla_dia($fecha_debe);
                                    $fecha_deberia = $fecha_filtro;
                                break;
                                case "7":
                                    $fecha_debe = strtotime('+7 day', strtotime($fecha_filtro));
                                    $fecha_debe = date('Y-m-j', $fecha_debe);
                                    $fecha_debe=arregla_dia($fecha_debe);
                                    $fecha_deberia = $fecha_filtro;
                                break;
                                case "15":
                                    $fecha_debe = strtotime('+14 day', strtotime($fecha_filtro));
                                    $fecha_debe = date('Y-m-j', $fecha_debe);
                                    $fecha_debe=arregla_dia($fecha_debe);
                                    $fecha_deberia = $fecha_filtro;
                                   break;
                                case "30":
                                    $fecha_debe = strtotime('+28 day', strtotime($fecha_filtro));
                                    $fecha_debe = date('Y-m-j', $fecha_debe);
                                    $fecha_debe=arregla_dia($fecha_debe);
                                    $fecha_deberia = $fecha_filtro;
                                    break;
                            }
                            if ($fecha_bloke == date('d-m-Y')) {
                                $icono = "<img src='img/menu_azul.png' style='cursor:pointer;'  onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")'>";

                            } else {
                                $icono = "<img src='img/line.png'>";
                            }
                        } else {
                            ////////*********tiiene algun mateniemineto ***********8//////
                           // echo $fecha_bloke;
                            if ($fecha_bloke == date('d-m-Y')) {
//echo "siii";
                                $Mto_del_Dia = $consultas->getMantenimientoEnDichaFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                switch ($v->frecuencia) {
                                    case "1":
                                        if ($Mto_del_Dia) {

                                            $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento_detalle.",".$_REQUEST['id_equipo'].")'>";
                                        } else {
                                                /////////////debe carcula fecha proxima///////////////
                                            $fecha_debe = strtotime('+1 day', strtotime($fecha_filtro));
                                            $fecha_debe = date('Y-m-j', $fecha_debe);
                                            $fecha_debe=arregla_dia($fecha_debe);
                                            $fecha_deberia = $fecha_filtro;
                                            $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                        }
                                        break;
                                    case "7":
                                        //echo $ultimo->fecha_debe;
//                                        exit;
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento_detalle.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR"){

                                                    if ($ultimo->fecha_debe>date('Y-m-d')){
                                                        $icono = "<img src='img/line.png'>";
                                                    }else {
                                                       $fecha_debe = strtotime('+7 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe = arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"NR\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/rojo.png'>";
                                                        $alert = "N";
                                                    }
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }

                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }

                                        } else {

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                ////////////////////////////
                                                $fecha_debe = strtotime('+7 day', strtotime($fecha_filtro));
                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                $fecha_debe=arregla_dia($fecha_debe);
                                                $fecha_deberia = $fecha_filtro;
                                                ///////////////////////////
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")' >";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+7 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "---<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        ////////////si no se hizo el ultimo mantenieminto ingresa aca
                                                        $fecha_filtro_u=substr($ultimo->fecha_debe, 8, 2)."-".substr($ultimo->fecha_debe, 5, 2)."-".substr($ultimo->fecha_debe, 0, 4);
                                                        //echo $fecha_filtro_u;
                                                        $ultimo_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_filtro_u, $_REQUEST['id_equipo']);
                                                        if ($ultimo_del_Dia) {
                                                            $icono = "<img src='img/line.png'>";
                                                        }else{

                                                            if($ultimo->fecha_debe>date('Y-m-d')){
                                                                $icono = "<img src='img/line.png'>";
                                                            }else{
                                                                $fecha_debe = strtotime('+7day', strtotime($ultimo->fecha_debe));
                                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                                $fecha_debe=arregla_dia($fecha_debe);
                                                                $fecha_deberia = $ultimo->fecha_debe;
                                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                            }
                                                        }
                                                    }

                                                }
                                            }
                                        }
//
                                        break;
                                        case "15":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR"){

                                                    if ($ultimo->fecha_debe>date('Y-m-d')){
                                                        $icono = "<img src='img/line.png'>";
                                                    }else {
                                                        $fecha_debe = strtotime('+14 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe = arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"NR\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/rojo.png'>";
                                                        $alert = "N";
                                                    }
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }

                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }

                                        } else {

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                ////////////////////////////
                                                $fecha_debe = strtotime('+14 day', strtotime($fecha_filtro));
                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                $fecha_debe=arregla_dia($fecha_debe);
                                                $fecha_deberia = $fecha_filtro;
                                                ///////////////////////////
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+14 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        ////////////si no se hizo el ultimo mantenieminto ingresa aca
                                                        $fecha_filtro_u=substr($ultimo->fecha_debe, 8, 2)."-".substr($ultimo->fecha_debe, 5, 2)."-".substr($ultimo->fecha_debe, 0, 4);
                                                        //echo $fecha_filtro_u;
                                                        $ultimo_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_filtro_u, $_REQUEST['id_equipo']);
                                                        if ($ultimo_del_Dia) {
                                                            $icono = "<img src='img/line.png'>";
                                                        }else{

                                                            if($ultimo->fecha_debe>date('Y-m-d')){
                                                                $icono = "<img src='img/line.png'>";
                                                            }else{
                                                                $fecha_debe = strtotime('+14day', strtotime($ultimo->fecha_debe));
                                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                                $fecha_debe=arregla_dia($fecha_debe);
                                                                $fecha_deberia = $ultimo->fecha_debe;
                                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                            }
                                                        }
                                                    }

                                                }
                                            }
                                        }
//
                                        break;
                                    case "30":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR"){

                                                    if ($ultimo->fecha_debe>date('Y-m-d')){
                                                        $icono = "<img src='img/line.png'>";
                                                    }else {
                                                        $fecha_debe = strtotime('+28 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe = arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"NR\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/rojo.png'>";
                                                        $alert = "N";
                                                    }
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }

                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }

                                        } else {

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                ////////////////////////////
                                                $fecha_debe = strtotime('+28 day', strtotime($fecha_filtro));
                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                $fecha_debe=arregla_dia($fecha_debe);
                                                $fecha_deberia = $fecha_filtro;
                                                ///////////////////////////
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+28 day', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        ////////////si no se hizo el ultimo mantenieminto ingresa aca
                                                        $fecha_filtro_u=substr($ultimo->fecha_debe, 8, 2)."-".substr($ultimo->fecha_debe, 5, 2)."-".substr($ultimo->fecha_debe, 0, 4);
                                                        //echo $fecha_filtro_u;
                                                        $ultimo_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_filtro_u, $_REQUEST['id_equipo']);
                                                        if ($ultimo_del_Dia) {
                                                            $icono = "<img src='img/line.png'>";
                                                        }else{

                                                            if($ultimo->fecha_debe>date('Y-m-d')){
                                                                $icono = "<img src='img/line.png'>";
                                                            }else{
                                                                $fecha_debe = strtotime('+28 day', strtotime($ultimo->fecha_debe));
                                                                $fecha_debe = date('Y-m-j', $fecha_debe);
                                                                $fecha_debe=arregla_dia($fecha_debe);
                                                                $fecha_deberia = $ultimo->fecha_debe;
                                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                            }
                                                        }
                                                    }

                                                }
                                            }
                                        }
//
                                        break;
                                    }
                            } else {

                                /*****************************/
                                //$ultimo = $consultas->getMantenimientoUltimo($item, $_REQUEST['id_equipo']);
                                $icono = "";

                                //echo $fecha_bloke."<br>";
                                $Mto_del_Dia = $consultas->getMantenimientoEnDichaFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                switch ($v->frecuencia) {
                                    case "1":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=='NR'){
                                                $icono = "<img src='img/rojo.png'>";
                                            }else{
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(" . $Mto_del_Dia->id_mantenimiento_detalle . "," . $_REQUEST['id_equipo'] . ")'>";
                                            }
                                        } else {
                                            $icono = "<img src='img/rojo.png'>";
                                        }
                                        if ($fecha_filtro > date('Y-m-d')) {
                                            $icono = "<img src='img/menu_azul.png'>";
                                        }
                                        //$fecha_filtro=substr($fecha_bloke, 6, 4)."-".substr($fecha_bloke, 3, 2)."-".substr($fecha_bloke, 0, 2);
                                        break;
                                    case "7":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento_detalle.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR") {
                                                    $icono = "<img src='img/rojo.png'>";
                                                }else{

                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento_detalle.",".$_REQUEST['id_equipo'].")'>";
                                                }
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento_detalle.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+7 day', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechas($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$Mto_entre_fechas->id_mantenimiento.",".$_REQUEST['id_equipo'].")'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '1', $ultimo->fecha_debe, $fechaFutura);
                                                                $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $item, "No se realizo");
                                                                $icono = "<img src='img/rojo.png'>";
                                                            }else{
                                                                $icono = "<img src='img/menu_azul.png'>";
                                                            }
                                                        }

                                                        //$alert = "S";
                                                    }
                                                }
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$Mto_del_Dia->id_mantenimiento.",".$_REQUEST['id_equipo'].")'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }

                                        break;
                                    case "15":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR") {
                                                    $icono = "<img src='img/rojo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+14 day', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechas($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '1', $ultimo->fecha_debe, $fechaFutura);
                                                                $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $item, "No se realizo");
                                                                $icono = "<img src='img/rojo.png'>";
                                                            }else{
                                                                $icono = "<img src='img/menu_azul.png'>";
                                                            }
                                                        }

                                                        //$alert = "S";
                                                    }
                                                }
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'  onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                        break;
                                    case "30":
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                if($Mto_del_Dia->en_termino=="NR") {
                                                    $icono = "<img src='img/rojo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+28 day', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechas($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '1', $ultimo->fecha_debe, $fechaFutura);
                                                                $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $item, "No se realizo");
                                                                $icono = "<img src='img/rojo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                            }else{
                                                                $icono = "<img src='img/menu_azul.png'>";
                                                            }
                                                        }

                                                        //$alert = "S";
                                                    }
                                                }
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFecha($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                        break;
                                }


                            }

                        }
//                    }else{
//                        $icono = "<img src='img/gris.png'>";
//                    }
                        /*************************/
                        if(saber_dia($i)=='D'){$color_hoy="#000";}
                        if(saber_dia($i)!='D'){
                            echo "<td style=' text-align: center;  background-color: ".$color_hoy." '>".$icono."</td>";
                        }else{
                            echo "<td style=' text-align: center;  background-color: ".$color_hoy." '>&nbsp;</td>";
                        }
                        //echo $i;
                    }
                    ?>
                </tr>
                <tr id="item_<?php echo $item; ?>" style="display: none; background: white; border: 2px solid black">
                    <td colspan="<?php echo $número_dias+1; ?>"><?php echo nl2br($v->descripcion); ?></td>
                    <td>
                        <img onclick="cierre_detalle_item(<?php echo $item;?>)" style="width: 20px; height: 20px; cursor: pointer;" src='img/delete.png'>
                    </td>
                </tr>
                <?php
            }?>

        <?php }else{?>
            <tr>
                <td colspan="3">No contiene item</td>
            </tr>
            <?php
        }
        ?>

</table>
<?php
 function nombre_frecuencia($frecuencian){
     switch ($frecuencian) {
         case "7": $frecuencia="Semanal"; break;
         case "1": $frecuencia="Diario"; break;
         case "15": $frecuencia="Quincena"; break;
         case "30": $frecuencia="Mensual"; break;
         case "90": $frecuencia="Trimestral"; break;
         case "180": $frecuencia="Semestral"; break;
         case "365": $frecuencia="Anual"; break;
         case "88": $frecuencia="Previo Uso"; break;
         case "99": $frecuencia="Posterior Uso"; break;
     }
     return $frecuencia;
 }

function saber_dia($dia) {
//echo $nombredia;
        if ($dia<10) {
            $fecha = "0" . $dia . "-" . date('m') . "-" . date('Y'); //5 agosto de 2004 por ejemplo
        }else{
            $fecha = $dia . "-" . date('m') . "-" . date('Y'); //5 agosto de 2004 por ejemplo
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

    function ver_detalle_item(value){
        // alert('hola');
        $("#item_"+value).show();
    }
    function cierre_detalle_item(value){
        $("#item_"+value).hide();
    }
</script>
