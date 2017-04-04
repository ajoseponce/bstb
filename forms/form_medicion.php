<body>
<div id="page-container" class="full-width">
<div id="pre-page-content">
    <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>PROCESOS DE MEDICION ANALISIS Y MEJORA</small></h1>
</div>
<div id="page-content">
    <ul class="breadcrumb" data-spy="affix" data-offset-top="250">
        <li>
            <a href="principal.php"><i class="glyphicon-display"></i></a> <span class="divider"><i class="icon-angle-right"></i></span>
        </li>
        <li>
            <a href="principal.php">Principal</a> <span class="divider"><i class="icon-angle-right"></i></span>
        </li>
        <li class="active"><a href="">Produccion</a></li>
    </ul>
<div class="block block-themed block-last">
<div class="block-title">
    <h4>Datos DE MEDICION ANALISIS Y MEJORA </h4>
</div>
<div class="block-content">
    <div id="verde" style="display: none;" class="alert alert-success"><i class="icon-ok"> </i>Los datos se guardaron correctamente</div>
    <div id="rojo" style="display: none;" class="alert alert-error"><i class="icon-remove-sign"> </i>Ocurrio un error al intentar guardar los datos</div>
    <div id="amarillo" style="display: <?php echo $estado_amarillo; ?>;" class="alert alert"><i class="icon-warning-sign"> </i>No tiene datos cargados este periodo</div>
    <div id="azul" style="display: <?php echo $estado_azul; ?>" class="alert alert-info"><i class="icon-bullhorn"> </i>Este periodo tiene datos cargados</div>
    <form id="form_datos" method="post" class="form-horizontal" onsubmit="return false;">
        <!-- Default Inputs -->
    <div class="control-group">
        <label class="control-label" for="general-select">Periodo</label>
        <div class="controls">
            <select onchange="busca_periodo_medicion(this.value)" id="periodo" name="periodo" size="1">
                <option value="0">Seleccione un Periodo</option>
                <option <?php echo (date('n')=="1")?"selected":""; ?> value="1">Mes 1</option>
                <option <?php echo (date('n')=="2")?"selected":""; ?> value="2">Mes 2</option>
                <option <?php echo (date('n')=="3")?"selected":""; ?> value="3">Mes 3</option>
                <option <?php echo (date('n')=="4")?"selected":""; ?> value="4">Mes 4</option>
                <option <?php echo (date('n')=="5")?"selected":""; ?> value="5">Mes 5</option>
                <option <?php echo (date('n')=="6")?"selected":""; ?> value="6">Mes 6</option>
                <option <?php echo (date('n')=="7")?"selected":""; ?> value="7">Mes 7</option>
                <option <?php echo (date('n')=="8")?"selected":""; ?> value="8">Mes 8</option>
                <option <?php echo (date('n')=="9")?"selected":""; ?> value="9">Mes 9</option>
                <option <?php echo (date('n')=="10")?"selected":""; ?> value="10">Mes 10</option>
                <option <?php echo (date('n')=="11")?"selected":""; ?> value="11">Mes 11</option>
                <option <?php echo (date('n')=="12")?"selected":""; ?> value="12">Mes 12</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Instituciones con Convenio </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->inst_convenio:""; ?>" id="inst_convenio"  name="inst_convenio" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Instituciones con servicios de Hemoterapia</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->inst_servicios_hemoterapia:""; ?>" id="inst_servicios_hemoterapia"  name="inst_servicios_hemoterapia" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Privado) - CRH</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->centro_hemoterapia_privado:""; ?>" id="centro_hemoterapia_privado"  name="centro_hemoterapia_privado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Publico) - CRH</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->centro_hemoterapia_publico:""; ?>" id="centro_hemoterapia_publico"  name="centro_hemoterapia_publico" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Publico) BSE</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->bs_extrahospitalario_privado:""; ?>" id="bs_extrahospitalario_privado"  name="bs_extrahospitalario_privado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Privado) BSE</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->bs_extrahospitalario_publico:""; ?>" id="bs_extrahospitalario_publico"  name="bs_extrahospitalario_publico" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Publico) BSI</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->bs_intrahospitalario_privado:""; ?>" id="bs_intrahospitalario_privado"  name="bs_intrahospitalario_privado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Privado) BSI</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->bs_intrahospitalario_publico:""; ?>" id="bs_intrahospitalario_publico"  name="bs_intrahospitalario_publico" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Publico)</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->servicio_transfusion_privado:""; ?>" id="servicio_transfusion_privado"  name="servicio_transfusion_privado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Privado)</label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->servicio_transfusion_publico:""; ?>" id="servicio_transfusion_publico"  name="servicio_transfusion_publico" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>    
        
    <div class="form-actions">
        <input id="id_registro" type="hidden" name="id_registro" value="<?php echo ($result)?$result->id_registro:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_medicion">
        <button type="reset" onclick="location.href='principal.php'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
        <button onclick="save_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar</button>
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