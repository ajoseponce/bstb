<body>
<div id="page-container" class="full-width">
<div id="pre-page-content">
    <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>PROCESO DE AFERESIS</small></h1>
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
    <h4>Datos Produccion Hemocomponentes</h4>
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
            <select onchange="busca_periodo_produccion(this.value)" id="periodo" name="periodo" size="1">
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
        <label class="control-label" for="general-text">Nro. de Unidades Fraccionadas </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->unidades_fraccionadas:""; ?>" id="unidades_fraccionadas"  name="unidades_fraccionadas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">Nro. Total de Hemocomponentes Obtenidos  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->hemo_obtenidos:""; ?>" id="hemo_obtenidos"  name="hemo_obtenidos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="general-text">GLOBULOS ROJOS DESPLASMATIZADOS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->globulos_rojos:""; ?>" id="globulos_rojos"  name="globulos_rojos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">PLASMA FRESCO CONGELADO  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plasma_fresco_congelado:""; ?>" id="plasma_fresco_congelado"  name="plasma_fresco_congelado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">PLASMA MODIFICADO  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plasma_modificado:""; ?>" id="plasma_modificado"  name="plasma_modificado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">CONCENTRADO DE PLAQUETAS  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->concentrado_plaquetas:""; ?>" id="concentrado_plaquetas"  name="concentrado_plaquetas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">CRIOPRECIPITADOS  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->criopresepitados:""; ?>" id="criopresepitados"  name="criopresepitados" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="general-text">PLASMA AFERESIS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plasma_aferesis:""; ?>" id="plasma_aferesis"  name="plasma_aferesis" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
        <div class="control-group">
        <label class="control-label" for="general-text">PLAQUETAS AFERESIS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plaqueta_aferesis:""; ?>" id="plaqueta_aferesis"  name="plaqueta_aferesis" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>

    <div class="form-actions">
        <input id="id_registro" type="hidden" name="id_registro" value="<?php echo ($result)?$result->id_registro:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_produccion">
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