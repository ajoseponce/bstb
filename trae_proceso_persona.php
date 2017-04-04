<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 05/07/2016
 * Time: 11:23 AM
 */?>
<?php

include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getProcesoPersona($_REQUEST['id_persona']);
?>

<table class="sui-table">
    <thead>
    <tr style="background: red;"  >
        <th style="width: 30px;">ID</th>
        <th width="50%">Proceso</th>

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
                <input id="personaID" type="hidden" name="personaID" value="<?php echo $_REQUEST['id_persona']; ?>">
                <input id="action" type="hidden" name="action" value="guardar_proceso_persona">
                <input type="text" id="area" name="area">
                <input type="hidden" id="areaID" name="areaID">
                <button onclick="" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Guardar Relacion</button>
            </form>
        </td>
    </tr>
</table>
<script src="js/funciones.js"></script>

<script>
    newSuggest('area', 'areaID', 'Ar');
</script>
