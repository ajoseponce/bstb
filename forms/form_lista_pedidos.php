<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_lugar'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva Ubicaci&oacute;n</button>

    </div>
    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Buscar Ubicacion</h4>
        </div>
        <div class="block-content">
            <form id="form_datos" method="post" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion </label>
                    <div class="controls">
                        <input value="" id="lugar"  name="lugar" class="input-large" type="text">
                        <input value="" id="lugarID"  name="lugarID" type="hidden">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>
                <div id="box_editar" style="display: none;" class="form-actions">
                    <input id="action" type="hidden" name="action" value="edita_lugar">
                    <button type="reset" onclick="location.href='controlador.php?action=lista_lugares'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 25%;" >Descripcion</th>
                    <th style="width: 25%;" >Sector</th>
                    <th>Estado</th>

                    <th style="width: 25%;">&nbsp;</th>
                    <th style="width: 25%;">&nbsp;</th>
                    <!-- <th style="width: 2%;">&nbsp; </th>-->
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result_lugars){
                    foreach ($result_lugars as $r) {
                        ?>
                        <tr>
                            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                            <td class="span1 text-left"><?php echo $r->sector; ?></td>
                            <td class="span1 text-left"><?php echo $r->estado; ?></td>
                            <td>
                                <a href="controlador.php?action=edita_lugar&lugarID=<?php echo (int)$r->id_lugar ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                            </td>
                            <td>
                                <a href="controlador.php?action=eliminar_lugar&lugarID=<?php echo (int)$r->id_lugar ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                            </td>


                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay lugars cargadas</td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestEditar('lugar', 'lugarID', 'L');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>