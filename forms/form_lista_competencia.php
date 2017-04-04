<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_competencia'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar Competencia</button>

    </div>
    <div class="block block-themed block-last" >
        <div class="block-content">

            <div class="control-group">
                <label class="control-label" for="general-text">Personal</label>
                <div class="controls">
                    <input  id="persona"  style="width:400px;" value="" name="persona"  class="input-large" type="text">
                    <input  id="personaID"  name="personaID"  class="input-large" value="" type="hidden">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">Proceso</label>
                <div class="controls">
                    <input  id="proceso"  name="proceso" style="width: 400px;"  class="input-large" value="" type="text">
                    <input  id="procesoID"  name="procesoID" type="hidden" value="">
                </div>
            </div>

        </div>
        <div class="block-content" id="listado">

            <table class="table">
                <thead>
                <tr style="background: red;" >

                    <th style="width: 25%;">Persona</th>
                    <th style="width: 25%;">Proceso</th>
                    <th>Competencia</th>
                    <th style="width: 10%;">Educacion</th>
                    <th style="width: 10%;">Habilidades</th>
                    <th style="width: 10%;">Experiencia</th>
                    <th style="width: 10%;">Fecha</th>
                    <th style="width: 10%;">Mas Info</th>
                    <th style="width: 5%;">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k=0;
                if($result_user){
                    foreach ($result_user as $r) { ?>
                        <tr>
                            <td class="span1 text-left"><?php echo $r->persona; ?></td>
                            <td class="span1 text-left"><?php echo $r->proceso; ?></td>
                            <td class="span1 text-left"><?php
                                echo ($r->competencia=='PE')?"Puede ense&nacute;ar":"";
                                echo ($r->competencia=='PTS')?"Puede trabajar solo":"";
                                echo ($r->competencia=='PTSupervisado')?"Puede trabajar supervisado":"";
                                echo ($r->competencia=='NPTP')?"No Puede trabajar en el puesto":"";
                                ?><img style="cursor: pointer;"  src="img/mas_info.png" title="<?php echo $r->observacion; ?>"/></td>
                            <td class="span1 text-center"><?php echo $r->educacion; ?></td>
                            <td class="span1 text-center"><?php echo $r->habilidades; ?></td>
                            <td class="span1 text-center"><?php echo $r->experiencia; ?></td>
                            <td class="span1 text-left"><img style="cursor: pointer;" src="img/calendario.png" title="<?php echo $r->fecha_carga; ?>"/></td>
                            <td class="span1 text-left"><img onclick="ver_detalle(<?php echo $r->id_competencia; ?>)" style="cursor: pointer;" src="img/mas_info.png"/></td>
                            <td class="span1 text-left">
                                <a href="controlador.php?action=edita_competencia&id_competencia=<?php echo (int)$r->id_competencia ?>"><img style="cursor: pointer;" src="img/edit.png"/></a>
                            </td>
                        </tr>
                        <tr id="detalle_competencia_<?php echo $r->id_competencia; ?>" style="display: none;">
                        <td colspan="9">
                        <?php $result_poe = $consultas->getPoesProceso($r->id_proceso); ?>
                        <table class="table">
                            <thead>
                            <td><strong>POEs</strong></td>
                            <td style="width: 15%;"><strong>Capacitacion</strong></td>
                            <td style="width: 15%;"><strong>Examen Teorico</strong></td>
                            <td style="width: 20%;"><strong>Examen Practico</strong></td>
                            <td style="width: 5%;"><img src="img/delete.png" onclick="cerrar_detalle(<?php echo $r->id_competencia; ?>)" style="cursor: pointer;" ></td>
                            </thead>
                            <?php
                            if($result_poe){
                                foreach ($result_poe as $v) {
                                    $tiene_capacitacion=$consultas->busca_capacitacion_persona($v->id_poe, $r->id_persona);
                                    $id_usuario_persona=$consultas->busca_id_usuario($r->id_persona);
                                    $tiene_examen_escrito=$consultas->busca_examen_teorico($v->id_poe, $id_usuario_persona);
                                    $tiene_examen_practico=$consultas->busca_examen_practico($v->id_poe, $r->id_persona);
                                    ?>
                                    <tr style="border-top: 1px solid red;">
                                        <td><?php echo $v->descripcion; ?></td>
                                        <td><?php echo ($tiene_capacitacion>0)?"Tiene":"NO Tiene";  ?></td>
                                        <td><?php echo ($tiene_examen_escrito)?$tiene_examen_escrito:"NO Rindio";  ?></td>
                                        <td><?php echo ($tiene_examen_practico)?$tiene_examen_practico:"NO Tiene";  ?></td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <?php
                                }
                                }else{
                                    ?>
                                    <tr>
                                        <td colspan="4">No contiene Poes</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </table>
                            </td>
                        </tr>
                    <?php  }} ?>

            </table>

        </div>
    </div>
    <!-- END Modal Tabs -->
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestFiltroCompetencia('persona', 'personaID', 'P');
    newSuggestFiltroCompetencia('proceso', 'procesoID', 'Ar');
    function ver_detalle(value){
        $("#detalle_competencia_"+value).show();
    }
    function cerrar_detalle(value){
        $("#detalle_competencia_"+value).hide();
    }
</script>
</body>
</html>
<?php include_once 'footer.php' ?>
