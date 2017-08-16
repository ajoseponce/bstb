<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getMantenimientosActualizar();

?>
<table>

    <tr style="background: red;" >
        <th>id Equipo</th>
        <th>id tipo euipo</th>
        <th>tipo mantenieminto</th>
        <th>fecha relaizo</th>
        <th>estado</th>
        <th>fecha deberia</th>
        <th>fecha debe</th>
        <th>item</th>
        <th>Tiene</th>
    </tr>

    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            if($r->fecha_debe<date('Y-m-d')) {
                $tiene = $consultas->getDebeActualizar($r->fecha_debe, $r->id_equipo, $r->tipo_mantenimiento, $r->id_item);
                if ($tiene == 0) {
                    $f = $consultas->getItemsMantenimeinto($r->tipo_equipo, $r->tipo_mantenimiento,$r->id_item);
                    $contador++;
                    //echo "frecuencia".$f[0]->frecuencia;
                    switch ($f[0]->frecuencia) {
                        case "1":
                            $fecha_debe = strtotime('+1 day', strtotime($r->fecha_debe));
                            break;
                        case "7":
                            $fecha_debe = strtotime('+7 day', strtotime($r->fecha_debe));
                            break;
                        case "15":
                            $fecha_debe = strtotime('+14 day', strtotime($r->fecha_debe));
                            break;
                        case "30":
                            $fecha_debe = strtotime('+28 day', strtotime($r->fecha_debe));
                            break;
                    }
                    //$fecha_debe = strtotime('+7 day', strtotime($r->fecha_debe));
                    $fecha_debe = date('Y-m-j', $fecha_debe);
                    $fecha_debe = arregla_dia($fecha_debe);
                    $fecha_deberia = $r->fecha_debe;
                    $sibueno = "deberia " . $fecha_deberia . " debe tener " . $fecha_debe;

                    $id_cabecera = $consultas->save_mantenimiento_cabecera_manual($r->id_equipo, $r->tipo_equipo, $r->tipo_mantenimiento, $fecha_deberia, $fecha_debe);
                    $valor = "Mantenieminto no relaizado";
                    $id_detallle = $consultas->save_mantenimiento_detalle($id_cabecera, $r->id_item, $valor);

                } else {
                    $sibueno = "";
                }
            }
            ?>
            <tr>
                <td><?php echo $r->id_equipo; ?></td>
                <td><?php echo $r->tipo_equipo; ?></td>
                <td><?php echo $r->tipo_mantenimiento; ?></td>
                <td><?php echo $r->fecha; ?></td>
                <td><?php echo $r->en_termino; ?></td>
                <td><?php echo $r->fecha_deberia; ?></td>
                <td><?php echo $r->fecha_debe; ?></td>
                <td><?php echo $r->id_item; ?></td>
                <td><?php echo $sibueno; ?></td>
            </tr>

        <?php  }} ?>
    <tr>

        <td><?php echo $contador; ?></td>
    </tr>
</table>

<?php
function arregla_dia($fecha){
    $cadena=explode("-", $fecha);
    if ($cadena[2]<10) {
        $fecha = $cadena[0]. "-" . $cadena[1] . "-0" . $cadena[2]; //5 agosto de 2004 por ejemplo
    }
    return $fecha;
}
?>
