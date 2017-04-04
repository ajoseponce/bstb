<body>
<div id="page-content" >
    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Buscar Aplicativos por Menu</h4>
        </div>
        <div class="block-content">
            <form id="form_datos" method="post" class="form-horizontal" onsubmit="return false;">
                <div class="control-group">
                    <label class="control-label" for="general-text">Nombre Menu  </label>
                    <div class="controls">
                        <input  id="menu"  name="menu"  class="input-large" value="<?php echo $_REQUEST['menu'];  ?>" type="text">
                        <input  id="id_menu"  name="id_menu" type="hidden" value="<?php echo $_REQUEST['id_menu'];  ?>">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>

            </form>
        </div>
        <div class="block-content" id="aplicaciones_persona">
            <!------------------------------------------>
            <?php
            if($_REQUEST['id_menu']){
                $result = $consultas->getAplicacionesMenu($_REQUEST['id_menu']);
                ?>
                <table class="sui-table">
                    <thead>
                    <tr style="background: red;"  >
                        <th style="width: 30px;">ID</th>
                        <th width="50%">Aplicacion</th>

                        <th width="40%">&nbsp;</th>
                    </tr>
                    </thead>
                    <?php
                    if($result){
                        foreach ($result as $v) { ?>
                            <tr>
                                <td style="width: 30px;"><?php echo $v->relacion; ?></td>
                                <td width="50%"><?php echo $v->aplicacion; ?></td>

                                <td width="40%">
                                    <a href="controlador.php?action=eliminar_aplicativos_menu&id_registro=<?php echo (int)$v->relacion; ?>">
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
                                <input id="id_menu" type="hidden" name="id_menu" value="<?php echo $_REQUEST['id_menu']; ?>">
                                <input id="action" type="hidden" name="action" value="guardar_aplicativo_menu">
                                <input type="text" id="aplicativo" name="aplicativo">
                                <input type="hidden" id="aplicativoID" name="aplicativoID">
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
    newSuggestMenuApli('menu', 'id_menu', 'me');
    newSuggest('aplicativo', 'aplicativoID', 'AP');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>