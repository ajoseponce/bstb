<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$tot = $consultas->getNoConformidadByFiltroEstadistico($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['estado'],$_REQUEST['tipo'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);
$nuevos = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'N');
$asignados = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'As');
$respondidos = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'R');
$validados = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'V');
$cerrados = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'C');
$anulados = $consultas->getNoConformidadByFiltroReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'A');
//origenes
$bstb = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'e');
$interna = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'ai');
$externa = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'ae');
$proveedor = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'p');
$reclamo = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'r');
$sth = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],'st');
$sin_origen = $consultas->getNoConformidadByOrigenReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);

$sector = $consultas->getNoConformidadBySectorReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);
$procesos = $consultas->getNoConformidadByProcesoReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);

$total=count($tot);
function porcentaje($total, $parte, $redondear = 2) {
    return round($parte / $total * 100, $redondear);
}
?>
<table class="table">
    <thead>
    <tr style="background: red;" ><th colspan="7">Resultados totales <?php echo $total; ?> </th></tr>
    </thead>
    <tbody>
    <tr>
        <td>&nbsp;</td>
        <td>Abierto</td>
        <td>Derivados</td>
        <td>Respondidos/Tratados</td>
        <td>Implementado</td>
        <td>Cerrados</td>
        <td>Anulados</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><?php echo $nuevos." (".porcentaje($total, $nuevos, 0) . "%)"; ?></td>
        <td><?php echo $asignados." (".porcentaje($total, $asignados, 0) . "%)"; ?></td>
        <td><?php echo $respondidos." (".porcentaje($total, $respondidos, 0) . "%)"; ?></td>
        <td><?php echo $validados." (".porcentaje($total, $validados, 0) . "%)"; ?></td>
        <td><?php echo $cerrados." (".porcentaje($total, $cerrados, 0) . "%)"; ?></td>
        <td><?php echo $anulados." (".porcentaje($total, $anulados, 0) . "%)"; ?></td>
    </tr>
    </tbody>
</table>
<div id="container" style="height: 400px"></div>
<div id="container_por_origen" style="height: 400px"></div>
<div id="container_por_sector" style="height: 400px"></div>
<div id="container_por_proceso" style="height: 400px"></div>
<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Reporte de No Conformidades'
            },
            subtitle: {
                text: 'Banco de Sangre Central de la provinciaa de misiones'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            colors: ['red', '#FCB153', '#EBDC8B', '#929CBF', '#7DCBB5',
                '#E0E0E0'],
            series: [{
                name: 'Hallazgos',
                data: [
                    ['Nuevas -><?php echo $nuevos; ?>', <?php echo $nuevos; ?>],
                    ['Derivadas -> <?php echo $asignados; ?>',  <?php echo $asignados; ?>],
                    ['Respondidas/Tratadas -> <?php echo $respondidos; ?>',  <?php echo $respondidos; ?>],
                    ['Implementada -><?php echo $validados; ?>',  <?php echo $validados; ?>],
                    ['Cerrada -> <?php echo $cerrados; ?>',  <?php echo $cerrados; ?>],
                    ['Anulada -> <?php echo $anulados; ?>', <?php echo $anulados ?>]

                ]
            }]
        });
        $('#container_por_origen').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Nro Hallazgos por origenes'
            },
            subtitle: {
                text: 'Banco de Sangre Central de la provinciaa de misiones'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            colors: ['red', 'blue', 'green', '#FF9900', '#7DCBB5',
                'black'],
            series: [{
                name: 'Por Origen',
                data: [
                    ['Espontaneas Bstb -> <?php echo $bstb; ?>', <?php echo $bstb; ?>],
                    ['Auditorias Int -> <?php echo $interna; ?>',  <?php echo $interna; ?>],
                    ['Auditorias Ext -> <?php echo $externa; ?>',  <?php echo $externa; ?>],
                    ['Proveedor  -> <?php echo $proveedor; ?>',  <?php echo $proveedor; ?>],
                    ['Reclamo de Parte Interesado -> <?php echo $reclamo; ?>',  <?php echo $reclamo; ?>],
                    ['Sin Origen -> <?php echo $sin_origen; ?>',  <?php echo $sin_origen; ?>],
                    ['STH -> <?php echo $sth; ?>', <?php echo $sth ?>]

                ]
            }]
        });
        $('#container_por_sector').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Nro Hallazgos por sector'
            },
            subtitle: {
                text: 'Banco de Sangre Central de la provinciaa de misiones'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
//                colors: ['red', 'blue', 'green', '#FF9900', '#7DCBB5',
//                    'black'],
            series: [{
                name: 'Por Secttor',
                data: [
                    <?php foreach($sector as $s){
                    echo "['".$s->sector." -> ".$s->total."' , ".$s->total."],";
                } ?>


                ]
            }]
        });
        $('#container_por_proceso').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Nro Hallazgos por Procesos'
            },
            subtitle: {
                text: 'Banco de Sangre Central de la provincia de misiones'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
//                colors: ['red', 'blue', 'green', '#FF9900', '#7DCBB5',
//                    'black'],
            series: [{
                name: 'Por Secttor',
                data: [
                    <?php foreach($procesos as $p){
                    echo "['".$p->proceso." -> ".$p->total."' , ".$p->total."],";
                } ?>


                ]
            }]
        });
    });
</script>