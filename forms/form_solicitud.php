<body>
<!--/********jquery.validity******************/-->
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery-1.9.0.min.js"></script>
<script src="validate/jquery.validity.js"></script>
<script>
    $(function () {
        $("#form_datos").validity(function () {
            $("#sector").require();
            $("#estado_equipo").require();
            $("#fecha_requerido").require();
            $("#descripcion_falla").require();
        });
    });
</script>
<!--/**************************/-->
<div id="page-content">

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Solicitud de Mantenimiento Correctivo</h4>
        </div>
        <div class="block-content">

            <form id="form_datos" method="post" class="form-horizontal" enctype="multipart/form-data">
                <!-- Default Inputs -->

                <div class="control-group">
                    <label class="control-label" for="general-text">Solicitante </label>
                    <label class="control-label">
                        <?php
                        if($_REQUEST['id_solicitud']) {
                           echo $result->nombre_persona;
                        }else{
                            echo $_SESSION['nombre'];
                        }?>
                    </label>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text">Equipo </label>
                    <label class="control-label">
                        <?php echo $result->armado . "-" . $result->num_interno; ?>
                    </label>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Fuera de funcionamiento? </label>
                    <label class="control-label">
                        <select name="estado_equipo" id="estado_equipo">
                            <option value="">Seleccione Estado</option>
                            <option value="S" <?php echo (isset($result->estado_equipo) == 'S') ? "selected" : ""; ?>>
                                Si
                            </option>
                            <option value="N" <?php echo (isset($result->estado_equipo) == 'N') ? "selected" : ""; ?>>
                                No
                            </option>
                        </select>
                    </label>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Mantenimiento requerido para</label>
                    <label class="control-label">
                        <input value="<?php echo (isset($result->requerido_para)) ? $result->requerido_para : ""; ?>"
                              readonly id="requerido_para" name="requerido_para" class="span5" type="text">
                    </label>
                </div>
                <div class="control-group">
                    <?php
                    if($result->archivo!=''){
                    if (file_exists("archivos_solicitudes/".$result->id_solicitud."_".$result->archivo)) {
                    ?>
                    <img src="img/resultado.png" /> <?php echo $result->archivo ?><a href="controlador.php?action=eliminar_archivo_solicitud&archivo=<?php echo $result->archivo ?>&id_solicitud=<?php echo (int)$result->id_solicitud ?>"><img src="img/delete.png" /></a>
                    <?php
                    }else{ ?>
                        <input type="file" id="archivo" name="archivo">
                    <?php }
                    }else{ ?>
                        <input type="file" id="archivo" name="archivo">
                    <?php }
                    ?>
<!--                    <input type="file" id="archivo" name="archivo">-->
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion de la falla o averia</label>
                    <label class="control-label">
                        <textarea id="descripcion_falla" name="descripcion_falla"><?php echo $result->descripcion_falla; ?></textarea>
                    </label>
                </div>
                <div class="form-actions">
                    <input id="id_equipo" type="hidden" name="id_equipo"
                           value="<?php echo (isset($result->id_equipo)) ? $result->id_equipo : ""; ?>">
                    <input id="id_solicitud" type="hidden" name="id_solicitud"
                           value="<?php echo (isset($result->id_solicitud)) ? $result->id_solicitud : ""; ?>">
                    <input id="action" type="hidden" name="action" value="<?php if($_REQUEST['id_solicitud']) { echo "guardar_edicion_solicitud"; }else{ echo "guardar_solicitud"; }?>">
                    <button type="reset" onclick="location.href='controlador.php?action=buscar_equipo_correctivo'"
                            class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="save_datos_solicitud()" type="button" class="btn btn-success"><i
                            class="icon-ok"></i>
                        <?php
                        if($_REQUEST['id_solicitud']) {
                            echo "Editar Solicitud";
                        }else{
                            echo "Enviar Solicitud";
                        }?>

                    </button>
                </div>
            </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
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
            <th style="width: 15%;" >Requerido para</th>
            <th style="width: 25%;" >Solicitante</th>
            <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>


        </tr>
        </thead>

        <tbody>
        <?php
        $k=0;
        if($historial_equipo){
            foreach ($historial_equipo as $r) {
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
                    case "SOL": $letra="#FFF"; break;
                    case "TRAT": $letra="#000"; break;
                    case "CERR": $letra="#000"; break;
                    case "VAL": $letra="#000"; break;
                }
                $notas=$consultas->getNotasSolicitud($r->id_solicitud);
                ?>
                <tr style="background: <?php echo $color; ?>;color: <?php echo $letra; ?>;">
                    <td class="span1 text-left"><?php echo $r->id_solicitud; ?></td>
                    <td class="span1 text-left"><?php echo $r->armado." - ".$r->num_interno; ?></td>
                    <td class="span1 text-left"><?php echo $r->tipo_equipo; ?></td>
                    <td class="span1 text-left"><?php echo $r->fecha_solicitud; ?></td>
                    <!--                    <td class="span1 text-left">--><?php //echo $r->sector_des; ?><!--</td>-->
                    <td class="span1 text-left"><?php echo $r->descripcion_falla; ?></td>
                    <td class="span1 text-left"><?php echo ($r->estado_equipo=='S')?"Si":"No"; ?></td>
                    <td class="span1 text-left"><?php echo ($etado=='Tratado')?$etado."<img src='img/usuario.png' style='cursor: pointer;'  title='Asignado a' data-toggle='popover' data-html='true'  data-trigger='hover' data-content='<strong>".$r->proveedor."</strong>' >":$etado; ?></td>
                    <td class="span1 text-left"><?php echo $r->requerido_para; ?></td>
                    <td class="span1 text-left"><?php echo $r->usuario; ?></td>
                    <td><img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_notas(<?php echo (int)$r->id_solicitud ?>)"/></td>

                </tr>
                <tr style="display:none;" id="nota_<?php echo $r->id_solicitud; ?>">
                    <td colspan="9">
                        <table>
                            <tr>
                                <td><strong>Nota</strong></td>
                                <td><strong>Fecha Hora</strong></td>
                                <td><strong>Archivo</strong></td>
                            </tr>
                            <?php
                            if($notas){
                                foreach ($notas as $c){
                                    ?>
                                    <tr>
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
                <td colspan="5" class="span1 text-left">No hay solicitudes cargadas previas</td>
            </tr>
            <?php
        } ?>
        </tbody>
    </table>
</div>



<?php include_once 'footer.php' ?>

    <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>

<script>
    $j=jQuery.noConflict();
    $j("#requerido_para").datepicker({
        minDate: "D",
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
    });

    function ver_notas(value){
        $j("#nota_"+value).show();
    }
    function cierre_notas(value){
        $j("#nota_"+value).hide();
    }
</script>
