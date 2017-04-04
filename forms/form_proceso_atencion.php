<body>
        <div id="page-container" class="full-width">
            <div id="pre-page-content">
                <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>PROCESO DE ATENCION</small></h1>
            </div>
            <div id="page-content">
                <ul class="breadcrumb" data-spy="affix" data-offset-top="250">
                    <li>
                        <a href="principal.php"><i class="glyphicon-display"></i></a> <span class="divider"><i class="icon-angle-right"></i></span>
                    </li>
                    <li>
                        <a href="principal.php">Principal</a> <span class="divider"><i class="icon-angle-right"></i></span>
                    </li>
                    <li class="active"><a href="">Proceso de Atencion</a></li>
                </ul>
                <div class="block block-themed block-last">
                    <div class="block-title">
                        <h4>Datos Atencion</h4>
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
                                    <select onchange="busca_periodo_atencion(this.value)" id="general-select" name="periodo" size="1">
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
                                <label class="control-label" for="general-text">Nro de Donantes</label>
                                <div class="controls">
                                    <!--<input value="<?php echo ($result)?$result->donantes:""; ?>" id="donantes" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes">-->--
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Extracciones</label>
                                <div class="controls">--<!--
                                    <input value="<?php echo ($result)?$result->extracciones:""; ?>" id="extracciones" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="extracciones">-->
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Donantes BSCM</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->donantes_bscm:""; ?>" id="donantes_bscm" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes_bscm">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Donantes Colectas</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->donantes_colectas:""; ?>" id="donantes_colectas" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes_colectas">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Donantes ElDorado</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->donantes_dorado:""; ?>" id="donantes_dorado" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes_dorado">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Donantes Obera</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->donantes_obera:""; ?>" id="donantes_obera" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes_obera">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">% Descarte</label>
                                <div class="controls">%--
                                    <!--<input value="<?php echo ($result)?$result->descarte:""; ?>" id="descarte" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="descarte">-->
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Diferidos</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->diferidos:""; ?>" id="diferidos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="diferidos">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de AutoExcluidos</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->autoexcluidos:""; ?>" id="autoexcluidos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="autoexcluidos">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                             <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Extraccion Fallida</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->extracion_fallida:""; ?>" id="extracion_fallida" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="extracion_fallida">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Serologia Reactiva</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->serologia_reactiva:""; ?>" id="serologia_reactiva" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="serologia_reactiva">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Vencimientos</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->n_vencimientos:""; ?>" id="n_vencimientos" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="n_vencimientos">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Unidad Descartadas en Producción PLASMA</label>
                                <div class="controls">
                                    <input value="<?php echo ($result)?$result->uni_descartadas_prod_plasma:""; ?>" id="uni_descartadas_prod_plasma" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="uni_descartadas_prod_plasma">
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="reset" onclick="location.href='principal.php'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                                <input id="id_registro" type="hidden" name="id_registro" value="<?php echo ($result)?$result->id_registro:""; ?>">
                                <input id="action" type="hidden" name="action" value="guardar_proceso_atencion">
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