
<script src="js/jquery-ui.js"></script>
<div id="page-content" >

<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Mantenimientos de Equipos</h4>
    </div>
<div class="block-content">
    <?php // echo $cartel; ?>
<table class="table">
    <thead>
        <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
    </thead>
    <tbody>
        <tr>
            <td>
               Ubicacion:
                <input  id="lugar" type="text" style="width: 350px; " name="lugar" value="<?php echo $_REQUEST['lugar_filtro_texto'];  ?>">
                <input id="lugar_filtro" value="<?php echo $_REQUEST['lugar_filtro'];  ?>" type="hidden" name="lugar_filtro">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_lugar()">
            </td>
            <td>
                Sector:
                <input id="sector_filtro"  type="text" style="width: 350px; " name="sector_filtro" value="<?php echo $_REQUEST['sector_filtro'];  ?>">
                <input id="sector_filtroID" value="<?php echo $_REQUEST['sector_filtroID'];  ?>" type="hidden" name="sector_filtroID">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_sector()">
            </td>
        </tr>
        <tr>
            <td>
                Tipo Equipo:
                <select id="tipo_equipo_filtro"  onchange="filtrar_mantenimiento_global()" name="tipo_equipo_filtro" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($_REQUEST['tipo_equipo_filtro']==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </td>
            <td>
                Marca:
                <select  onchange="filtrar_mantenimiento_global()" id="marca_filtro" name="marca_filtro" size="1">
                    <option value="0">Seleccione marca</option>
                    <?php
                    $k=0;
                    if($result_marcas){
                    foreach ($result_marcas as $m) {
                    ?>
                    <option value="<?php echo $m->id_marca ?>" <?php if($m->id_marca==$_REQUEST['marca_filtro']){ echo "selected='selected'";} ?> ><?php echo $m->descripcion ?></option>
                    <?php }} ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>Fecha Desde
                <input type="text"  value="" id="fecha_desde"  name="fecha_desde" type="text">
            </td>
            <td>Fecha Hasta
                <input type="text"  value="" id="fecha_hasta"  name="fecha_hasta" type="text">
            </td>
        </tr>
        <tr>
            <td  style="text-align: left;">
                <button onclick="filtrar_mantenimiento_global()" class="btn btn-success">Buscar</button>
            </td>

        </tr>


    </tbody>
</table>
      <div id="tabla_listado" class="double-scroll">
      <table class="table">

      </table>
      </div>
</div>
</div>
</div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestListaEquipoGlobal('lugar', 'lugar_filtro', 'LE');
    newSuggestListaEquipoGlobal('sector_filtro', 'sector_filtroID', 'S');
    newSuggest('personas', 'personasID', 'P');
</script>

<?php include_once 'footer.php' ?>
</body>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        //alert('bueno');
        $j("#fecha_desde").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            format: "dd-mm-yyyy",
            onSelect:  function(dateText) {
                filtrar_mantenimiento_global();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
        $j("#fecha_hasta").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            format: "dd-mm-yyyy",
            onSelect:  function(dateText) {
                filtrar_mantenimiento_global();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
    //        function  ver_cambio(){
    //
    //        }
</script>
