<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getRegistros($_REQUEST['id_poe']);
?>

<table class="sui-table">
        <thead>
        <tr style="background: red;"  >
            <th style="width: 30px;">ID registro</th>
            <th width="50%">Descripcion</th>
            <th width="40%">Archivo</th>
            <th width="40%">&nbsp;</th>
        </tr>
        </thead>
        <?php
        if($result){
            foreach ($result as $v) { ?>
             <tr>
                <td style="width: 30px;"><?php echo $v->id_registro; ?></td>
                <td width="50%"><?php echo $v->descripcion; ?></td>
                <td width="40%">
                    
                    <?php 
                   // echo $v->nombre_archivo;
                    
                    if ($v->nombre_archivo) { 
                    ?> 
                    <img style="cursor: pointer;" src="img/registro.png" onclick="ver_doc_registro('<?php echo $v->nombre_archivo; ?>')"/>
                    <?php } ?>  
                </td>
                <td width="40%">
                    <a href="controlador.php?action=eliminar_registro&id_registro=<?php echo (int)$v->id_registro; ?>&archivoregistro=<?php echo $v->nombre_archivo; ?>&id_poe=<?php echo $_REQUEST['id_poe']; ?>&poe=<?php echo $v->poe; ?>">
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
                     <input id="id_poe" type="hidden" name="id_poe" value="<?php echo $_REQUEST['id_poe']; ?>">
                     <input id="action" type="hidden" name="action" value="guardar_registro">
                     <input type="text" id="descripcion_registro" name="descripcion_registro">
                     <input type="file" id="file_doc_registro" name="file_doc_registro">
                     <button onclick="" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Guardar Registro</button>
                     </form>
                 </td>
             </tr>
 </table>        
<script src="js/funciones.js"></script>