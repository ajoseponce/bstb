<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 13/09/2016
 * Time: 02:59 PM
 *
 */
$tot = $consultas->getNoConformidadByFiltro($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);

$sector = $consultas->getNoConformidadBySectorReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);
$procesos = $consultas->getNoConformidadByProcesoReporte($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);

$total=count($tot);
function porcentaje($total, $parte, $redondear = 2) {
    return round($parte / $total * 100, $redondear);
}
?>
<script src="js/graft/highcharts.js"></script>
<script src="js/graft/highcharts-3d.js"></script>
<script src="js/graft/exporting.js"></script>
<div id="page-content">

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Reporte Estadistico</h4>
        </div>
        <div class="block-content">
            <table class="table">
                <thead>
                <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
                </thead>
                <tbody>
                <tr>

                    <td>
                        Procesos:
                        <input  id="proceso"  name="proceso" style="width: 400px;"  class="input-large" value="" type="text">
                        <input  id="procesoID"  name="procesoID" type="hidden" value="">
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpiar_proceso()">
                    </td>
                </tr>

                </tbody>
            </table>
            <div id="listado"> </div>
        </div>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script>

    function limpiar_proceso(){
        $("#proceso").val('');
        $("#procesoID").val('');
        trae_reporte_competencia();
    }
    //inicializa los popover

</script>
<script src="js/funciones.js"></script>
<script type="text/javascript">
    newSuggestFiltroReporteCompe('proceso', 'procesoID', 'S');
</script>

<?php include_once 'footer.php' ?>

