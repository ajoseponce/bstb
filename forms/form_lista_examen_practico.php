<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_examen_practico'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo Examen</button>

    </div>
    <div class="block block-themed block-last">
        <div class="block-content">

            <div class="control-group">
                <label class="control-label" for="general-text">Personal</label>
                <div class="controls">
                    <input  id="persona"  style="width:400px;" value="" name="persona"  class="input-large" type="text">
                    <input  id="personaID"  name="personaID"  class="input-large" value="" type="hidden">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">POE</label>
                <div class="controls">
                    <input  id="poe"  name="poe" style="width: 500px;"  class="input-large" value="" type="text">
                    <input  id="poeID"  name="poeID" type="hidden" value="">
                </div>
            </div>

        </div>
        <div class="block-content" id="listado">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th>Poe</th>
                    <th>Persona</th>
                    <th style="width: 18%;">Fecha Examen Practico</th>
                    <th>Calificacion</th>
                    <th>Evaluador</th>
                    <th>Observacion</th>
                    <th style="width: 5%;">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k=0;
                if($result_user){
                    foreach ($result_user as $r) { ?>
                        <tr>
                            <td class="span1 text-left"><?php echo $r->poe; ?></td>
                            <td class="span1 text-left"><?php echo $r->persona; ?></td>
                            <td class="span1 text-center"><?php echo $r->fecha_examen; ?></td>
                            <td class="span1 text-left"><?php echo $r->calificacion; ?></td>
                            <td class="span1 text-left"><?php echo ($r->capacitador)?$r->capacitador:$r->nombre_capacitador; ?></td>
                            <td class="span1 text-left"><?php echo $r->observacion; ?></td>
                            <td class="span1 text-left">
                            <a href="controlador.php?action=edita_examen_practico&id_examen_practico=<?php echo (int)$r->id_examen_practico ?>"><img style="cursor: pointer;" src="img/edit.png"/></a>
                            </td>


                        </tr>
                    <?php  }} ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- END Modal Tabs -->
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">

    newSuggestFiltroExamenPractico('persona', 'personaID', 'P');
    newSuggestFiltroExamenPractico('poe', 'poeID', 'Po');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>