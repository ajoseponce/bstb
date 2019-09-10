<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 22/08/2016
 * Time: 04:22 PM
 */

include('lib/DB_Conectar.php');
include('classes/consultas.php');
/*print_r($_REQUEST);
exit;*/
$result = $consultas->getItemsMantenimeinto($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);
?>
<table width="100%" class="sui-table">
    <tr>
        <td style="text-align: right">
            <a href="controlador.php?action=solicitud_mantenimiento&id_equipo=<?php echo  $_REQUEST['id_equipo']; ?>">
                <img src="img/correctivo.png" style="cursor: pointer;">Enviar Solicitud de Correctivo
            </a>
        </td>
    </tr>
</table>
<table class="sui-table">
    <thead>
    <tr style="background: red; color: white;"  >
        <th width="5%">Titulo</th>
        <th  width="5%">Frecuencia</th>
        <?php for ($i = 1; $i <= 12; $i++) {
            echo "<th>";echo saber_mes($i)."</th>";
        }
        ?>
    </tr>
    </thead>
    <?php
    if($result){
        foreach ($result as $v) {
            $item=$v->id_registro;
            $icono = "<img src='img/line.png'>";
            $ultimo = $consultas->getMantenimientoPrevUltimo($item, $_REQUEST['id_equipo']);
            ?>
            <tr style="height: 100px;   ">
                <td><strong><?php echo $v->titulo; ?></strong><img onclick="ver_detalle_item(<?php echo $item;?>)" style="width: 20px; height: 20px; cursor: pointer;" src='img/mas_info.png'></td>
                <td><strong><?php echo nombre_frecuencia($v->frecuencia); ?></strong></td>
                <?php
                $count_mantenimiento_prev=0;
                $nuevafecha=0;
                $count_mantenimiento_prev = $consultas->getMantenimientosByEquipoExistentePreventivo($v->id_registro, $_REQUEST['tipo_mantenimiento'], $_REQUEST['id_equipo']);
                ?>
                <?php for ($i = 1; $i <= 12; $i++) {

                    ($i==date('m'))?$color_hoy="#DDD":$color_hoy="#fff";
                    /************buscar mantenieminto de equipos    *************/
                    if ($i<10) { $fecha_bloke = "0".$i."-". date('Y'); }else{ $fecha_bloke = $i."-".date('Y'); }
                    $fecha_filtro=substr($fecha_bloke, 3, 4)."-".substr($fecha_bloke, 0, 2)."-".date('d');
                   // echo $fecha_bloke."</br></br></br>";
                        if ($count_mantenimiento_prev == 0) {
                                switch ($v->frecuencia) {
                                    case "30":
                                        $fecha_debe = strtotime('+1 month', strtotime($fecha_filtro));
                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                        $fecha_debe=arregla_dia($fecha_debe);
                                        $fecha_deberia = $fecha_filtro;
                                        break;
                                    case "60":
                                        $fecha_debe = strtotime('+2 month', strtotime($fecha_filtro));
                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                        $fecha_debe=arregla_dia($fecha_debe);
                                        $fecha_deberia = $fecha_filtro;
                                        break;
                                    case "90":
                                        $fecha_debe = strtotime('+3 month', strtotime($fecha_filtro));
                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                        $fecha_debe=arregla_dia($fecha_debe);
                                        $fecha_deberia = $fecha_filtro;
                                        break;
                                    case "180":
                                        $fecha_debe = strtotime('+6 month', strtotime($fecha_filtro));
                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                        $fecha_debe=arregla_dia($fecha_debe);
                                        $fecha_deberia = $fecha_filtro;
                                        break;
                                    case "365":
                                        $fecha_debe = strtotime('+12 month', strtotime($fecha_filtro));
                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                        $fecha_debe=arregla_dia($fecha_debe);
                                        $fecha_deberia = $fecha_filtro;
                                        break;
                                }
                                if ($fecha_bloke == date('m-Y')){
                                    $icono = "<img src='img/menu_azul.png' style='cursor:pointer;'  onclick='verModal(" . $item . ",\"R\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")'>";
//echo "--";
                                } else {
                                    $icono = "<img src='img/line.png'>";
                                }
                        } else {
                            ////////*********tiiene algun mateniemineto ***********8//////

                            if ($fecha_bloke == date('m-Y')) {
                                   // echo "unave";
                                $Mto_del_Dia = $consultas->getMantenimientoEnDichoPeriodo($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                switch ($v->frecuencia) {
                                    case "30":
                                        //echo "si";
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                $icono = "<img src='img/line.png'>";
                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+1 month', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        $icono = "<img src='img/line.png'>";
                                                    }

                                                }
                                            }
                                        }
                                        break;
                                    case "60":
                                        //echo "si";
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                $icono = "<img src='img/line.png'>";
                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+2 month', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        $icono = "<img src='img/line.png'>";
                                                    }

                                                }
                                            }
                                        }
                                    break;
                                    case "90":
                                    //echo "si";
                                    if ($Mto_del_Dia) {
                                        if($Mto_del_Dia->en_termino=="R"){
                                            $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                        }else{
                                            $icono = "<img src='img/line.png'>";
                                            //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                        }
                                    } else {
                                        $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                        if ($Mto_del_Dia) {
                                            $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\")' data-toggle='modal' src='img/menu_azul.png'>";
                                        }else{
                                            $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                $icono = "<img src='img/amarillo.png'>";
                                            }else{

                                                if($alert=="S"){
                                                    $fecha_debe = strtotime('+3 month', strtotime($ultimo->fecha_debe));
                                                    $fecha_debe = date('Y-m-j', $fecha_debe);
                                                    $fecha_debe=arregla_dia($fecha_debe);
                                                    $fecha_deberia = $ultimo->fecha_debe;
                                                    $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                    $alert="N";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }

                                            }
                                        }
                                    }
                                    break;
                                    case "180":
                                        //echo "si";
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                $icono = "<img src='img/line.png'>";
                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+6 month', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        $icono = "<img src='img/line.png'>";
                                                    }

                                                }
                                            }
                                        }
                                        break;
                                    case "365":
                                        //echo "si";
                                        if ($Mto_del_Dia) {
                                            if($Mto_del_Dia->en_termino=="R"){
                                                $icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }else{
                                                $icono = "<img src='img/line.png'>";
                                                //$icono = "<img src='img/verde.png' style='cursor=pointer;' onclick='ver_detalle_mantenimiento(".$item.",".$_REQUEST['id_equipo'].")'>";
                                            }
                                        } else {
                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"R\")' data-toggle='modal' src='img/menu_azul.png'>";
                                            }else{
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{

                                                    if($alert=="S"){
                                                        $fecha_debe = strtotime('+12 month', strtotime($ultimo->fecha_debe));
                                                        $fecha_debe = date('Y-m-j', $fecha_debe);
                                                        $fecha_debe=arregla_dia($fecha_debe);
                                                        $fecha_deberia = $ultimo->fecha_debe;
                                                        $icono = "<img style='cursor:pointer;' href='#modal-regular' onclick='verModal(" . $item . ",\"RF\",\"" . $fecha_deberia . "\",\"" . $fecha_debe . "\")' data-toggle='modal' src='img/menu_azul.png'>";
                                                        $alert="N";
                                                    }else{
                                                        $icono = "<img src='img/line.png'>";
                                                    }

                                                }
                                            }
                                        }
                                        break;
                                }
                            } else {
//echo "-hola";
                                $icono = "";
                                $Mto_del_Dia = $consultas->getMantenimientoEnDichoPeriodo($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                switch ($v->frecuencia) {
                                    case "30":
                                        if ($Mto_del_Dia) {
                                            $icono = "<img src='img/verde.png'>";
                                        } else {
                                            $icono = "<img src='img/rojo.png'>";
                                        }
                                        if ($fecha_filtro > date('Y-m-d')) {
                                            $icono = "<img src='img/menu_azul.png'>";
                                        }
                                        //$fecha_filtro=substr($fecha_bloke, 6, 4)."-".substr($fecha_bloke, 3, 2)."-".substr($fecha_bloke, 0, 2);
                                        break;
                                    case "60":

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

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+2 month', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechasPrev($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '2', $ultimo->fecha_debe, $fechaFutura);
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
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                    break;
                                    case "90":
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

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+3 month', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechasPrev($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '2', $ultimo->fecha_debe, $fechaFutura);
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
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                        break;
                                    case "180":
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

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+6 month', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechasPrev($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '2', $ultimo->fecha_debe, $fechaFutura);
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
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                        break;
                                    case "365":
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

                                            $Mto_del_Dia = $consultas->getMantenimientoDebeTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                            if ($Mto_del_Dia) {
                                                if($Mto_del_Dia->fecha_debe_sf < date('Y-m-d')) {
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item,$fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {
                                                        $icono = "<img src='img/caution.gif'>";
                                                        $alert = "S";
                                                    }
                                                }else{
                                                    $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                    if ($Mto_del_Dia) {
                                                        $icono = "<img src='img/amarillo.png'>";
                                                    }else {

                                                        $fechaFutura = strtotime('+12 month', strtotime($ultimo->fecha_debe));
                                                        $fechaFutura = date('Y-m-j', $fechaFutura);
                                                        $Mto_entre_fechas = $consultas->getMantenimientoEntreFechasPrev($item, $ultimo->fecha_debe, $_REQUEST['id_equipo'], $fechaFutura);
                                                        if ($Mto_entre_fechas) {
                                                            $icono = "<img src='img/amarillo.png'>";
                                                        }else{
                                                            if($Mto_del_Dia->fecha_debe_sf>date('Y-m-d')) {
                                                                $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($_REQUEST['id_equipo'], $_REQUEST['tipo_equipo'], '2', $ultimo->fecha_debe, $fechaFutura);
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
                                                $Mto_del_Dia = $consultas->getMantenimientoDeberiaTenerFechaPrev($item, $fecha_bloke, $_REQUEST['id_equipo']);
                                                if ($Mto_del_Dia) {
                                                    $icono = "<img src='img/amarillo.png'>";
                                                }else{
                                                    $icono = "<img src='img/line.png'>";
                                                }
                                            }
                                        }
                                        break;


                                }


                            }
                            //$fecha_ultimo = $consultas->getUltimoMatenimiento($_REQUEST['id_equipo'],$item);
                            //$icono = "<img src='img/menu_opciones.png'>";
                        }

                    /*************************/

                        echo "<td style=' text-align: center;  background-color: ".$color_hoy." '>".$icono."</td>";

                    //echo $i;
                }
                ?>
            </tr>
            <tr id="item_<?php echo $item; ?>" style="display: none; background: white; border: 2px solid black">
                <td colspan="12"><?php echo nl2br($v->descripcion); ?></td>
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
        case "60": $frecuencia="Bimensual"; break;
        case "90": $frecuencia="Trimestral"; break;
        case "180": $frecuencia="Semestral"; break;
        case "365": $frecuencia="Anual"; break;
        case "88": $frecuencia="Previo Uso"; break;
        case "99": $frecuencia="Posterior Uso"; break;
    }
    return $frecuencia;
}

