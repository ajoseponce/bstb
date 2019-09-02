<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getMantenimientosProgramadosPorMes($_REQUEST);
$result_fut= $consultas->getMantenimientosProgramadosUltPorMes($_REQUEST);

//exit;
?>
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<?php if($_REQUEST['desde']<$_REQUEST['hasta']) {
    $desde = $_REQUEST['desde'];
    $hasta = $_REQUEST['hasta'];
    while ($desde <= $hasta) {
        ?>
        <div>
            <strong><?php echo  saber_mes($desde); ?></strong></br></div>
        <div id='calendar_<?php echo $desde ?>'></div>
        <?php
        $desde++;
        if($desde<10){ $desde='0'.$desde; }
    }
}
//exit;
?>
<script src='fullcalendar/lib/moment.min.js'></script>
<!--<script src='./fullcalendar/lib/jquery.min.js'></script>-->
<script src='fullcalendar/fullcalendar.min.js'></script>
<!--<script src='http://localhost/bstb_sistema/fullcalendar/locale/es.js'></script>-->
<script src='fullcalendar/locale/es.js'></script>
<script>

    function dibuja_periodo_calendario(periodo){
        
        $('#calendar_'+periodo).fullCalendar({
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



</script>
<?php if($_REQUEST['desde']<$_REQUEST['hasta']){
    $desde=$_REQUEST['desde'];
    $hasta=$_REQUEST['hasta'];
    while ($desde <= $hasta ){

        ?>
        <script>
            dibuja_periodo_calendario('<?php echo $desde; ?>');
        </script>
        <?php
        $desde++;
        if($desde<10){ $desde='0'.$desde; }
    }

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
 ?>

