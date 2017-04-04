<body>
<div id="page-container" class="full-width">
<div id="pre-page-content">
    <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>PROCESO DE ALMACENAMIENTO HEMOCOMPONENTES</small></h1>
</div>
<div id="page-content">
    <ul class="breadcrumb" data-spy="affix" data-offset-top="250">
        <li>
            <a href="principal.php"><i class="glyphicon-display"></i></a> <span class="divider"><i class="icon-angle-right"></i></span>
        </li>
        <li>
            <a href="principal.php">Principal</a> <span class="divider"><i class="icon-angle-right"></i></span>
        </li>
        <li class="active"><a href="">Almacenamiento Hemocomponentes</a></li>
    </ul>
<div class="block block-themed block-last">
<div class="block-title">
    <h4>Datos Almacenamiento Hemocomponentes </h4>
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
            <select onchange="busca_periodo_almacenamiento(this.value)" id="periodo" name="periodo" size="1">
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
        <label class="control-label" for="general-text">GLOBULOS ROJOS LEUCORREDUCIDOS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->rojos_leucoreducidos:""; ?>" id="rojos_leucoreducidos"  name="rojos_leucoreducidos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">GLOBULOS ROJOS IRRADIADOS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->rojos_irradiados:""; ?>" id="rojos_irradiados"  name="rojos_irradiados" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="general-text">POOL DE PLAQUETAS IRRADIADOS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plaquetas_irradiados:""; ?>" id="plaquetas_irradiados"  name="plaquetas_irradiados" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">POOL DE PLAQUETAS LEUCORREDUCIDAS  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plaquetas_leucoreducidas:""; ?>" id="plaquetas_leucoreducidas"  name="plaquetas_leucoreducidas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">PLAQUETAS AFERESIS IRRADIADOS  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plaquetas_aferesis_leucoreducidas:""; ?>" id="plaquetas_aferesis_leucoreducidas"  name="plaquetas_aferesis_leucoreducidas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">PLAQUETAS AFERESIS LEUCORREDUCIDAS </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->plaquetas_aferesis_irradiados:""; ?>" id="plaquetas_aferesis_irradiados"  name="plaquetas_aferesis_irradiados" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="general-text">GLOBULOS ROJOS FRACCIONADOS PEDIATRIA Y NEONATOLOGIA  </label>
        <div class="controls">
            <input value="<?php echo ($result)?$result->rojos_fraccionados_pediatria:""; ?>" id="rojos_fraccionados_pediatria"  name="rojos_fraccionados_pediatria" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
            <!--<span class="help-block">Your username must be unique..</span>-->
        </div>
    </div>
    

    <div class="form-actions">
        <input id="id_registro" type="hidden" name="id_registro" value="<?php echo ($result)?$result->id_registro:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_almacenamiento_hemocomponentes">
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
