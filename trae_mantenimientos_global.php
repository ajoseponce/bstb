<?php
session_start();
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getEquiposFiltros($_REQUEST);
echo  "mostrar fecha de filtro".$_REQUEST['fecha_desde'];
?>
<table class="table">

        <tr style="background: red;" >
          <th>&nbsp;</th>
            <th style="width: 20px;">Tipo/Numero</th>
            <th style="width: 15px;">Equipo</th>
            <th style="width: 15px;">Personas Asignadas</th>
            <th style="width: 105px;">Frecuencia</th>
            <th style="width: 45px;">Dias S/M</th>
            <th style="width: 85px;">Descripcion</th>
            <th style="width: 85px; ">Fecha Ult. Mant.</th>
            <th style="width: 85px;">Fecha Prox. Mant.</th>
        </tr>

    <tbody>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
        $asignado=$consultas->getPersonasEquipo($r->id_equipo);
        $mantenimientos=$consultas->getMantenimientosEquipo($r->id_equipo);

    ?>
        <tr>

          <td style="width: 5px !important;"><?php echo $r->id_equipo; ?></td>
            <td style="width: 15px !important;"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td style="width: 15px !important;"><?php echo $r->equipo; ?></td>
            <td style="width: 15px;">
                <?php if($asignado){
                  foreach ($asignado as $r) {
                      echo $r->nombre."<br>";
                  }
                }else{ echo "No contiene personas asignadas"; }
                ?>
            </td>
            <td colspan="6">
              <table class="table">

              <?php
              if($mantenimientos){
                    foreach ($mantenimientos as $m) {
                      switch ($m->frecuencia) {
                          case "7": $frecuencia="Semanal"; break;
                          case "1": $frecuencia="Diario"; break;
                          case "15": $frecuencia="Quincena"; break;

                      }
                        echo "<tr>";
                        if($m->titulo!="N/A"){
                        $ultimo_pn=$consultas->getUltimoMantenimientoPnEquipo($r->id_equipo, $m->id_registro);
                        echo "<td style='width: 45px;'>".$frecuencia."</td>";
                        ///££££££££££££££contado
                        $contador=0;
                        $porciones = explode("/", $_REQUEST['fecha_desde']);
                        $fecha_desde=$porciones[2]."-".$porciones[1]."-".$porciones[0];
                        $porciones = explode("/", $_REQUEST['fecha_hasta']);
                        $fecha_hasta=$porciones[2]."-".$porciones[1]."-".$porciones[0];

                        if($m->frecuencia==1){
                            $fechaInicio=strtotime($fecha_desde);
                            $fechaFin=strtotime($fecha_hasta);
                            for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                    $dia=date("N",$i);
                                    if ($dia!=6 && $dia!=7) { $contador+=1; }
                            }
                        }
                        if($m->frecuencia==7){
                          $datetime1 = new DateTime($fecha_desde);
                          $datetime2 = new DateTime($fecha_hasta);
                          $interval = $datetime1->diff($datetime2);
                          $contador=floor(($interval->format('%a') / 7));
                        }
                          $contador_mantenimientos=$consultas->getMantenimientoEntreFechasGlobal($m->id_registro, $fecha_desde, $r->id_equipo, $fecha_hasta);
                          //  echo "mateniemintos-->".count($contador_mantenimientos);
                        echo "<td>".count($contador_mantenimientos)."/".$contador."</td>";
                        ///////////
                        echo "<td>".$m->titulo."</td>";
                        //////////////////////-------------
                        echo "<td> "; echo ($ultimo_pn->fecha_formato)?$ultimo_pn->fecha_formato:"S/D"; echo "</td>";

                        echo "<td> "; echo ($ultimo_pn->fecha_debe_formato)?$ultimo_pn->fecha_debe_formato:"S/D"; echo "</td>";
                          echo "<td> "; echo ($ultimo_pn->fecha_debe>date('Y-m-d'))?"<img style='white:22px;' src='img/validar.png'>":"<img src='img/caution.gif'>"; echo "</td>";
                        }else{
                          echo "No de realiza mantenimiento";
                        }
                        //}
                        echo "</tr>";
                    }
              }else{ echo "No contiene ITEMS"; }
              ?>
          </table>
            </td>
        </tr>

    <?php  }?>
        <tr style="background: red;">
            <td colspan="13" style="color: #fff;
    padding-bottom: 10px;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 14px;
    font-size: 16px;
    font-weight: bold;">
                Total de Equipo: <?php echo count($result); ?>
            </td>
        </tr>
        <?php
    } ?>
    </tbody>

</table>
