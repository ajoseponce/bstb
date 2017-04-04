<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getEquiposFiltros($_REQUEST);

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=listado_equipos.xls");
header("Pragma: no cache");
header("Expires: 0");
?>
<table>

    <tr style="background: red;" >
        <th>Tipo/Numero</th>
        <th>Equipo</th>
        <th>Ubicaci&oacute;n</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Nro Serie</th>
        <th>Representante</th>
        <th>Direccion</th>
        <th>Telefono</th>
    </tr>

    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            ?>
            <tr>
                <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
                <td class="span1 text-left"><?php echo $r->equipo; ?></td>
                <td><?php echo $r->lugar_nombre; ?></td>
                <td><?php echo $r->nombre_marca; ?></td>
                <td><?php echo $r->modelo; ?></td>
                <td><?php echo $r->nro_serie; ?></td>

                <td><?php echo $r->proveedor_nombre; ?></td>
                <td><?php echo $r->direccion; ?></td>
                <td><?php echo $r->telefono; ?></td>
            </tr>

        <?php  }} ?>

</table>