function saber_mes($mes) {

    switch ($mes){

        case 1: return "Enero"; break;
        case 2: return "Febrero"; break;
        case 3: return "Marzo"; break;
        case 4: return "Abril"; break;
        case 5: return "Mayo"; break;
        case 6: return "Junio"; break;
        case 7: return "Julio"; break;
        case 8: return "Agosto"; break;
        case 9: return "Septiembre"; break;
        case 10: return "Octubre"; break;
        case 11: return "Noviembre"; break;
        case 12: return "Diciembre"; break;

    }
    //return $frecuencia;
}
function convierte_anio_mes($fecha) {

    $fecha_filtro=substr($fecha, 0, 4)."-".substr($fecha, 5, 2);
    return $fecha_filtro;
}
//(cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 0 );
?>
<div style="display:none; border: 1px solid black; position: fixed; width: 50%; height:80%; margin-top: -400px; background: #FFF; " id="ventana_carga">
    <div class="modal-header">
        <button type="button" onclick="cierraModal()" class="close" data-dismiss="modal">×</button>
        <h4> Carga Mantenimiento  Preventivo</h4>
    </div>

    <form enctype="multipart/form-data" id="formuploadajax" method="post">
        <h3>Observacion/Motivo de retraso</h3>
        <p><textarea id="observaciones"  name="observaciones" style="width: 1253px; height: 197px;"></textarea></p>
        <input  type="file" id="archivo" name="archivo"/>

        <br /><br /><br />
        <input type="hidden" id="estado_mant" name="estado_mant">
        <input type="hidden" id="id_equipo" name="id_equipo" value="<?php echo $_REQUEST[id_equipo] ?>">
        <input type="hidden" id="tipo_equipo" name="tipo_equipo" value="<?php echo $_REQUEST[tipo_equipo] ?>">
        <input type="hidden" id="tipo" value="2" name="tipo">
        <input type="hidden" id="item" value="" name="item">
        <input type="hidden" id="fecha_deberia" name="fecha_deberia">
        <input type="hidden" id="fecha_debe" name="fecha_debe">

        <input type="submit" class="btn btn-success" value="Guardar"/>
    </form>
    <div id="mensaje"></div>
</div>
<div style="display:none; border: 1px solid black; position: fixed; width: 50%; height:50%; margin-top: -50px; background: #FFF; " id="detalle_mantenimiento"></div>
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
    function  ver_detalle_mantenimiento(mantenimiento,equipo){
        $("#detalle_mantenimiento").show();
        
        $("#detalle_mantenimiento").load('trae_detalle_mantenimiento.php?equipo='+equipo+'&mantenimiento='+mantenimiento);
    }
</script>
<script>
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                    url: "recibe_mantenimiento.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res){
                    cierraModal();
                    buscar_item_matenimiento();
                    //$("#mensaje").html("Respuesta: " + res);
                });
        });
    });
</script>
