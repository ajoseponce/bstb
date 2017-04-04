<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_lugar_guardia'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo lugar de guardia</button>

    </div>
    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Buscar lugar de guardia</h4>
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
                    <input id="action" type="hidden" name="action" value="edita_lugar_guardia">
                    <button type="reset" onclick="location.href='controlador.php?action=lista_lugar_guardias'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 25%;" >Descripcion</th>
                    <th>Estado</th>

                    <th style="width: 25%;">&nbsp;</th>
                    <th style="width: 25%;">&nbsp;</th>
                    <!-- <th style="width: 2%;">&nbsp; </th>-->
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result_lugar_guardia){
                    foreach ($result_lugar_guardia as $r) {
                        ?>
                        <tr>

                            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                            <td class="span1 text-left"><?php echo $r->estado; ?></td>
                            <td>
                                <a href="controlador.php?action=edita_lugar_guardia&id_lugar_guardia=<?php echo (int)$r->id_lugar_guardia ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                            </td>
                            <td><?php if($r->estado=='A'){ ?>
                                <a href="controlador.php?action=eliminar_lugar_guardia&lugarID=<?php echo (int)$r->id_lugar_guardia ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                                    <?php }else{ ?>
                                    <a href="controlador.php?action=alta_lugar_guardia&lugarID=<?php echo (int)$r->id_lugar_guardia ?>"><img style="cursor: pointer;" src="img/validar.png"/>
                                        <?php
                                        } ?>
                            </td>


                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay lugar guardia cargadas</td>
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
    newSuggestEditar('lugar', 'lugarID', 'LG');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>

