<?php
session_start();
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getGuardias($_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta']);

?>
<table class="table">
    <thead>
    <tr style="background: red; font-size: 11px;" >

        <th style="width: 15%;">Fecha</th>
        <th style="width: 25%;">Persona</th>
        <th style="width: 26%;">Lugar</th>
        <th style="width: 20%;">Hora Desde</th>
        <th style="width: 20%;">Hora Hasta</th>
        <th style="width: 15%;" >Tipo </th>
        <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            ?>
            <tr style="font-size: 11px; background: <?php echo $color; ?>">

                <td class="span1 text-left"><?php echo $r->fecha_guardia; ?></td>
                <td class="span1 text-left"><?php echo $r->persona ?></td>
                <td class="span1 text-left"><?php echo $r->lugar; ?></td>
                <td class="span1 text-left"><?php echo $r->hora_desde; ?></td>
                <td class="span1 text-left"><?php echo $r->hora_hasta; ?></td>
                <td class="span1 text-left">
                    <?php echo ($r->tipo_guardia=='A')?"Activa":"";
                    echo ($r->tipo_guardia=='P')?"Pasiva":"";?></td>

                <td class="span1 text-center">
                    <?php if($_SESSION[id]==$r->usuario){ ?>
                        <a href="controlador.php?action=edita_guardia&id_guardia=<?php echo (int)$r->id_registro ?>">
                        <img src="img/edit.png" style="cursor: pointer;" title="<?php echo $r->id_registro; ?>"/></a>
                    <?php } ?>
                </td>

            </tr>


        <?php    }} ?>
    </tbody>
</table>
