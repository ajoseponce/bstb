<body>
<div id="page-content" >

    <div class="block block-themed block-last" >

        <div class="block-content" id="listado">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 15%;">Num. NC</th>
                    <th style="width: 5%;">&nbsp;&nbsp;</th>
                    <th style="width: 15%;">Fecha</th>
                    <th style="width: 15%;">Sector</th>
                    <th style="width: 15%;">Proceso</th>
                    <th style="width: 35%;">Descripcion</th>
                    <th style="width: 10%;">Tipo</th>
                    <th style="width: 10%;">Estado</th>
                    <th style="width: 50%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                            <td class="span1 text-left">
                            <img src="img/usuario.png" style="cursor: pointer;"  title="Informador" data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo  $r->usuario_informador; ?></strong>" >
                            </td>
                            <td class="span1 text-left"><?php echo $r->fecha." ".$r->hora; ?></td>
                            <td class="span1 text-left"><?php echo $r->sector; ?></td>
                            <td class="span1 text-left"><?php echo $r->proceso; ?></td>
                            <td class="span1 text-left"><?php echo substr($r->descripcion, 0, 40 ); ?><img src="img/mas_descripcion.png" onclick="ver_descripcion_pop(<?php echo $r->id_no_conformidad;?>)"/></td>
                            <td class="span1 text-left">
                                <?php
                                echo ($r->tipo=='nc')?"No Conformidad":"";
                                echo ($r->tipo=='o')?"Observacion":"";
                                echo ($r->tipo=='m')?"Mejora":"";
                                ?>
                            </td>
                            <td class="span1 text-center">
                                <?php
                                echo ($r->estado=='N')?"Nuevo":"";
                                echo ($r->estado=='R')?"Respondido/Tratado":"";
                                echo ($r->estado=='C')?"Cerrado":"";
                                ?></td>
                            <td class="span1 text-center">
                                <a href="controlador.php?action=respuesta_no_conformidades&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/responde.png" title="Responder hallazgo"></a>
                            </td>

                        </tr>
                        <tr style="display:none;" id="descripcion_<?php echo $r->id_no_conformidad; ?>">
                            <td colspan="7">
                                <?php echo $r->descripcion; ?>
                            </td>
                            <td colspan="1">
                                <img onclick="cierre_descripcion(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                            </td>
                        </tr>
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
<script>
    function ver_descripcion_pop(value){
        //alert('hola');
        $("#descripcion_"+value).show();
    }
    function cierre_descripcion(value){
        $("#descripcion_"+value).hide();
    }
</script>
</body>
</html>
<?php include_once 'footer.php' ?>
