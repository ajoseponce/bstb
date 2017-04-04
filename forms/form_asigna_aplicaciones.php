<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Aplicativos por Personas</h4>
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
    <div class="block-content" id="aplicaciones_persona">
    <!------------------------------------------>  
    <?php
    if($_REQUEST['personaID']){
    $result = $consultas->getAplicacionesPersona($_REQUEST['personaID']);    
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
                    <a href="controlador.php?action=eliminar_aplicativos&id_registro=<?php echo (int)$v->relacion; ?>">
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
                     <input id="action" type="hidden" name="action" value="guardar_aplicativo_persona">
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
newSuggestPersApli('persona', 'personaID', 'PU');
newSuggest('aplicativo', 'aplicativoID', 'AP');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>