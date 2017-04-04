<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 29/06/2016
 * Time: 04:48 PM
 */?>
<body>
<div id="page-content" >
    <div class="clearfix">
        <button onclick="location.href='controlador.php?action=carga_pre_capacitacion'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar Nuevo Aviso Capacitacion</button>
    </div>
    <div class="block block-themed block-last">
<!--        <div class="block-content">-->
<!---->
<!--            <div class="control-group">-->
<!--                <label class="control-label" for="general-text">Personal</label>-->
<!--                <div class="controls">-->
<!--                    <input  id="persona"  style="width:400px;" value="" name="persona"  class="input-large" type="text">-->
<!--                    <input  id="personaID"  name="personaID"  class="input-large" value="" type="hidden">-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label" for="general-text">POE</label>-->
<!--                <div class="controls">-->
<!--                    <input  id="poe"  name="poe" style="width: 500px;"  class="input-large" value="" type="text">-->
<!--                    <input  id="poeID"  name="poeID" type="hidden" value="">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
        <div class="block-content" id="listado">
            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 35%;"></th>
                    <th style="width: 35%;" >Descripcion</th>
                    <th style="width: 25%;" >Fecha Capacitacion</th>
                    <th style="width: 25%;" >Capacitador</th>
                    <th style="width: 5%;">Integrantes </th>
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result){
                    foreach ($result as $r) {
                        ?>
                        <tr>
                            <td class="span1 text-left"><a href="controlador.php?action=edita_pre_capacitacion&id_pre_capacitacion=<?php echo (int)$r->id_pre_capacitacion ?>"><img style="cursor: pointer;" src="img/edit.png"/></a></td>
                            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                            <td class="span1 text-left"><?php echo $r->fecha_pre_capacitacion; ?></td>
                            <td class="span1 text-left"><?php echo ($r->capacitador)?$r->capacitador:$r->nombre_capacitador; ?></td>
                            <td class="span1 text-left"><img src="img/integrantes.png" onclick="ver_detalle(<?php echo $r->id_pre_capacitacion ?>)"/></td>
                        </tr>
                        <tr style="display:none;" id="integrantes_<?php echo $r->id_pre_capacitacion ?>">
                            <td colspan="4" class="span1 text-left">
                                <?php
                                $result_integrantes= $consultas->getIntegrantesPreCapacitaciones($r->id_pre_capacitacion);
                                if($result_integrantes){
                                    foreach ($result_integrantes as $i) {
                                        ?>

                                        <div><img src="img/person.png" /> <?php echo $i->integrante ?></div>



                                    <?php  }} ?>
                            </td>
                            <td class="span1 text-left"><img onclick="cierre_detalle(<?php echo $r->id_pre_capacitacion ?>)" src="img/delete.png"/></td>
                        </tr>
                    <?php    }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function ver_detalle(value){
        $("#integrantes_"+value).show();
    }
    function cierre_detalle(value){
        $("#integrantes_"+value).hide();
    }
</script>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestFiltroPreCapacitaciones('persona', 'personaID', 'P');
    newSuggestFiltroPreCapacitaciones('poe', 'poeID', 'Po');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>

