
<script src="js/jquery-ui.js"></script>
<div id="page-content" >
<div class="clearfix">
   <button onclick="location.href='controlador.php?action=cargar_equipo'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo Equipo</button>
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Equipos</h4>
    </div>
<div class="block-content">
    <?php // echo $cartel; ?>
<table class="table">
    <thead>
        <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
    </thead>
    <tbody>
        <tr>
            <td>
               Ubicacion:
                <input  id="lugar" type="text" style="width: 350px; " name="lugar" value="<?php echo $_REQUEST['lugar_filtro_texto'];  ?>">
                <input id="lugar_filtro" value="<?php echo $_REQUEST['lugar_filtro'];  ?>" type="hidden" name="lugar_filtro">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_lugar()">
            </td>    
            <td>
                Sector:
                <input id="sector_filtro"  type="text" style="width: 350px; " name="sector_filtro" value="<?php echo $_REQUEST['sector_filtro'];  ?>">
                <input id="sector_filtroID" value="<?php echo $_REQUEST['sector_filtroID'];  ?>" type="hidden" name="sector_filtroID">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_sector()">
            </td>
        </tr>  
        <tr>
            <td>
                Tipo Equipo: 
                <select id="tipo_equipo_filtro"  onchange="filtrar_listado_equipo()" name="tipo_equipo_filtro" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($_REQUEST['tipo_equipo_filtro']==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </td>    
            <td>
                Marca: 
                <select  onchange="filtrar_listado_equipo()" id="marca_filtro" name="marca_filtro" size="1">
                    <option value="0">Seleccione marca</option>
                    <?php
                    $k=0;
                    if($result_marcas){
                    foreach ($result_marcas as $m) {
                    ?>
                    <option value="<?php echo $m->id_marca ?>" <?php if($m->id_marca==$_REQUEST['marca_filtro']){ echo "selected='selected'";} ?> ><?php echo $m->descripcion ?></option>
                    <?php }} ?>
                </select>
            </td>    
        </tr>
        <tr>
            <td>
                Numero de Serie:
                <input value="<?php echo $_REQUEST['num_serie'];  ?>"  onchange="filtrar_listado_equipo()" id="num_serie" type="text" name="num_serie">

            </td>
            <td>
               </td>
        </tr>
        <tr>
            <td  style="text-align: left;">
                <button onclick="filtrar_listado_equipo()" class="btn btn-success">Buscar</button>
            </td>
            <td style="text-align: right;">
                <img src="img/exel.png" onclick="exporta_equipos()" style="cursor: pointer;" />
            </td>
        </tr>


    </tbody>
</table>
    <div  id="modal-regular" class="modal fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4> Personas por equipo:  </h4>
        </div>
        <div class="modal-body">
            <p>Buscar Personas </p>
            <p>
                <input name="personas" id="personas" value="">
                <input name="personasID" id="personasID" type="hidden" value="">
                <input name="equipoID" id="equipoID" type="hidden" value="">
            </p>
            <p>Tipo de Manteniemiento</p>
            <p>
                <select name="tipo_mantenimiento" id="tipo_mantenimiento">
                    <option value="1">Primer Nivel</option>
                    <option value="2">Preventivo</option>
                    <option value="3">Calibracion</option>
                </select>
            </p>
        </div>
        <div class="modal-footer">
            <button onclick="guardarRelacionEquipoPersona()" class="btn btn-success">Guardar</button>
        </div>
        <div class="modal-header">
            <h4> Personas :  </h4>

        </div>
        <div id="personas_equipo"></div>
    </div>
    <?php include 'detalle_mantenimiento.php'; ?>
<div id="tabla_listado" class="double-scroll">
<table class="table">

    <thead>
        <tr style="background: red;" >
            <th>Tipo/Numero</th>
            <th>Equipo</th>
            <th>Sector</th>
            <th>Ubicaci&oacute;n</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Nro Serie</th>
            <th>Num.Inventario</th>
            <th>MPN</th>
            <th>MP</th>
            <th>MC</th>
            <th>Ficha T&eacute;cnica</th>
            <th>Manual</th>
            <th style="width: 5px;">Editar</th>
            <th style="width: 5px;">Mas Info</th>
            <th style="width: 5px;">&nbsp;</th>
            <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

        </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
    $mpn=$consultas->getPrimerNivel($r->id_equipo);
    $mp=$consultas->getPreventivo($r->id_equipo);
    $mc=$consultas->getCalibracion($r->id_equipo);
    ?>
        <tr>
            <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td class="span1 text-left"><?php echo $r->equipo; ?></td>
            <td><?php echo utf8_decode($r->sector_nombre); ?></td>
            <td><?php echo $r->lugar_nombre; ?></td>
            <td><?php echo $r->nombre_marca; ?></td>
            <td><?php echo $r->modelo; ?></td>
            <td><?php echo $r->nro_serie; ?></td>
            <td><?php echo $r->num_patrimonio; ?></td>
            <td><?php
                if($mpn->total!=0){
                    if($mpn->titulo!='N/A') {
                        ?>
                      <a href="#modal_detalle_mantenimeinto"  onclick="verDetalleMantenimiento('<?php echo $r->tipo_equipo; ?>', '1', 'Mantenimiento de Primer Nivel')"  data-toggle="modal"><img src='./img/green_alert.png'/></a>
                        <?php
                    }else{ ?>
                        <img src='./img/no_aplica.png'/>
                        <?php
                    }
                }else{ ?>
                    <img src='./img/red_alert.png'/>
                <?php } ?>
            </td>
            <td><?php
                if($mp->total!=0){
                    if($mp->titulo!='N/A') {
                        ?>
                        <a href="#modal_detalle_mantenimeinto"  onclick="verDetalleMantenimiento('<?php echo $r->tipo_equipo; ?>', '2', 'Mantenimiento preventivo')"  data-toggle="modal"><img src='./img/green_alert.png'/></a>
<!--                        <img src='./img/green_alert.png'/>-->
                        <?php
                    }else{ ?>
                        <img src='./img/no_aplica.png'/>
                        <?php
                    }
                }else{ ?>
                    <img src='./img/red_alert.png'/>
                <?php } ?>
            </td>
            <td><?php
                if($mc->total!=0){
                    if($mc->titulo!='N/A') {
                        ?>
                        <a href="#modal_detalle_mantenimeinto"  onclick="verDetalleMantenimiento('<?php echo $r->tipo_equipo; ?>', '3', ' Calibracion')"  data-toggle="modal"><img src='./img/green_alert.png'/></a>
                        <?php
                    }else{ ?>
                        <img src='./img/no_aplica.png'/>
                        <?php
                    }
                }else{ ?>
                    <img src='./img/red_alert.png'/>
                <?php } ?>
            </td>
            <td class="span1 text-left">
                <?php
                if($r->ficha_tecnica!=NULL){
                    if (file_exists("fichas/".$r->ficha_tecnica)) { ?>
                <a target="_blank" href="fichas/<?php echo $r->ficha_tecnica ?>"><img src="./img/document.png" style="cursor:pointer;" title="<?php echo $r->ficha_tecnica ?>" /></a>
                    <?php
                    }else{
                    echo "No contiene ficha tecnica.";
                    }
                }else{
                    echo "No contiene ficha tecnica.";
                    } ?>
            </td>
            <td>
                <?php
                if($r->manual_nombre!=NULL){
                    if (file_exists("manuales/".$r->manual_nombre)) { ?>
                    <a target="_blank" href="manuales/<?php echo $r->manual_nombre ?>"><img src="./img/document.png"  style="cursor:pointer;" title="<?php echo $r->manual_nombre ?>" /></a>
                    <?php
                    }else{
                    echo "No contiene Manual.";
                    }
                }else{
                    echo "No contiene Manual.";
                    } ?>
            </td>
            <td>
<!--                <a href="controlador.php?action=edita_equipo&id_equipo=--><?php //echo (int)$r->id_equipo ?><!--">-->
                    <img style="cursor: pointer;" onclick="EditaEquipo('<?php echo (int)$r->id_equipo ?>')" src="img/edit.png"/>
<!--                </a>-->
            </td>
            <td><img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle(<?php echo (int)$r->id_equipo ?>)"/></td>
            <td><?php
                $TPersona=$consultas->getContadorPersona($r->id_equipo);
                if($TPersona>0){
                    $cartel="btn-large";
                }else{
                    $cartel="btn-warning";
                }
                ?>
                <a href="#modal-regular" onclick="verPopoupModal(<?php echo (int)$r->id_equipo ?>)" class="btn btn-large <?php echo $cartel; ?>" data-toggle="modal"><i class="glyphicon-group"></i></a></td>
            <td>
                <img  onclick="EliminaEquipo('<?php echo (int)$r->id_equipo ?>')" style="cursor: pointer;" src="img/delete.png"/>
            </td>
        </tr>
        <tr id="detalle_<?php echo (int)$r->id_equipo ?>" style="display:none;">
            <td colspan="12" class="span1 text-left">
            <strong>Marca: </strong><?php echo $r->nombre_marca; ?></br>
            <strong>Clasificacion: </strong><?php echo $r->clasificacion; ?></br>
            <strong>Estado: </strong><?php echo $r->estado; ?></br>
            <strong>Proveedor: </strong><?php echo $r->proveedor_nombre; ?></br>
            <strong>Direccion: </strong><?php echo $r->direccion; ?></br>
            <strong>Telefono: </strong><?php echo $r->telefono; ?></br>
            <strong>Contacto: </strong><?php echo $r->contacto; ?></br>
            <strong>Mail: </strong><?php echo $r->mail; ?></br>
            <strong>Fecha Ingreso: </strong><?php echo $r->fecha_ingreso; ?></br>
            <strong>Consumo Electrico: </strong><?php echo $r->consumo; ?></br>
            <strong>Responsable: </strong><?php echo $r->responsable; ?></br>
            <strong>Observaciones: </strong><?php echo $r->observaciones; ?></br>
            </td>
            <td class="span2 text-left"><img style="cursor: pointer;" src="img/cierra_info.png" onclick="cierra_detalle(<?php echo (int)$r->id_equipo ?>)"/>
            </td>
        </tr>
    <?php  }} ?>
    </tbody>
    <tr style="background: red;">
        <td colspan="13" style="color: #fff;
    padding-bottom: 10px;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 14px;
    font-size: 16px;
    font-weight: bold;">
            Total de Equipo: <?php echo count($result); ?>
        </td>
    </tr>
</table>
</div>
</div>
</div>
</div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestListaEquipo('lugar', 'lugar_filtro', 'LE');
    newSuggestListaEquipo('sector_filtro', 'sector_filtroID', 'S');
    newSuggest('personas', 'personasID', 'P');
</script>
<?php include_once 'footer.php' ?>
</body>



