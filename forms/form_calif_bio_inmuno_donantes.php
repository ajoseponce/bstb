<body>
<div id="page-container" class="full-width">
    <div id="pre-page-content">
        <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>PROCESO DE INMUNOHEMATOLOGIA</small></h1>
    </div>
    <div id="page-content">
<ul class="breadcrumb" data-spy="affix" data-offset-top="250">
    <li>
        <a href="principal.php"><i class="glyphicon-display"></i></a> <span class="divider"><i class="icon-angle-right"></i></span>
    </li>
    <li>
        <a href="principal.php">Principal</a> <span class="divider"><i class="icon-angle-right"></i></span>
    </li>
    <li class="active"><a href="">INMUNOHEMATOLOGIA</a></li>
</ul>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>PROCESO DE CALIFICACION BIOLOGICA DONANTES(Subproceso de InmunoHematologia)</h4>
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
                    <select onchange="busca_periodo_inmuno_donantes(this.value)" id="periodo" name="periodo" size="1">
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
                <label class="control-label" for="general-text">Nro. ABO RH DONANTES Totales </label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->nro_abo_rh_donantes:""; ?>" id="nro_abo_rh_donantes"  name="nro_abo_rh_donantes" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">Nro. de RH Negativos Totales</label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->rh_reativos:""; ?>" id="rh_reativos"  name="rh_reativos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">Nro de Pruebas D-debil</label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->nro_pruebas:""; ?>" id="nro_pruebas"  name="nro_pruebas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">*Nro. de Fenotipo - CDE</label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->nro_fenotipo:""; ?>" id="nro_fenotipo"  name="nro_fenotipo" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI </label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->nro_cooms_indirecta:""; ?>" id="nro_cooms_indirecta"  name="nro_cooms_indirecta" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI (+)</label>
                <div class="controls">
                    <input value="<?php echo ($result)?$result->nro_cooms_indirecta_mas:""; ?>" id="nro_cooms_indirecta_mas"  name="nro_cooms_indirecta_mas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text">
                    <!--<span class="help-block">Your username must be unique..</span>-->
                </div>
            </div>
                        
            <div class="form-actions">
                <input id="id_registro" type="hidden" name="id_registro" value="<?php echo ($result)?$result->id_registro:""; ?>">
                    <input id="action" type="hidden" name="action" value="guardar_inmuno_donantes">
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