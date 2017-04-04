
<script src="js/jquery-ui.js"></script>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Listado de Mantenieminto Realizados</h4>
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
                    <h4> Historial:  </h4>
                </div>


                <div id="personas_equipo"></div>
            </div>

            <div id="tabla_listado" class="double-scroll">
                <table class="table">

                    <thead>
                    <tr style="background: red;" >
                        <th>Mantenimietos</th>
                        <th>Equipo</th>
                        <th>Sector</th>
                        <th>Ubicaci&oacute;n</th>
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



