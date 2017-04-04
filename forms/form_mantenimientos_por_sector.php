<body>
<div id="page-content" >

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
                        Tipo de Mantenimiento:
                        <select id="tipo"  onchange="trae_mantenimientos()" name="tipo" size="1">
                            <option value="">Seleccione un tipo de mantenimiento</option>
                            <option value="1">Primer Nivel</option>
                            <option value="2">Preventivo</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tipo Equipo:
                        <select id="tipo_equipo"  onchange="trae_mantenimientos()" name="tipo_equipo" size="1">
                            <option value="0">Seleccione un tipo</option>
                            <?php if($tipo_equipo){
                                foreach ($tipo_equipo as $t) {  ?>
                                    <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <img src="img/exel.png"   onclick="exporta_pdf_mantenimientos()" style="cursor: pointer;" />
                    </td>
                </tr>

                </tbody>
            </table>
            <div class="block-content" id="listado" style="overflow: auto;">
            </div>
        </div>
        <!-- END Modal Tabs -->
    </div>
    <script src="js/AutoSuggest.js" type="text/javascript"></script>
    <script src="js/ClearDefaultText.js" type="text/javascript"></script>
    <script>

        function limpiar_sector(){
            //alert('hollllllla diria josefina');
            $("#sector").val('');
            $("#sectorID").val('');
            trae_mantenimientos();
        }
             //inicializa los popover

    </script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript">
        newSuggestFiltroMante('sector', 'sectorID', 'S');
    </script>
</body>
</html>
<?php include_once 'footer.php' ?>