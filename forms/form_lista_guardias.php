<body>
<div id="page-content" >
    <div class="block block-themed block-last">
        <div class="clearfix">
                    <button onclick="location.href='controlador.php?action=carga_guardia'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar una nueva guardia</button>
                </div>
        <div class="block-content">

            <table class="table">
                <thead>
                <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
                </thead>
                <tbody>
                
                <tr>
                    <td>Fecha Desde
                        <input type="text"  value="" id="fecha_desde"  name="fecha_desde" type="text">
                    </td>
                    <td>Fecha Hasta
                        <input type="text"  value="" id="fecha_hasta"  name="fecha_hasta" type="text">
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="listado">
            <div id="listado" class="block-content" style="overflow: auto;">
                <table class="table">
                    <thead>
                    <tr style="background: red; font-size: 11px;" >

                        <th style="width: 15%;">Fecha</th>
                        <th style="width: 25%;">Persona</th>
                        <th style="width: 26%;">Lugar</th>
                        <th style="width: 20%;">Hora Desde</th>
                        <th style="width: 20%;">Hora Hasta</th>
                        <th style="width: 15%;" >Tipo </th>
                        <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $k=0;
                    if($result){
                        foreach ($result as $r) {
                            ?>
                            <tr style="font-size: 11px; background: <?php echo $color; ?>">

                                <td class="span1 text-left"><?php echo $r->fecha_guardia; ?></td>
                                <td class="span1 text-left"><?php echo $r->persona ?></td>
                                <td class="span1 text-left"><?php echo $r->lugar; ?></td>
                                <td class="span1 text-left"><?php echo $r->hora_desde; ?></td>
                                <td class="span1 text-left"><?php echo $r->hora_hasta; ?></td>
                                <td class="span1 text-left">
                                    <?php echo ($r->tipo_guardia=='A')?"Activa":"";
                                    echo ($r->tipo_guardia=='P')?"Pasiva":"";?></td>

                                <td class="span1 text-center">
                                    <?php if($_SESSION[id]==$r->usuario){ ?>
                                        <a href="controlador.php?action=edita_guardia&id_guardia=<?php echo (int)$r->id_registro ?>">
                                        <img src="img/edit.png" style="cursor: pointer;" title="<?php echo $r->id_registro; ?>"/></a>
                                    <?php } ?>
                                </td>

                            </tr>


                        <?php    }} ?>
                    </tbody>
                </table>
            </div>

        </div>

</body>
</html>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        //alert('bueno');
        $j("#fecha_desde").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            onSelect:  function(dateText) {
                trae_guardias();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
        $j("#fecha_hasta").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            onSelect:  function(dateText) {
                trae_guardias();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
    //        function  ver_cambio(){
    //
    //        }
</script>