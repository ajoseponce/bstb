<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_sector'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva Sector</button>

    </div>
    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Buscar Sector</h4>
        </div>
        <div class="block-content">
            <form id="form_datos" method="post" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion </label>
                    <div class="controls">
                        <input value="" id="sector"  name="sector" class="input-large" type="text">
                        <input value="" id="sectorID"  name="sectorID" type="hidden">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>
                <div id="box_editar" style="display: none;" class="form-actions">
                    <input id="action" type="hidden" name="action" value="edita_sector">
                    <button type="reset" onclick="location.href='controlador.php?action=lista_sectores'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 25%;" >Descripcion</th>
                    <th style="width: 25%;" >Servicio</th>
                    <th>Estado</th>

                    <th style="width: 25%;">&nbsp;</th>
                    <th style="width: 25%;">&nbsp;</th>
                    <!-- <th style="width: 2%;">&nbsp; </th>-->
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result_sectors){
                    foreach ($result_sectors as $r) {
                        ?>
                        <tr>

                            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                            <td class="span1 text-left"><?php echo $r->servicio; ?></td>
                            <td class="span1 text-left"><?php echo $r->estado; ?></td>
                            <td>
                                <a href="controlador.php?action=edita_sector&sectorID=<?php echo (int)$r->id_sector ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                            </td>
                            <td><?php if($r->estado=='A'){ ?>
                                <a href="controlador.php?action=eliminar_sector&sectorID=<?php echo (int)$r->id_sector ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                                    <?php }else{ ?>
                                    <a href="controlador.php?action=alta_sector&sectorID=<?php echo (int)$r->id_sector ?>"><img style="cursor: pointer;" src="img/validar.png"/>
                                        <?php
                                    } ?>
                            </td>


                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay sector cargadas</td>
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
    newSuggestEditar('sector', 'sectorID', 'S');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>

