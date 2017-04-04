<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 01/08/2016
 * Time: 05:30 PM
 */?>
<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

$result_proveedors = $consultas->getProveedores($_REQUEST['descrip']);
?>
<table class="table">
    <thead>
    <tr style="background: red;" >
        <th style="width: 25%;" >Descripcion</th>
        <th style="width: 25%;" >Direccion</th>
        <th style="width: 25%;" >Mail</th>
        <th style="width: 25%;" >Contacto</th>
        <th style="width: 25%;" >Telefonos</th>
        <th>Estado</th>
        <th style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <!-- <th style="width: 2%;">&nbsp; </th>-->
    </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result_proveedors){
        foreach ($result_proveedors as $r) {
            ?>
            <tr>

                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->direccion; ?></td>
                <td class="span1 text-left"><?php echo $r->mail; ?></td>
                <td class="span1 text-left"><?php echo $r->contacto; ?></td>
                <td class="span1 text-left"><?php echo $r->telefonos; ?></td>
                <td class="span1 text-left"><?php echo $r->estado; ?></td>
                <td>
                    <a href="controlador.php?action=edita_proveedor&proveedorID=<?php echo (int)$r->id_proveedor ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                </td>
                <td>
                    <a href="controlador.php?action=eliminar_proveedor&proveedorID=<?php echo (int)$r->id_proveedor ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                </td>


            </tr>
        <?php  }}else{ ?>
        <tr>
            <td colspan="5" class="span1 text-left">No hay proveedores cargadas</td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>
  

