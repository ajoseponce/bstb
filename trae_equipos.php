<?php 
    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getEquiposFiltros($_REQUEST);
?>
<table class="table">
    <thead>
        <tr style="background: red;" >
            <th>Tipo/Numero</th>
            <th style="width: 35px;">Equipo</th>
            <th>Sector</th>
            <th style="width: 45px;">Ubicaci&oacute;n</th>
            <th style="width: 75px;">Marca</th>
            <th style="width: 75px;">Modelo</th>
            <th>Nro Serie</th>
            <th>Num.Inventario</th>
            <th>MPN</th>
            <th>MP</th>
            <th>MC</th>
            <th style="width: 35px;">Ficha T&eacute;cnica</th>
            <th style="width: 35px;">Manual</th>
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
            <td><?php echo $r->sector_nombre; ?></td>
            <td><?php echo $r->lugar_nombre; ?></td>
            <td><?php echo $r->nombre_marca; ?></td>
            <td><?php echo $r->modelo; ?></td>
            <td><?php echo $r->nro_serie; ?></td>
            <td><?php echo $r->num_patrimonio; ?></td>
            <td><?php
                if($mpn->total!=0){
                    if($mpn->titulo!='N/A') {
                        ?>
                        <img src='./img/green_alert.png'/>
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
                        <img src='./img/green_alert.png'/>
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
                        <img src='./img/green_alert.png'/>
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
                <a target="_blank" href="fichas/<?php echo $r->ficha_tecnica ?>"><img src="./img/document.png" style="cursor:pointer;" title="<?php echo $r->ficha_tecnica ?>"  /></a>
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
                    <a target="_blank" href="manuales/<?php echo $r->manual_nombre ?>"><img src="./img/document.png" style="cursor:pointer;" title="<?php echo $r->manual_nombre ?>"  /></a>
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
            <td>
                <?php
                $TPersona=$consultas->getContadorPersona($r->id_equipo);
                if($TPersona>0){
                    $cartel="btn-large";
                }else{
                    $cartel="btn-warning";
                }
                ?>
                <a href="#modal-regular" onclick="verPopoupModal(<?php echo (int)$r->id_equipo ?>)" class="btn btn-large <?php echo $cartel; ?>" data-toggle="modal"><i class="glyphicon-group"></i></a>
            </td>
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
            </td>
            <td class="span2 text-left"><img style="cursor: pointer;" src="img/cierra_info.png" onclick="cierra_detalle(<?php echo (int)$r->id_equipo ?>)"/>
            </td>
        </tr>
    <?php  }?>
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
        <?php
    } ?>
    </tbody>

</table> 