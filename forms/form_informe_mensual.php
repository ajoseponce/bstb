<body>
        <div id="page-container" class="full-width">
            <div id="pre-page-content">
                <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>Informe mensual  <label class="control-label" for="general-select">Periodo</label>
                                <div class="controls">
                                    <select onchange="busca_periodo_informe(this.value)" id="periodo" name="periodo" size="1">
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
                                </div></small></h1>
            </div>
            <div id="page-content">
                <div  class="span6">
                <div class="block block-themed block-last">
                    <div class="block-title">
                        <h4>Datos</h4>
                    </div>
                        
                    <div class="block-content">
                            
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Colecta Externa</div>
                            <div class="group">
                                <label >Nro de Colectas Programadas
                                    <span id="colectas_programadas" >
                                   : <?php echo ($result)?$result->colectas_programadas:""; ?>
                                    </span>
                                </label>    
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Colectas Realizadas
                                <span id="colectas_realizadas" class="controls">
                                    <?php echo ($result)?$result->colectas_realizadas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Promedio de Donantes por Colecta
                                <span id="promedio_donante" class="controls">
                                   : <?php echo ($result)?$result->promedio_donante:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Colectas realizadas en el Interior Provincial
                                <span id="colectas_realizadas_interior_prov" class="controls">
                                   : <?php echo ($result)?$result->colectas_realizadas_interior_prov:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Colectas realizadas en Posadas - Garupa - Candelaria
                                <span id="colectas_realizadas_pos_gar_can" class="controls">
                                   : <?php echo ($result)?$result->colectas_realizadas_pos_gar_can:""; ?>
                                </span>
                                    </label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Combustible
                                <span id="combustible" class="controls">
                                    :<?php echo ($result)?$result->combustible:""; ?>
                                    
                                </span></label>
                            </div> 
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign">Atencion y calificacion al donante</i></div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Donantes
                                <span class="controls">
                                    <!--<input value="<?php echo ($result)?$result->donantes:""; ?>" id="donantes" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="donantes">-->--
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Extracciones
                                <span class="controls">--<!--
                                    <input value="<?php echo ($result)?$result->extracciones:""; ?>" id="extracciones" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="extracciones">-->
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Extracciones BSCM
                                <span id="donantes_bscm" class="controls">
                                    <?php echo ($result)?$result->donantes_bscm:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones Colectas
                                <span id="donantes_colectas" class="controls">
                                    <?php echo ($result)?$result->donantes_colectas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones ElDorado
                                <span id="donantes_dorado" class="controls">
                                    <?php echo ($result)?$result->donantes_dorado:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones Obera
                                <span id="donantes_obera" class="controls">
                                    <?php echo ($result)?$result->donantes_obera:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">% Descarte
                                <span id="combustible" class="controls">%--
                                    <!--<input value="<?php echo ($result)?$result->descarte:""; ?>" id="descarte" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="descarte">-->
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Diferidos
                                <span id="diferidos" class="controls">
                                    <?php echo ($result)?$result->diferidos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de AutoExcluidos
                                <span id="autoexcluidos" class="controls">
                                    <?php echo ($result)?$result->autoexcluidos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Extraccion Fallida
                                <span id="extracion_fallida" class="controls">
                                    <?php echo ($result)?$result->extracion_fallida:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Serologia Reactiva
                                <span id="serologia_reactiva" class="controls">
                                    <?php echo ($result)?$result->serologia_reactiva:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Vencimientos
                                <span id="n_vencimientos" class="controls">
                                    <?php echo ($result)?$result->n_vencimientos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Unidad Descartadas en Producción PLASMA
                                <span id="uni_descartadas_prod_plasma" class="controls">
                                    <?php echo ($result)?$result->uni_descartadas_prod_plasma:""; ?>
                                </span></label>
                            </div>
                            
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CALIFICACION BIOLOGICA (Subproceso de InmunoHematologia en Muestras Analiticas)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. ABO RH Analiticas Totales 
                                <span  id="nro_abo_rh_analiticas" class="controls">
                                    <?php echo ($result)?$result->nro_abo_rh_analiticas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de RH Negativos Totales
                                <span  id="rh_negativos" class="controls">
                                    <?php echo ($result)?$result->rh_negativos:""; ?>
                                </span></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">*Nro. de Fenotipo - CDE
                                <span  id="nro_fenotipo" class="controls">
                                    <?php echo ($result)?$result->nro_fenotipo:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI 
                                <span  id="nro_cooms_indirecta" class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI (+)
                                <span id="nro_cooms_indirecta_mas"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta_mas:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CALIFICACION BIOLOGICA (Subproceso de InmunoHematologia en Donantes)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. ABO RH DONANTES Totales 
                                <span  id="nro_abo_rh_donantes" class="controls">
                                    <?php echo ($result)?$result->nro_abo_rh_donantes:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de RH Negativos Totales
                                <span  id="rh_reativos" class="controls">
                                    <?php echo ($result)?$result->rh_reativos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Pruebas D-debil
                                <span id="nro_pruebas"  class="controls">
                                    <?php echo ($result)?$result->nro_pruebas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">*Nro. de Fenotipo - CDE
                                <span  id="nro_fenotipo" class="controls">
                                    <?php echo ($result)?$result->nro_fenotipo:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI 
                                <span id="nro_cooms_indirecta"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI (+)
                                <span id="nro_cooms_indirecta_mas"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta_mas:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE PRODUCCION DE HEMOCOMPONENTES</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Unidades Fraccionadas 
                                <span id="unidades_fraccionadas" class="controls">
                                    <?php echo ($result)?$result->unidades_fraccionadas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Total de Hemocomponentes Obtenidos  
                                <span id="hemo_obtenidos" class="controls">
                                    <?php echo ($result)?$result->hemo_obtenidos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS DESPLASMATIZADOS 
                                <span  id="globulos_rojos" class="controls">
                                   <?php echo ($result)?$result->globulos_rojos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLASMA FRESCO CONGELADO  
                                <span id="plasma_fresco_congelado"  class="controls">
                                    <?php echo ($result)?$result->plasma_fresco_congelado:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLASMA MODIFICADO  
                                <span  id="plasma_modificado" class="controls">
                                    <?php echo ($result)?$result->plasma_modificado:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">CONCENTRADO DE PLAQUETAS  
                                <span  id="concentrado_plaquetas" class="controls">
                                    <?php echo ($result)?$result->concentrado_plaquetas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">CRIOPRECIPITADOS  
                                <span id="criopresepitados"  class="controls">
                                    <?php echo ($result)?$result->criopresepitados:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                            <label class="control-label" for="general-text">PLASMA AFERESIS 
                                <span id="plasma_aferesis"  class="controls">
                                    <?php echo ($result)?$result->plasma_aferesis:""; ?>
                                </span></label>
                            </div>
                                <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS 
                                <span  id="plaqueta_aferesis" class="controls">
                                    <?php echo ($result)?$result->plaqueta_aferesis:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CITACION </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Total Citaciones por Informar                                 <span id="pendiente_informar"  class="controls">
                                    <?php echo ($result)?$result->pendiente_informar:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Total Citaciones por resultados por informar
                                <span  id="pendiente_resultados" class="controls">
                                    <?php echo ($result)?$result->pendiente_resultados:""; ?>
                                </span></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Notificaciones  realizadas
                                <span id="realizadas"  class="controls">
                                    <?php echo ($result)?$result->realizadas:""; ?>
                                </span></label>
                            </div>
                        </div>
                        <!-- END Profile Tab Content -->
                    </div>
                    </div>
                <!-------------------------------------------------------------------------
                -------------------------------------------------------------------------->
                 <div  class="span6">
                <div class="block block-themed block-last">
                    <div class="block-title">
                        <h4>Datos</h4>
                    </div>
                    
                    <div class="block-content">
                            
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Calificacion  y atencion (Subproceso Aferesis)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro  de  Aferesis  en Pacientes 
                                <span  id="aferesis_pacientes" class="controls">
                                    <?php echo ($result)?$result->aferesis_pacientes:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro  de  Aferesis  en Donantes
                                <span id="aferesis_donantes"  class="controls">
                                    <?php echo ($result)?$result->aferesis_donantes:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Proceso Calificacion  Biologica(subproceso de inmunoserologia)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Serologia Reactiva 
                                <span id="num_serologia"  class="controls">
                                    <?php echo ($result)?$result->num_serologia:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">% de Serologia Reactiva
                                <span id="porcentaje_serologia"  class="controls">
                                    <?php echo ($result)?$result->porcentaje_serologia:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HIV Ac 
                                <span id="nro_hiv_ac"  class="controls">
                                    <?php echo ($result)?$result->nro_hiv_ac:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HIV P24 
                                <span id="nro_hiv_p24"  class="controls">
                                    <?php echo ($result)?$result->nro_hiv_p24:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV HBsAg
                                <span id="nro_hbv_HbsAg"  class="controls">
                                    <?php echo ($result)?$result->nro_hbv_HbsAg:""; ?>                                
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV Ac
                                <span id="nro_hbv_ac"  class="controls">
                                   <?php echo ($result)?$result->nro_hbv_ac:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV Ac HBs
                                <span id="nro_HBV_Ac_HBs"  class="controls">
                                   <?php echo ($result)?$result->nro_HBV_Ac_HBs:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HCV
                                <span id="nro_hcv"  class="controls">
                                    <?php echo ($result)?$result->nro_hcv:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro CHAGAS HAI
                                <span id="nro_chagas_hai"  class="controls">
                                    <?php echo ($result)?$result->nro_chagas_hai:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. CHAGAS ELISA
                                <span  id="nro_chagas_elisa" class="controls">
                                    <?php echo ($result)?$result->nro_chagas_elisa:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de SIFILIS
                                <span  id="nro_sifilis" class="controls">
                                    <?php echo ($result)?$result->nro_sifilis:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de BRUCELOSIS
                                <span  id="nro_brucelosi" class="controls">
                                    <?php echo ($result)?$result->nro_brucelosi:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HTLV 1 y 2
                                <span  id="nro_htlv_1_2" class="controls">
                                    <?php echo ($result)?$result->nro_htlv_1_2:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE PRODUCCION DE HEMOCOMPONENTES(ESPECIALES) </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS LEUCORREDUCIDOS 
                                <span  id="rojos_leucoreducidos" class="controls">
                                    <?php echo ($result)?$result->rojos_leucoreducidos:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS IRRADIADOS
                                <span id="rojos_irradiados"  class="controls">
                                    <?php echo ($result)?$result->rojos_irradiados:""; ?>
                                </span></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS IRRADIADOS 
                                <span  id="plaquetas_irradiados" class="controls">
                                    <?php echo ($result)?$result->plaquetas_irradiados:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS LEUCORREDUCIDAS 
                                    <span id="plaquetas_leucoreducidas"  class="controls">
                                    <?php echo ($result)?$result->plaquetas_leucoreducidas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS IRRADIADOS  
                                <span  id="plaquetas_aferesis_leucoreducidas" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_leucoreducidas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS LEUCORREDUCIDAS 
                                <span id="plaquetas_aferesis_irradiados"  class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_irradiados:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS FRACCIONADOS PEDIATRIA Y NEONATOLOGIA  
                                <span  id="rojos_fraccionados_pediatria" class="controls">
                                    <?php echo ($result)?$result->rojos_fraccionados_pediatria:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE ALMACENAMIENTO DE HEMOCOMPONENTES</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS LEUCORREDUCIDOS 
                                <span id="rojos_leucoreducidos2"  class="controls">
                                    <?php echo ($result)?$result->rojos_leucoreducidos2:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS IRRADIADOS 
                                <span id="rojos_irradiados2"  class="controls">
                                    <?php echo ($result)?$result->rojos_irradiados2:""; ?>
                                </span></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS IRRADIADOS 
                                <span  id="plaquetas_irradiados2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_irradiados2:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS LEUCORREDUCIDAS  
                                <span  id="plaquetas_leucoreducidas2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_leucoreducidas2:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS IRRADIADOS  
                                <span  id="plaquetas_aferesis_leucoreducidas2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_leucoreducidas2:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS LEUCORREDUCIDAS 
                                <span  id="plaquetas_aferesis_irradiados2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_irradiados2:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS FRACCIONADOS PEDIATRIA Y NEONATOLOGIA  
                                <span id="rojos_fraccionados_pediatria2"  class="controls">
                                    <?php echo ($result)?$result->rojos_fraccionados_pediatria2:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE ALMACENAMIENTO DE HEMODERIVADOS</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">ALBUMINA SERICA HUMANA 20 %  
                                <span id="albumina_serica_humana"  class="controls">
                                    <?php echo ($result)?$result->albumina_serica_humana:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 2,5 GR
                                <span id="gamaglobulina_2_5"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_2_5:""; ?>
                                </span></label>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 5 GR
                                <span id="gamaglobulina_5"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_5:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 10 GR 
                                <span id="gamaglobulina_10"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_10:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMA ANTITETANICA  
                                <span id="gama_antitetanica"  class="controls">
                                    <?php echo ($result)?$result->gama_antitetanica:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMA ANTI RH
                                <span  id="gama_anti_rh" class="controls">
                                    <?php echo ($result)?$result->gama_anti_rh:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">FACTOR VIII AntiHemofilico 250 UL  
                                <span id="factor_vIII"  class="controls">
                                    <?php echo ($result)?$result->factor_vIII:""; ?>
                                </span></label>
                            </div>
                            
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESOS DE APOYO</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de referencias verificadas conforme en auditoria mensual 
                                <span id="ref_verificadas"  class="controls">
                                    <?php echo ($result)?$result->ref_verificadas:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de referencias faltantes
                                <span id="num_ref_faltantes"  class="controls">
                                    <?php echo ($result)?$result->num_ref_faltantes:""; ?>
                                </span></label>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESOS DE MEDICION ANALISIS Y MEJORA</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Instituciones con Convenio 
                                <span id="inst_convenio"  class="controls">
                                    <?php echo ($result)?$result->inst_convenio:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Instituciones con servicios de Hemoterapia
                                <span id="inst_servicios_hemoterapia"  class="controls">
                                    <?php echo ($result)?$result->inst_servicios_hemoterapia:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Privado) - CRH
                                <span id="centro_hemoterapia_privado"  class="controls">
                                    <?php echo ($result)?$result->centro_hemoterapia_privado:""; ?>
                                </span></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Publico) - CRH
                                <span id="centro_hemoterapia_publico"  class="controls">
                                    <?php echo ($result)?$result->centro_hemoterapia_publico:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Publico) BSE
                                <span  id="bs_extrahospitalario_privado" class="controls">
                                    <?php echo ($result)?$result->bs_extrahospitalario_privado:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Privado) BSE
                                <span id="bs_extrahospitalario_publico"  class="controls">
                                    <?php echo ($result)?$result->bs_extrahospitalario_publico:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Publico) BSI
                                <span id="bs_intrahospitalario_privado"  class="controls">
                                    <?php echo ($result)?$result->bs_intrahospitalario_privado:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Privado) BSI
                                <span id="bs_intrahospitalario_publico"  class="controls">
                                    <?php echo ($result)?$result->bs_intrahospitalario_publico:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Publico)
                                <span id="servicio_transfusion_privado"  class="controls">
                                    <?php echo ($result)?$result->servicio_transfusion_privado:""; ?>
                                </span></label>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Privado)
                                <span  id="servicio_transfusion_publico" class="controls">
                                    <?php echo ($result)?$result->servicio_transfusion_publico:""; ?>
                                </span></label>
                            </div> 
                            <div class="form-actions">
                                <button type="reset" onclick="location.href='principal.php'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                            </div>
                            </form>
                        </div>
                        <!-- END Profile Tab Content -->
                    </div>
                    </div>   
                </div>
                <!-- END Modal Tabs -->
        </div>
</body>
</html>
<?php include_once 'footer.php' ?>
