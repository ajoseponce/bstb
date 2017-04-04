<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 28/07/2016
 * Time: 07:07 PM
 */?>
<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 23/06/2016
 * Time: 01:07 PM
 */ ?>
<body>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Mis Solicitudes</h4>
        </div>
        <div class="block-content">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 25%;" >Num. SC</th>
                    <th style="width: 25%;" >Equipo</th>
                    <th style="width: 25%;" >Descripcion</th>
                    <th style="width: 15%;" >Fecha Solicitud</th>
                    <th style="width: 50%;" >Descripcion de Falla o Averia</th>
                    <th style="width: 10%;" > Fuera de funcionamiento?</th>
                    <th style="width: 19%;" >Estado Solicitud</th>
                    <th style="width: 15px;">Archivo</th>
                    <th style="width: 15%;" >Requerido para</th>
                    <th style="width: 25%;" >Solicitante</th>
                    <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result){
                    foreach ($result as $r) {
                        switch ($r->estado_solicitud) {
                            case "SOL": $etado="Solicitado"; break;
                            case "TRAT": $etado="Tratado"; break;
                            case "CERR": $etado="Cerrado"; break;
                            case "VAL": $etado="Validado"; break;
                        }

                        switch ($r->estado_solicitud) {
                            case "SOL": $color="#CD0000"; break;
                            case "TRAT": $color="#FCB153"; break;
                            case "CERR": $color="#FCFD95"; break;
                            case "VAL": $color="#7DCBB5"; break;
                        }
                        switch ($r->estado_solicitud) {
                            case "SOL": $letra="#fff"; break;
                            case "TRAT": $letra="#000"; break;
                            case "CERR": $letra="#000"; break;
                            case "VAL": $letra="#000"; break;
                        }
                        $notas=$consultas->getNotasSolicitud($r->id_solicitud);
                        ?>
                        <tr style="background: <?php echo $color; ?>; color:  <?php echo $letra; ?>;">
                            <td class="span1 text-left"><?php echo $r->id_solicitud; ?></td>
                            <td class="span1 text-left"><?php echo $r->armado." - ".$r->num_interno; ?></td>
                            <td class="span1 text-left"><?php echo $r->tipo_equipo; ?></td>
                            <td class="span1 text-left"><?php echo $r->fecha_solicitud; ?></td>
                            <!--                    <td class="span1 text-left">--><?php //echo $r->sector_des; ?><!--</td>-->
                            <td class="span1 text-left"><?php echo $r->descripcion_falla; ?></td>
                            <td class="span1 text-left"><?php echo ($r->estado_equipo=='S')?"Si":"No"; ?></td>
                            <td class="span1 text-left"><?php echo ($etado=='Tratado')?$etado."<img src='img/usuario.png' style='cursor: pointer;'  title='Asignado a' data-toggle='popover' data-html='true'  data-trigger='hover' data-content='<strong>".$r->proveedor."</strong>'><img src='img/calendario.png' style='cursor: pointer;'  title='Fecha derivado' data-toggle='popover' data-html='true'  data-trigger='hover' data-content='<strong>".$r->fecha_derivado."</strong>' >":$etado; ?></td>
                            <td class="span1 text-left"><?php echo ($r->archivo)?"<a href='archivos_solicitudes/".$r->id_solicitud."_".$r->archivo."' target='_blank'><img src='img/resultado.png'>":"No Contiene Archivo"; ?></td>
                            <td class="span1 text-left"><?php echo $r->requerido_para; ?></td>
                            <td class="span1 text-left"><?php echo $r->usuario; ?></td>
                            <td><img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_notas(<?php echo (int)$r->id_solicitud ?>)"/></td>
                            <td class="span1 text-left">
                                <?php if($r->estado_solicitud=='SOL' && $r->id_usuario==$_SESSION['id']){ ?>
                                    <a href="controlador.php?action=editar_solicitud&id_solicitud=<?php echo (int)$r->id_solicitud ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                                <?php } ?>
                            </td>
                            <td class="span1 text-left">
                        <?php if($r->estado_solicitud=='CERR'){ ?>
                                <a href="controlador.php?action=validar_solicitud&id_solicitud=<?php echo (int)$r->id_solicitud ?> "><img style="cursor: pointer;" src="img/you_ok.png"/>
                                    <?php } ?>
                            </td>

                        </tr>
                        <tr style="display:none;" id="nota_<?php echo $r->id_solicitud; ?>">
                            <td colspan="10">
                                <table>
                                    <tr>
                                        <td><strong>Estado</strong></td>
                                        <td><strong>Nota</strong></td>
                                        <td><strong>Fecha Hora</strong></td>
                                        <td><strong>Archivo</strong></td>
                                    </tr>
                                    <?php
                                    if($notas){
                                        foreach ($notas as $c){
                                            ?>
                                            <tr>
                                                <td><?php echo $c->proviene; ?></td>
                                                <td><?php echo $c->nota; ?></td>
                                                <td><?php echo $c->fecha_hora; ?></td>
                                                <td>
                                                    <?php echo ($c->archivo)?"<a href='archivos_solicitudes/".$r->id_solicitud."/".$c->id_registro."_".$c->archivo."' target='_blank'><img src='img/resultado.png'>":"No Contiene Archivo"; ?>
                                                </td>
                                            </tr>
                                        <?php }}else{
                                        ?>
                                        <tr>
                                            <td>No Contiene Notas </td>
                                        </tr>
                                        <?php
                                    } ?>
                                </table>
                            </td>
                            <td>
                                <img onclick="cierre_notas(<?php echo $r->id_solicitud ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                            </td>
                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay solicitudes cargadas cargadas</td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
<script>
    function ver_notas(value){
        $("#nota_"+value).show();
    }
    function cierre_notas(value){
        $("#nota_"+value).hide();
    }
</script>
<?php include_once 'footer.php' ?>
