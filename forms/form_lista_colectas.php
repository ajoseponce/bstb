<body>
<div id="page-content" >
    <div class="block block-themed block-last">

        <div class="block-content">
<!--    <div class="clearfix">-->
<!--        <button onclick="location.href='controlador.php?action=carga_colecta'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar una nueva colecta</button>-->
<!--    </div>-->

        <div class="block-content" style="overflow: auto;">
            <table class="table">
                <thead>
                <tr style="background: red; font-size: 11px;" >
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="width: 15%;">Fecha</th>
                    <th style="width: 20%;">Localidad</th>
                    <th style="width: 20%;">Lugar</th>
                    <th style="width: 20%;">Movil</th>
                    <th style="width: 20%;">Chofer</th>
                    <th style="width: 35%;" >Contacto</th>
                    <th style="width: 35%;" >Estimados</th>
                    <th style="width: 35%;"> Hora Salida</th>
                    <th style="width: 35%;"> Inicio</th>
                    <th style="width: 35%;">  Fin</th>
                    <th style="width: 35%;">Responsable</th>
                    <th style="min-width: 20px;"></th>
                    <th style="width: 5%;">Int. </th>
                    <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result){
                    foreach ($result as $r) {
                        $color='';
                        $result_resultado= $consultas->getResultadoColectaByID($r->id_colecta);
                        $barteder=(($result_resultado->don_asistidos-$result_resultado->don_diferidos)*100)/$r->donantes_estimados;
                        if($barteder<50 && $barteder!=0) {
                            $color="#F1ACBE";
                        }
                        if($barteder>100 && $barteder!=0) {
                            $color="#7DCBB5";
                        }
                        if($barteder>50 && $barteder<100) {
                            $color="#EBDC8B";
                        }

                        if($barteder==0) {
                            $color="#F1ACBE";
                        }
                        //echo $barteder;
                        ?>
                        <tr style="font-size: 11px; background: <?php echo $color; ?>">

                            <td class="span1 text-left">
                                <?php if($r->usuario==$_SESSION['id']){ ?>
                                <a href="controlador.php?action=edita_colecta&id_colecta=<?php echo (int)$r->id_colecta ?>"><img style="cursor: pointer;" src="img/edit.png"/></a>
                                <?php } ?>
                            </td>
                            <td class="span1 text-left">
                                <?php if($r->usuario==$_SESSION['id']){ ?>
                                    <a href="controlador.php?action=resultado_colecta&id_colecta=<?php echo (int)$r->id_colecta ?>"><img style="cursor: pointer;" src="img/resultado.png"/></a>
                                <?php } ?>
                            </td>
                            <td class="span1 text-left">
                                <?php if($consultas->getUsuarioHemovigilancia()!=0){ ?>
                                    <a href="controlador.php?action=resultado_colecta_hemovigilancia&id_colecta=<?php echo (int)$r->id_colecta ?>"><img style="cursor: pointer;" src="img/police.png"/></a>
                                <?php } ?>
                            </td>
                            <td class="span1 text-left"><?php echo $r->fecha_colecta; ?></td>
                            <td class="span1 text-left"><?php echo $r->localidad ?></td>
                            <td class="span1 text-left"><?php echo $r->lugar; ?></td>
                            <td class="span1 text-left"><?php echo $r->movil; ?></td>
                            <td class="span1 text-left"><?php echo $r->chofer; ?></td>
                            <td class="span1 text-left"><?php echo $r->contacto; ?></td>
                            <td class="span1 text-left"><?php echo $r->donantes_estimados; ?></td>
                            <td class="span1 text-left"><?php echo $r->hora_salida; ?></td>
                            <td class="span1 text-left"><?php echo $r->hora_inicio; ?></td>
                            <td class="span1 text-left"><?php echo $r->hora_fin; ?></td>
                            <td class="span1 text-center">
                                <img src="img/responde.png" style="cursor: pointer;" title="<?php echo $r->responsable; ?>"/>
                            </td>
                            <td class="span1 text-center"><img src="img/calendario.png" title="<?php echo $r->fecha_creacion; ?>"/></td>
                            <td class="span1 text-center">
                                <img style="cursor: pointer" src="img/integrantes.png" onclick="ver_detalle(<?php echo $r->id_colecta ?>)"/>
                            </td>
                            <td class="span1 text-center">
                            <?php
                            if($result_resultado) {
                                ?>
                                <img style="cursor: pointer" title="Resultado Colecta" src="img/resultado.png"
                                     onclick="ver_resultado(<?php echo $r->id_colecta ?>)"/>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <tr style="display:none;" id="integrantes_<?php echo $r->id_colecta ?>">
                            <td colspan="10" class="span1 text-left">
                                <?php
                                $result_integrantes= $consultas->getIntegrantescolecta($r->id_colecta);
                                if($result_integrantes){
                                    foreach ($result_integrantes as $i) {  ?>
                                            <div><img src="img/person.png" /> <?php echo $i->integrante ?></div>
                                    <?php  }} ?>
                            </td>
                            <td class="span1 text-left"><img onclick="cierre_detalle(<?php echo $r->id_colecta ?>)" src="img/delete.png"/></td>
                        </tr>
                        <tr style="display:none;" id="resultado_<?php echo $r->id_colecta ?>">
                            <td colspan="12" class="span1 text-left">
                                <?php
                                if($result_resultado){
                                ?>
                                    <div><strong>Preparacion Insumos :</strong><?php echo ($result_resultado->preparacion=="N")?"Si":"No"; ?></div>
                                    <div><strong>Materiales: </strong><?php echo ($result_resultado->material=="S")?"Si":"No"; ?></div>
                                    <div><strong>Limpieza Movil: </strong><?php echo ($result_resultado->limpieza_movil=="L")?"Limpio":"Sucio"; ?></div>
                                    <div><strong>Asistidos:  </strong><?php echo $result_resultado->don_asistidos ?></div>
                                    <div><strong>Diferidos:  </strong><?php echo $result_resultado->don_diferidos ?></div>
                                    <div><strong>Extracciones:  </strong><?php echo $result_resultado->don_asistidos-$result_resultado->don_diferidos ?></div>
                                    <div><strong>Reactivos:  </strong><?php echo $result_resultado->don_reactivos ?></div>
                                    <div><strong>Informados:  </strong><?php echo $result_resultado->don_informados ?></div>
                                    <div><strong>Extracciones:  </strong><?php echo $result_resultado->don_asistidos-$result_resultado->don_diferidos ?></div>
                                    <div><strong>Unidades Bajo Vol.: </strong><?php echo $result_resultado->unidades_bajo_vol ?></div>
                                    <div><strong>Muestras Analiticas: </strong><?php echo $result_resultado->muestras_analiticas ?></div>
                                    <div><strong>Efectos Adversos: </strong><?php echo $result_resultado->efectos_adversos ?></div>
                                    <div><strong>Condicion Lugar: </strong><?php echo ($result_resultado->condicion_lugar=="A")?"Apropiado":"Inapropiado" ?></div>
                                    <div><strong>Ventilacion</strong><?php echo ($result_resultado->ventilacion=="A")?"Apropiado":"Inadecuado"; ?></div>
                                    <div><strong>Iluminacion </strong><?php echo ($result_resultado->iluminacion=="A")?"Adecuada":"Escasa"; ?></div>
                                    <div><strong>Observaciones </strong><?php echo $result_resultado->observaciones ?></div>

                                <?php  } ?>
                            </td>
                            <td class="span1 text-left"><img onclick="cierre_resultado(<?php echo $r->id_colecta ?>)" src="img/delete.png"/></td>
                        </tr>
                    <?php    }} ?>
                </tbody>
            </table>
        </div>

</div>

<script>
    function ver_detalle(value){
        $("#integrantes_"+value).show();
    }
    function ver_resultado(value){
        $("#resultado_"+value).show();
    }
    function cierre_detalle(value){
        $("#integrantes_"+value).hide();
    }
    function cierre_resultado(value){
        $("#resultado_"+value).hide();
    }
</script>
</body>
</html>
<?php include_once 'footer.php' ?>