<link href='./fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='./fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

<style>

    #calendar {
        max-width: 100%;
        margin: 40px auto;
        padding: 0 10px;
    }

</style>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Listado de Mantenieminto Realizados</h4>
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
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_calendar_sector()">
                    </td>
                    <td>
                        Sector:
                        <input id="sector_filtro"  type="text" style="width: 350px; " name="sector_filtro" value="<?php echo $_REQUEST['sector_filtro'];  ?>">
                        <input id="sector_filtroID" value="<?php echo $_REQUEST['sector_filtroID'];  ?>" type="hidden" name="sector_filtroID">
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_calendar_sector()">
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipo Equipo:
                        <select id="tipo_equipo_filtro"  onchange="filtrar_calendario_equipo()" name="tipo_equipo_filtro" size="1">
                            <option value="0">Seleccione un tipo</option>
                            <?php if($tipo_equipo){
                                foreach ($tipo_equipo as $t) {  ?>
                                    <option <?php echo ($_REQUEST['tipo_equipo_filtro']==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                    </td>
                    <td>&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        Periodo Desde:
                        <select onchange="filtrar_calendario_equipo()" name="periodo_desde" id="periodo_desde" size="1">
                            <option value="0">Seleccione un Periodo</option>
                            <option <?php echo (date('n')=="1")?"selected":""; ?> value="01">Enero</option>
                            <option <?php echo (date('n')=="2")?"selected":""; ?> value="02">Febrero</option>
                            <option <?php echo (date('n')=="3")?"selected":""; ?> value="03">Marzo</option>
                            <option <?php echo (date('n')=="4")?"selected":""; ?> value="04">Abril</option>
                            <option <?php echo (date('n')=="5")?"selected":""; ?> value="05">Mayo</option>
                            <option <?php echo (date('n')=="6")?"selected":""; ?> value="06">Junio</option>
                            <option <?php echo (date('n')=="7")?"selected":""; ?> value="07">Julio</option>
                            <option <?php echo (date('n')=="8")?"selected":""; ?> value="08">Agosto</option>
                            <option <?php echo (date('n')=="9")?"selected":""; ?> value="09">Septiembre</option>
                            <option <?php echo (date('n')=="10")?"selected":""; ?> value="10">Octubre</option>
                            <option <?php echo (date('n')=="11")?"selected":""; ?> value="11">Noviembre</option>
                            <option <?php echo (date('n')=="12")?"selected":""; ?> value="12">Diciembre</option>
                        </select>
                    </td>
                    <td>
                        Periodo Hasta:
                        <select onchange="filtrar_calendario_equipo()" name="periodo_hasta" id="periodo_hasta" size="1">
                            <option value="0">Seleccione un Periodo</option>
                            <option <?php echo (date('n')=="1")?"selected":""; ?> value="01">Enero</option>
                            <option <?php echo (date('n')=="2")?"selected":""; ?> value="02">Febrero</option>
                            <option <?php echo (date('n')=="3")?"selected":""; ?> value="03">Marzo</option>
                            <option <?php echo (date('n')=="4")?"selected":""; ?> value="04">Abril</option>
                            <option <?php echo (date('n')=="5")?"selected":""; ?> value="05">Mayo</option>
                            <option <?php echo (date('n')=="6")?"selected":""; ?> value="06">Junio</option>
                            <option <?php echo (date('n')=="7")?"selected":""; ?> value="07">Julio</option>
                            <option <?php echo (date('n')=="8")?"selected":""; ?> value="08">Agosto</option>
                            <option <?php echo (date('n')=="9")?"selected":""; ?> value="09">Septiembre</option>
                            <option <?php echo (date('n')=="10")?"selected":""; ?> value="10">Octubre</option>
                            <option <?php echo (date('n')=="11")?"selected":""; ?> value="11">Noviembre</option>
                            <option <?php echo (date('n')=="12")?"selected":""; ?> value="12">Diciembre</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td  style="text-align: left;">
                        <button onclick="filtrar_listado_equipo()" class="btn btn-success">Buscar</button>
                    </td>
                    <td style="text-align: right;">
<!--                        <img src="img/exel.png" onclick="exporta_equipos()" style="cursor: pointer;" />-->
                    </td>
                </tr>


                </tbody>
            </table>


            <div id="tabla_listado" class="double-scroll" style="text-align: center; font-size: 18px;"><strong><?php echo  saber_mes(date('n')); ?></strong>
                <div id='calendar'></div>
            </div>
    </div>
</div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestCalendarioMant('lugar', 'lugar_filtro', 'LE');
    newSuggestCalendarioMant('sector_filtro', 'sector_filtroID', 'S');



</script>
<?php include_once './footer.php' ?>

<script src='./fullcalendar/lib/moment.min.js'></script>
<!--<script src='./fullcalendar/lib/jquery.min.js'></script>-->
<script src='./fullcalendar/fullcalendar.min.js'></script>
<!--<script src='http://localhost/bstb_sistema/fullcalendar/locale/es.js'></script>-->
<script src='./fullcalendar/locale/es.js'></script>
<script>

    function dibuja_periodo_calendario(periodo){

            $('#calendar').fullCalendar({
                header: {
                    left: '',
                    center: '',
                    right: ''
                },
                defaultDate: '2019-'+periodo+'-01',
                locale: 'es',

                buttonIcons: false, // show the prev/next text
                weekNumbers: false,
                navLinks: false, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php
                    foreach ($result as $r){
                    echo "{"
                    ?>
                    title: '<?php echo $r->equipo;
                switch ($r->en_termino) {
                    case "NR":
                        echo " No se realizo";
                        break;
                    case "RF":
                        echo " Realizo ".$r->fecha;
                        break;
                    case "R":
                        echo "Se Realizo Correctamente";
                        break;
                }
                ; ?>',
                start: '<?php echo $r->fecha_deberia; ?>',
                backgroundColor: "<?php
                switch ($r->en_termino) {
                    case "NR":
                        echo "red";
                        break;
                    case "RF":
                        echo "#fff600";
                        break;
                    case "R":
                        echo "green";
                        break;
                }
                ?>",
                textColor: 'black',
                borderColor: "black"
            <?php echo "},";
            }

            ?>
            <?php
            foreach ($result_fut as $s){
            echo "{"
            ?>
            title: '<?php echo $s->equipo;
                if($s->fecha_debe<date('Y-m-d')) {  echo " Esta Fuera Termino"; }else{ echo " Se Debe Realizar";}
                ?>',
                start: '<?php echo $s->fecha_debe; ?>',
                backgroundColor: "<?php
                if($s->fecha_debe<date('Y-m-d')) {  echo "white"; }else{ echo "blue";}
                ?>",
                textColor: "<?php
                if($s->fecha_debe<date('Y-m-d')) {  echo "red"; }else{ echo "white";}
                ?>"
            <?php echo "},";
            }

            ?>
            ],


        });



    }


    dibuja_periodo_calendario('<?php echo date('m'); ?>');
</script>
</body>
<?php
function saber_mes($mes) {

    switch ($mes){

        case 01: return "Enero"; break;
        case 02: return "Febrero"; break;
        case 03: return "Marzo"; break;
        case 04: return "Abril"; break;
        case 05: return "Mayo"; break;
        case 06: return "Junio"; break;
        case 07: return "Julio"; break;
        case 08: return "Agosto"; break;
        case 09: return "Septiembre"; break;
        case 10: return "Octubre"; break;
        case 11: return "Noviembre"; break;
        case 12: return "Diciembre"; break;

    }
    //return $frecuencia;
}
?>