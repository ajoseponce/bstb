<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_no_conformidades'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar Hallazgo</button>

    </div>
    <div class="block block-themed block-last" style="overflow: auto; " >

        <div class="block-content" id="listado">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 15%;">Num. NC</th>
                    <th style="width: 15%;">Fecha</th>
                    <th style="width: 15%;">Sector</th>
                    <th style="width: 15%;">Proceso</th>
                    <th style="width: 35%;">Descripcion</th>
                    <th style="width: 10%;">Tipo</th>
                    <th style="width: 10%;">Estado</th>
                    <th style="width: 5%;">Asignado</th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $k=0;
                if($result){
                    foreach ($result as $r) {
                        switch ($r->estado) {
                            case "N": $color="#CD0000"; break;
                            case "As": $color="#FCB153"; break;
                            case "R": $color="#EBDC8B"; break;
                            case "C": $color="#7DCBB5"; break;
                            case "A": $color="#E0E0E0"; break;
                            case "V": $color="#929CBF"; break;
                        }

                        ?>
                        <tr style="background: <?php echo $color; ?>">
                            <td class="span1 text-left"><?php echo $r->id_no_conformidad; ?></td>
                            <td class="span1 text-left"><?php echo $r->fecha." ".$r->hora; ?></td>
                            <td class="span1 text-left"><?php echo $r->sector; ?></td>
                            <td class="span1 text-left"><?php echo $r->proceso; ?></td>
                            <td class="span1 text-left"><?php echo substr($r->descripcion, 0, 40 ); ?><img src="img/mas_descripcion.png" onclick="ver_descripcion_pop(<?php echo $r->id_no_conformidad;?>)"/></td>
                            <td class="span1 text-left"><?php
                                echo ($r->tipo=='nc')?"No Conformidad":"";
                                echo ($r->tipo=='o')?"Observacion":"";
                                echo ($r->tipo=='m')?"Mejora":"";
                                ?>
                            </td>
                            <td class="span1 text-center"><?php
                                echo ($r->estado=='N')?"Nuevo":"";
                                echo ($r->estado=='R')?"Respondido/Tratado":"";
                                echo ($r->estado=='C')?"Cerrado     ":"";
                                echo ($r->estado=='A')?"Anulada":"";
                                ?></td>
                            <td class="span1 text-left">
                                <?php if($r->responsable_sector){ ?>
                                    <img src="img/usuario.png" style="cursor: pointer;"  title="<?php echo  "Sector: ".$r->sector_derivado; ?> " data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo  "Resp: ".$r->responsable_sector; ?></strong>" >
<!--                                <img src="img/usuario.png" style="cursor: pointer;" title="--><?php //echo $r->responsable_sector; ?><!--"/>-->
                                <?php } ?>
                            </td>
                            <td class="span1 text-center">
                                <?php if($r->usuario==$_SESSION[id] && ($r->estado!='C' && $r->estado!='A' && $r->estado!='R')){ ?>
                                    <a href="controlador.php?action=edita_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/edit.png" title="Editar hallazgo"></a>
                                <?php } ?>
                            </td>
                            <td class="span1 text-left">
                                <img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle_pop(<?php echo $r->id_no_conformidad;?>)"/>
                            </td>

                        </tr>
                        <tr style="display:none;" id="descripcion_<?php echo $r->id_no_conformidad; ?>">
                            <td colspan="12">
                                <?php echo $r->descripcion; ?>
                            </td>
                            <td colspan="1">
                                <img onclick="cierre_descripcion(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                            </td>
                        </tr>
                        <!--//************************************//-->
                        <tr style="display:none;" id="respuesta_<?php echo $r->id_no_conformidad; ?>">
                            <td colspan="7" class="span1 text-left">
                                <?php //print_t($r);
                                echo "Respuesta: ".$r->respuesta." </br>";
                                echo "Analisis: ".$r->descripcion_analisis." </br>";
                                echo "Accion: ".$r->descripcion_accion." </br>";
                                echo "Fecha Accion: ".$r->fecha_accion." </br>";
                                echo "Rsponsable Accion: ".$r->responsable." </br>";
                                ?>
                            </td>
                            <td class="span1 text-left">
                                <img onclick="cierre_detalle(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                            </td>
                        </tr>
                        <!--//************************************//-->
                    <?php  }
                }else{
                    ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No se encuentran hallazgos</td>
                    </tr>

                    <?php
                } ?>

            </table>

        </div>
    </div>
    <!-- END Modal Tabs -->
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script>
    function ver_detalle_pop(value){
        // alert('hola');
        $("#respuesta_"+value).show();
    }
    function ver_descripcion_pop(value){
        //alert('hola');
        $("#descripcion_"+value).show();
    }
    function cierre_descripcion(value){
        $("#descripcion_"+value).hide();
    }
    function cierre_detalle(value){
        $("#respuesta_"+value).hide();
    }
    function limpiar_sector(){
        //alert('hollllllla diria josefina');
        $("#sector").val('');
        $("#sectorID").val('');
    }
    function limpiar_proceso(){
        //alert('hola diria josefina');
        $("#proceso").val('');
        $("#procesoID").val('');
    }
</script>
<script src="js/funciones.js"></script>
<script type="text/javascript">

    newSuggestFiltroNC('sector', 'sectorID', 'S');
    newSuggestFiltroNC('proceso', 'procesoID', 'Ar');

</script>
</body>
</html>
<?php include_once 'footer.php' ?>