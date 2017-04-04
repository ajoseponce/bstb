<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getAplicacionesPersona($_REQUEST['id_persona']);
?>

<table class="sui-table">
        <thead>
        <tr style="background: red;"  >
            <th style="width: 30px;">ID</th>
            <th width="50%">Aplicativo</th>
            
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
                     <input id="personaID" type="hidden" name="personaID" value="<?php echo $_REQUEST['id_persona']; ?>">
                     <input id="action" type="hidden" name="action" value="guardar_aplicativo_persona">
                     <input type="text" id="aplicativo" name="aplicativo">
                     <input type="hidden" id="aplicativoID" name="aplicativoID">
                     <button onclick="" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Guardar Relacion</button>
                     </form>
                 </td>
             </tr>
 </table>        
<script src="js/funciones.js"></script>

<script>
    newSuggest('aplicativo', 'aplicativoID', 'AP');
</script>    