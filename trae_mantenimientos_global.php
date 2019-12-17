<?php
session_start();
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getEquiposFiltros($_REQUEST);

?>
<table class="table">
    <thead>
        <tr style="background: red;" >
          <th>&nbsp;</th>
            <th>Tipo/Numero</th>
            <th style="width: 35px;">Equipo</th>

            <th style="width: 45px;">Personas Asignadas</th>
<th style="width: 45px;"></th>

        </tr>
    </thead>
    <tbody>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
        $asignado=$consultas->getPersonasEquipo($r->id_equipo);
        $mantenimientos=$consultas->getMantenimientosEquipo($r->id_equipo);

    ?>
        <tr>

          <td class="span1 text-left"><?php echo $r->id_equipo; ?></td>
            <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td class="span1 text-left"><?php echo $r->equipo; ?></td>
            <td>
                <?php if($asignado){
                  foreach ($asignado as $r) {
                      echo $r->nombre."<br>";
                  }
                }else{ echo "No contiene personas asignadas"; }
                ?>
            </td>
            <td>
              <table class="table">
                <th style="width: auto;">Frecuencia</th>
                <th style="width: auto;">Dias Sin Mantenimiento</th>
                <th style="width: auto;">Descripcion</th>
                <th style="width: auto;">Fecha Ult. Mant.</th>
                <th style="width: auto;">Fecha Prox. Mant.</th>
              <?php
              if($mantenimientos){
                    foreach ($mantenimientos as $m) {
                      switch ($m->frecuencia) {
                          case "7": $frecuencia="Semanal"; break;
                          case "1": $frecuencia="Diario"; break;
                          case "15": $frecuencia="Quincena"; break;
                          case "30": $frecuencia="Mensual"; break;
                          case "90": $frecuencia="Trimestral"; break;
                          case "180": $frecuencia="Semestral"; break;
                          case "365": $frecuencia="Anual"; break;
                      }
                        echo "<tr>";
                        if($m->titulo!="N/A"){
                        $ultimo_pn=$consultas->getUltimoMantenimientoPnEquipo($r->id_equipo, $m->id_registro);
                        echo "<td>".$frecuencia."</td>";
                        ///££££££££££££££contado
                        echo "<td>".$contador."</td>";
                        ///////////
                        echo "<td>".$m->titulo."</td>";
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
