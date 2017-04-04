<?php
    include('../lib/DB_Conectar.php');
    include('../classes/consultas.php');
?>
<html>
<body>
<div id="page-content" >

<div class="block block-themed block-last">
    <form id="form_datos_examen" name="form_datos_examen" >
    
        
        
       
        <div class="block-title">
        <h4>Busqueda</h4>
    </div>
    <div class="block-content">
    
        <div class="control-group">
                
            <label class="control-label" for="general-text">Nombre Apellido o DNI</label>
            <div class="controls">
                <input value="" id="persona" onchange="valor_caja('persona')"  name="persona" class="span5" type="text">
                <input value="" id="personaID"  name="personaID" type="hidden">
                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Nombre del Examen </label>
            <div class="controls">
                <input value="" id="examen"  name="examen" onchange="valor_caja('examen')"  class="span5" type="text">
                <input value="" id="examenID"  name="examenID" type="hidden">
                
            </div>
        </div>
        
    </div>    
    <div class="block-content" id="reporte" name="reporte">
        <?php 
        $result = $consultas->getCalificaciones($_REQUEST['id_usuario'],$_REQUEST['id_examen']);
        ?>

        <table class="sui-table" style="width: 100%">
                <thead>
                <tr style="background: red; color: white;"  >
                    <th>Persona</th>
                    <th>Examen</th>
                    <th>Calificacikon</th>
                </tr>
                </thead>
                <?php
                if($result){
                    foreach ($result as $v) { ?>
                     <tr>
                        <td><?php echo $v->nombre; ?></td>
                        <td><?php echo $v->examen; ?></td>
                        <td><?php echo $v->nota; ?></td>
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

         </table>  
    </div>
    </form>  
</div>    
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
newSuggestReporte('persona', 'personaID', 'PU');
newSuggestReporte('examen', 'examenID', 'E');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>