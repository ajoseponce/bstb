
<script src="js/jquery-ui.js"></script>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Equipos para calibracion</h4>
        </div>

        <div class="block-content">
            <?php // echo $cartel; ?>
            <table class="table">
                <thead>
                <tr style="background: #85dbd5;" ><th colspan="2">Filtros de Busqueda</th></tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        Tipo Equipo:
                        <select id="tipo_equipo_filtro"  onchange="filtrar_listado_equipo_calibracion()" name="tipo_equipo_filtro" size="1">
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
                        <select  onchange="filtrar_listado_equipo_calibracion()" id="marca_filtro" name="marca_filtro" size="1">
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
                    <td  style="text-align: left;">
                        <button onclick="filtrar_listado_equipo_calibracion()" class="btn btn-success">Buscar</button>
                    </td>

                </tr>


                </tbody>
            </table>
            <div  id="modal-regular-calibracion" class="modal fade">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4> Equipo:  </h4>
                </div>
                <div class="modal-body">
                    <form action="controlador.php" method="post"
                          name="miformu" enctype="multipart/form-data">
                    <p></p>
                    <p>
                        <input name="equipoID" id="equipoID" type="hidden" value="">
                        <input name="action" id="action" type="hidden" value="guardar_calibracion">
                    </p>
                    <p>Fecha:</p>
                    <p>
                        <input id="fecha_calibracion" required type="date">
                    </p>
                    <p>Proveedor:</p>
                    <p>
                        <select name="proveedor_id" id="proveedor_id" required>
                            <option>Seleccione un proveedor</option>
                            <?php if($result_proveedores){
                                foreach ($result_proveedores as $t) {  ?>
                                    <option value="<?php echo $t->id_proveedor; ?>"> <?php echo $t->descripcion; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                    </p>
                    <p>Tipo de Mantenimiento:</p>
                    <p>
                        <select required name="tipo_mantenimiento" id="tipo_mantenimiento">
                            <option value="1">Anual</option>
                        </select>
                    </p>
                    <p>Certificados:</p>
                    <p>
                        <input type="file" required class="form-control" id="archivo[]" name="archivo[]" multiple="">
                    </p>

                        <input type="submit" class="btn btn-success" value="Guardar" />
                    </form>
                </div>

            </div>
            <div id="tabla_listado" class="double-scroll">

            </div>

        </div>

    </div>
</div>

</div>
<?php include_once 'footer.php' ?>
</body>



