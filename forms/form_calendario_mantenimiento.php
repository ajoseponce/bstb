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
                    <td>
                        Marca:
                        <select  onchange="filtrar_calendario_equipo()" id="marca_filtro" name="marca_filtro" size="1">
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
                    <td  style="text-align: left;">
                        <button onclick="filtrar_listado_equipo()" class="btn btn-success">Buscar</button>
                    </td>
                    <td style="text-align: right;">
<!--                        <img src="img/exel.png" onclick="exporta_equipos()" style="cursor: pointer;" />-->
                    </td>
                </tr>


                </tbody>
            </table>


            <div id="tabla_listado" class="double-scroll">
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

    $(document).ready(function() {
        //var initialLocaleCode = 'es';

        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: '',
                right: ''
            },
            defaultDate: '2017-<?php echo  date('m'); ?>-01',
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

    });

</script>
</body>
