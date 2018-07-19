<body>

<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_no_conformidades'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar hallazgo</button>

    </div>
    <div class="block block-themed block-last" >
        <div class="block-content">
            <table class="table">
                <thead>
                <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Sectores:
                        <input  id="sector"  style="width:400px;" value="" name="sector"  class="input-large" type="text">
                        <input  id="sectorID"  name="sectorID"  class="input-large" value="" type="hidden">
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpiar_sector()">
                    </td>
                    <td>
                        Procesos:
                        <input  id="proceso"  name="proceso" style="width: 400px;"  class="input-large" value="" type="text">
                        <input  id="procesoID"  name="procesoID" type="hidden" value="">
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpiar_proceso()">
                    </td>
                </tr>
                <tr>
                    <td>
                        Estado:
                        <select id="estado"  onchange="trae_nc()" name="estado" size="1">
                            <option value="">Seleccione un estado</option>
                            <option value="N">Nueva</option>
                            <option value="As">Derivado</option>
                            <option value="R">Respondido/Tratado</option>
                            <option value="V">Implementado(Eficacia no Verificada)</option>
                            <option value="C">Cerrada</option>
                            <option value="A">Anulada</option>
                        </select>
                    </td>
                    <td>
                        Tipo hallazgo:
                        <select  onchange="trae_nc()" id="tipo" name="tipo" size="1">
                            <option value="">Seleccione tipo</option>\
                            <option value="nc">No Conformidad</option>
                            <option value="o">Observacion</option>
                            <option value="m">Mejora</option>

                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Fecha Desde
                        <input type="text"  value="" id="fecha_desde"  name="fecha_desde" type="text">
                    </td>
                    <td>Fecha Hasta
                        <input type="text"  value="" id="fecha_hasta"  name="fecha_hasta" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Origen de hallazgo:
                        <select id="origen"  onchange="trae_nc()" name="origen" size="1">
                            <option value="">Seleccione un estado</option>
                            <option value="e">Espontanea del BSTB</option>
                            <option value="ai">Auditoria Interna</option>
                            <option value="ae">Auditoria Externa</option>
                            <option value="p">Proveedor</option>
                            <option value="r">Reclamo de Parte Interesada</option>
                            <option value="st">STH</option>
                        </select>
                    </td>
                    <td>
                        Nro. de hallazgo:
                        <input type="text"  value="" onchange="trae_nc()" id="numero"  name="numero" type="text">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Origen de hallazgo:
                            <select id="nivel_riesgo"  onchange="trae_nc()"  name="nivel_riesgo" size="1">
                                <option value="">No Aplica</option>
                                <option value="Extremo">Extremo</option>
                                <option value="Alto">Alto</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                            </select>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <img src="img/pdf.png"   onclick="exporta_pdf_nc()" style="cursor: pointer;" />
                    </td>
                </tr>

                </tbody>
            </table>
      <div class="block-content" id="listado" style="overflow: auto;">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 5%;">Num. NC</th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">Fecha</th>
                    <th style="width: 15%;">Sector</th>
                    <th style="width: 15%;">Proceso</th>
                    <th style="width: 35%;">Descripcion</th>
                    <th style="width: 10%; text-align: center;">Tipo</th>
                    <th style="width: 10%; text-align: center;">Nivel de Riesgo</th>
                    <th style="width: 10%; text-align: center;">Estado</th>
                    <th style="width: 10%; text-align: center;">Asignado</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                    <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $k=0;
                if($result){
                    foreach ($result as $r) {
                        switch ($r->estado) {
                            case "N": $color="#CD0000"; break;
                            case "As": $color="#FCB153"; break;
                            case "R": $color="#EBDC8B"; break;
                            case "C": $color="#7DCBB5"; break;
                            case "A": $color="#E0E0E0"; break;
                            case "V": $color="#929CBF"; break;
                        }

                        ?>
                        <tr style="background: <?php echo $color; ?>">
                            <td class="span1 text-left"><?php echo $r->id_no_conformidad; ?></td>
                            <td class="span1 text-center">
                                <img src="img/usuario.png" style="cursor: pointer;"  title="Usuario de carga" data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo $r->informador; ?></strong>" >
                            </td>
                            <td class="span1 text-left"><?php echo $r->fecha." ".$r->hora; ?></td>
                            <td class="span1 text-left"><?php echo $r->sector; ?></td>
                            <td class="span1 text-left"><?php echo $r->proceso; ?></td>
                            <td class="span1 text-left"><?php echo substr($r->descripcion, 0, 40 ); ?><img src="img/mas_descripcion.png" onclick="ver_descripcion_pop(<?php echo $r->id_no_conformidad;?>)"/></td>
                            <td class="span1 text-left"><?php
                                echo ($r->tipo=='nc')?"No Conformidad":"";
                                echo ($r->tipo=='o')?"Observacion":"";
                                echo ($r->tipo=='m')?"Mejora":"";
                                ?>
                            </td>
                            <td class="span1 text-left"><?php
                                echo ($r->nivel_riesgo=='')?"No Aplica":"";
                                echo ($r->nivel_riesgo=='Extremo')?"<img src='img/semaforo_rojo.png' style='width: 35px; height: 45px;'/>Extremo":"";
                                echo ($r->nivel_riesgo=='Alto')?"<img src='img/semaforo_amarillo.png' style='width: 35px; height: 45px;'/>Alto":"";
                                echo ($r->nivel_riesgo=='Medio')?"<img src='img/semaforo_verde.png' style='width: 35px; height: 45px;'/>Medio":"";
                                echo ($r->nivel_riesgo=='Bajo')?"Bajo":"";
                                ?>

                            </td>
                            <td class="span1 text-center"><?php
                                echo ($r->estado=='N')?"Nuevo":"";
                                echo ($r->estado=='As')?"Derivado":"";
                                echo ($r->estado=='V')?"Implementado(Eficacia no Verificada)":"";
                                echo ($r->estado=='R')?"Respondido/Tratado":"";
                                echo ($r->estado=='C')?"Cerrado     ":"";
                                echo ($r->estado=='A')?"Anulada":"";
                                ?></td>
                            <td class="span1 text-center">
                                <?php if($r->estado=='R' || $r->estado=='As'){ ?>
                                    <img src="img/usuario.png" style="cursor: pointer;"  title="<?php echo  "Sector: ".$r->sector_derivado_desc; ?> " data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo  "Resp: ".$r->responsable_sector; ?></strong>" >
                                <?php }?>
                                &nbsp;
                            </td>
                            <td class="span1 text-center">
                                <?php if(isset($r->archivo)){ ?>
                                    <a href="archivos_nc/<?php echo (isset($r->archivo))?$r->id_no_conformidad.'-'.$r->archivo:""; ?>" target="_blank"><img src="img/resultado.png" title="Imagen Adjunta" style="cursor: pointer"></a>
                                <?php }else{ echo "No contiene archivos"; } ?>
                                &nbsp;
                            </td>
                            <td class="span1 text-center">
                                <?php if($r->usuario==$_SESSION[id] && ($r->estado!='C' && $r->estado!='A')){ ?>
                                    <a href="controlador.php?action=edita_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/edit.png" title="Editar hallazgo"></a>
                                <?php } ?>
                            </td>
                            <td class="span1 text-center">
                                <?php if($r->estado=='N' || $r->estado=='As'){ ?>
                                <a href="controlador.php?action=derivar_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/asignar.png" title="Derivar hallazgo"></a>
                                <?php }else{ echo "&nbsp;"; } ?>
                            </td>
                            <td class="span1 text-left">
                                <img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle_pop(<?php echo $r->id_no_conformidad;?>)"/>
                            </td>
                            <td class="span1 text-center">
                                    <?php if($r->descripcion_analisis!="  " && $r->estado=='R' && $r->tipo=='nc'){ ?>
                                    <a href="controlador.php?action=implementacion_nc&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/implementacion.png" title="Implementacion verificada"></a>
                                    <?php }else{ echo "&nbsp;"; } ?>
                            </td>
                            <td class="span1 text-center">
                                <?php if($r->estado=='V'){ ?>
                                    <a href="controlador.php?action=eficacia_nc&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/verifica.png" title="Implementacion verificada"></a>
                                <?php }else{ echo "&nbsp;"; } ?>
                            </td>
                            <?php if($r->estado!='C'){ ?>
                            <td class="span1 text-center">
                                <a href="controlador.php?action=terminar_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/exit.png" title="Cerrar/Anular hallazgo"></a>
                            </td>
                            <?php } ?>
                        </tr>
                        <tr style="display:none;" id="descripcion_<?php echo $r->id_no_conformidad; ?>">
                            <td colspan="12">
                                <?php echo $r->descripcion; ?>
                            </td>
                            <td colspan="1">
                                <img onclick="cierre_descripcion(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                            </td>
                        </tr>
                        <!--//************************************//-->
                        <tr style="display:none;" id="respuesta_<?php echo $r->id_no_conformidad; ?>">
                            <td colspan="7" class="span1 text-left">
                                <?php //print_t($r);
                                echo "<strong>Respuesta: </strong>".$r->respuesta." </br>";
                                echo "<strong>Analisis:</strong> ".$r->descripcion_analisis." </br>";
                                echo "<strong>Accion:</strong> ".$r->descripcion_accion." </br>";
                                echo "<strong>Fecha Accion:</strong> ".$r->fecha_accion." </br>";
                                echo "<strong>Rsponsable Accion:</strong> ".$r->responsable." </br>";
                                echo ($r->observacion_implementacion)?"<strong>Observaciones de implementacion:</strong> ".utf8_decode($r->observacion_implementacion)." </br>":"";
                                echo ($r->observacion_eficacia)?"<strong>Observaciones de eficacia:</strong> ".utf8_decode($r->observacion_eficacia)." </br>":"";
                                echo ($r->observaciones)?"<strong>Observaciones:</strong> ".$r->observaciones." </br>":"";
                                ?>
                            </td>
                            <td class="span1 text-left"><img onclick="cierre_detalle(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/></td>
                        </tr>
                        <!--//************************************//-->
                    <?php  }
                }else{
                    ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No se encuentran No conformidades</td>
                    </tr>

                    <?php
                } ?>

            </table>

        </div>
    </div>
    <!-- END Modal Tabs -->
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script>
    function ver_detalle_pop(value){
       // alert('hola');
        $("#respuesta_"+value).show();
    }

    function cierre_detalle(value){
        $("#respuesta_"+value).hide();
    }
    function ver_descripcion_pop(value){
        //alert('hola');
        $("#descripcion_"+value).show();
    }
    function cierre_descripcion(value){
        $("#descripcion_"+value).hide();
    }
    function limpiar_sector(){
       //alert('hollllllla diria josefina');
        $("#sector").val('');
        $("#sectorID").val('');
    }
    function limpiar_proceso(){
        //alert('hola diria josefina');
        $("#proceso").val('');
        $("#procesoID").val('');
    }

    //inicializa los popover
    $('[data-toggle="popover"]').popover();



    $(document).ajaxComplete(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>
<script src="js/funciones.js"></script>
<script type="text/javascript">

   newSuggestFiltroNC('sector', 'sectorID', 'S');
   newSuggestFiltroNC('proceso', 'procesoID', 'Ar');

</script>
</body>
</html>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        //alert('bueno');
        $j("#fecha_desde").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            onSelect:  function(dateText) {
                trae_nc();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
        $j("#fecha_hasta").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            onSelect:  function(dateText) {
                trae_nc();
            },
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
    //        function  ver_cambio(){
    //
    //        }
</script>