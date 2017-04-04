<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 05/07/2016
 * Time: 11:07 AM
 */?>
<body>
<div id="page-content" >
    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Buscar Procesos por Personas</h4>
        </div>
        <div class="block-content">
            <form id="form_datos" method="post" class="form-horizontal" onsubmit="return false;">
                <div class="control-group">
                    <label class="control-label" for="general-text">Nombre apellido o ID </label>
                    <div class="controls">
                        <input  id="persona"  name="persona"  class="input-large" value="<?php echo $_REQUEST['persona'];  ?>" type="text">
                        <input  id="personaID"  name="personaID" type="hidden" value="<?php echo $_REQUEST['id_persona'];  ?>">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>

            </form>
        </div>
        <div class="block-content" id="proceso_persona">
            <!------------------------------------------>
            <?php
            if($_REQUEST['personaID']){
                $result = $consultas->getProcesoPersona($_REQUEST['personaID']);
                ?>
                <table class="sui-table">
                    <thead>
                    <tr style="background: red;"  >
                        <th style="width: 30px;">ID</th>
                        <th width="50%">Area</th>

                        <th width="40%">&nbsp;</th>
                    </tr>
                    </thead>
                    <?php
                    if($result){
                        foreach ($result as $v) { ?>
                            <tr>
                                <td style="width: 30px;"><?php echo $v->relacion; ?></td>
                                <td width="50%"><?php echo $v->area; ?></td>

                                <td width="40%">
                                    <a href="controlador.php?action=eliminar_proceso_persona&id_registro=<?php echo (int)$v->relacion; ?>&personaID=<?php echo $_REQUEST['id_persona']; ?>">
                                        <img style="cursor: pointer;" src="img/delete.png"/>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="3">No contiene registros</td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3">
                            <form action="controlador.php" id="form_datos" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <input id="personaID" type="hidden" name="personaID" value="<?php echo $_REQUEST['personaID']; ?>">
                                <input id="action" type="hidden" name="action" value="guardar_proceso_persona">
                                <input type="text" id="area" name="area">
                                <input type="hidden" id="areaID" name="areaID">
                                <button onclick="" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Guardar Relacion</button>
                            </form>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestPersProceso('persona', 'personaID', 'PU');
    newSuggest('area', 'areaID', 'Ar');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>
