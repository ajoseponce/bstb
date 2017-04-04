
<body>
<div id="page-container" class="full-width">
<div id="page-content">

<div class="block block-themed block-last">
<div class="block-title">
    <h4>Alta Item para mantenimiento</h4>
</div>
<div class="block-content">
    
    <form id="form_datos" class="form-horizontal" action="controlador.php" method="POST">
        <!-- Default Inputs -->
        <div class="control-group">
            <label class="control-label" for="general-select">Tipo Equipo</label>
            <div class="controls">
                <select id="tipo_equipo" name="tipo_equipo" onchange="trae_item_mantenimiento()" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"><?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Tipo de Mantenimiento</label>
            <div class="controls">
                <select id="tipo_mantenimiento" onchange="trae_item_mantenimiento()" name="tipo_mantenimiento" size="1">
                        <option value="0">Seleccione un tipo</option>
                        <option value="1">De Primer Nivel</option>
                        <option value="2">Preventivo</option>
                        <option value="3">Calibracion</option>
                        <!--<option value="3">Calibracion</option>-->
                    
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Titulo</label>
            <div class="controls">
                <input name="titulo" id="titulo" /> <br>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Descripcion</label>
            <div class="controls">
                <textarea style="width: 800px; height: 150px;" name="item" id="item"></textarea> <br>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Frecuencia</label>
            <div class="controls">
                <select id="frecuencia" name="frecuencia" size="1">
                        <option value="0">Seleccione una frecuencia</option>
                        <option value="1">Diario</option>
                        <option value="7">Semanal</option>
                        <option value="15">Quincenal</option>
                        <option value="30">Mensual</option>
                        <option value="60">Bimensual</option>
                        <option value="90">Trimestral</option>
                        <option value="180">Semestral</option>
                        <option value="365">Anual</option>
                        <option value="88">Previo Uso</option>
                        <option value="99">Posterior Uso</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Condicion</label>
            <div class="controls">
                <select id="condicion" name="condicion" size="1">
                        <option value="0">Seleccione una Condicion</option>
                        <?php if($condicion){
                        foreach ($condicion as $c) {  ?>
                            <option  value="<?php echo $c->letra; ?>"> <?php echo $c->descripcion; ?></option>
                        <?php
                            }
                        } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Costo</label>
            <div class="controls">
                <input name="costo" id="costo" value="" class="span1" /><br>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Tiempo</label>
            <input id="id_registro" type="hidden" name="id_registro" value="">
            <div class="controls"><input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="tiempo" class="span1" id="tiempo" value="" /><br>
                <button onclick="save_item_mantenimiento()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar</button>
            </div>
        </div>
        <div id="tabla_listado_item_mantenimiento"> 
        </div>    
        <div class="control-group">
            <!--<input id="id_equipo" type="hidden" name="id_equipo" value="<?php echo (isset($result->id_equipo))?$result->id_equipo:""; ?>">-->

            <button type="reset" onclick="location.href='controlador.php?action=carga_item_mantenimiento'" class="btn btn-danger"><i class="icon-repeat"></i>Reiniciar</button>
        </div>
        </form>
    </div>
    <!-- END Profile Tab Content -->
</div>
</div>
<!-- END Modal Tabs -->
</div>
</body>
</html>
<?php include_once 'footer.php' ?>
