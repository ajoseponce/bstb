<body>
        <div id="page-container" class="full-width">
            <div id="pre-page-content">
                <h1><i class="glyphicon-nameplate_alt themed-color"></i><small>Informe mensual </small></h1>
            </div>
            <div id="page-content">
                <div class="block block-themed block-last">
                    <div class="block-title">
                        <h4>Datos</h4>
                    </div>
                    <form id="form_datos" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="block-content">
                            <!-- Default Inputs -->
                            <div class="control-group">
                                <label class="control-label" for="general-select">Periodo</label>
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
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Colecta Externa</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Colectas Programadas</label>
                                <div id="colectas_programadas" class="controls">
                                    <?php echo ($result)?$result->colectas_programadas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Colectas Realizadas</label>
                                <div id="colectas_realizadas" class="controls">
                                    <?php echo ($result)?$result->colectas_realizadas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Promedio de Donantes por Colecta</label>
                                <div id="promedio_donante" class="controls">
                                    <?php echo ($result)?$result->promedio_donante:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Colectas realizadas en el Interior Provincial</label>
                                <div id="colectas_realizadas_interior_prov" class="controls">
                                    <?php echo ($result)?$result->colectas_realizadas_interior_prov:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Colectas realizadas en Posadas - Garupa - Candelaria</label>
                                <div id="colectas_realizadas_pos_gar_can" class="controls">
                                    <?php echo ($result)?$result->colectas_realizadas_pos_gar_can:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Combustible</label>
                                <div id="combustible" class="controls">
                                    <?php echo ($result)?$result->combustible:""; ?>
                                    
                                </div>
                            </div> 
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign">Atencion y calificacion al donante</i></div>
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
                                <label class="control-label" for="general-text">Nro de Extracciones BSCM</label>
                                <div id="donantes_bscm" class="controls">
                                    <?php echo ($result)?$result->donantes_bscm:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones Colectas</label>
                                <div id="donantes_colectas" class="controls">
                                    <?php echo ($result)?$result->donantes_colectas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones ElDorado</label>
                                <div id="donantes_dorado" class="controls">
                                    <?php echo ($result)?$result->donantes_dorado:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Extracciones Obera</label>
                                <div id="donantes_obera" class="controls">
                                    <?php echo ($result)?$result->donantes_obera:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">% Descarte</label>
                                <div id="combustible" class="controls">%--
                                    <!--<input value="<?php echo ($result)?$result->descarte:""; ?>" id="descarte" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="descarte">-->
                                    <!--<span class="help-block">Your username must be unique..</span>-->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Diferidos</label>
                                <div id="diferidos" class="controls">
                                    <?php echo ($result)?$result->diferidos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de AutoExcluidos</label>
                                <div id="autoexcluidos" class="controls">
                                    <?php echo ($result)?$result->autoexcluidos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Extraccion Fallida</label>
                                <div id="extracion_fallida" class="controls">
                                    <?php echo ($result)?$result->extracion_fallida:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Serologia Reactiva</label>
                                <div id="serologia_reactiva" class="controls">
                                    <?php echo ($result)?$result->serologia_reactiva:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Vencimientos</label>
                                <div id="n_vencimientos" class="controls">
                                    <?php echo ($result)?$result->n_vencimientos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Unidad Descartadas en Producción PLASMA</label>
                                <div id="uni_descartadas_prod_plasma" class="controls">
                                    <?php echo ($result)?$result->uni_descartadas_prod_plasma:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Calificacion  y atencion (Subproceso Aferesis)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro  de  Aferesis  en Pacientes </label>
                                <div  id="aferesis_pacientes" class="controls">
                                    <?php echo ($result)?$result->aferesis_pacientes:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro  de  Aferesis  en Donantes</label>
                                <div id="aferesis_donantes"  class="controls">
                                    <?php echo ($result)?$result->aferesis_donantes:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>Proceso Calificacion  Biologica(subproceso de inmunoserologia)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Serologia Reactiva </label>
                                <div id="num_serologia"  class="controls">
                                    <?php echo ($result)?$result->num_serologia:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">% de Serologia Reactiva</label>
                                <div id="porcentaje_serologia"  class="controls">
                                    <?php echo ($result)?$result->porcentaje_serologia:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HIV Ac </label>
                                <div id="nro_hiv_ac"  class="controls">
                                    <?php echo ($result)?$result->nro_hiv_ac:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HIV P24 </label>
                                <div id="nro_hiv_p24"  class="controls">
                                    <?php echo ($result)?$result->nro_hiv_p24:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV HBsAg</label>
                                <div id="nro_hbv_HbsAg"  class="controls">
                                    <?php echo ($result)?$result->nro_hbv_HbsAg:""; ?>                                
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV Ac</label>
                                <div id="nro_hbv_ac"  class="controls">
                                   <?php echo ($result)?$result->nro_hbv_ac:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HBV Ac HBs</label>
                                <div id="nro_HBV_Ac_HBs"  class="controls">
                                   <?php echo ($result)?$result->nro_HBV_Ac_HBs:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. HCV</label>
                                <div id="nro_hcv"  class="controls">
                                    <?php echo ($result)?$result->nro_hcv:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro CHAGAS HAI</label>
                                <div id="nro_chagas_hai"  class="controls">
                                    <?php echo ($result)?$result->nro_chagas_hai:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. CHAGAS ELISA</label>
                                <div  id="nro_chagas_elisa" class="controls">
                                    <?php echo ($result)?$result->nro_chagas_elisa:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de SIFILIS</label>
                                <div  id="nro_sifilis" class="controls">
                                    <?php echo ($result)?$result->nro_sifilis:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de BRUCELOSIS</label>
                                <div  id="nro_brucelosi" class="controls">
                                    <?php echo ($result)?$result->nro_brucelosi:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de HTLV 1 y 2</label>
                                <div  id="nro_htlv_1_2" class="controls">
                                    <?php echo ($result)?$result->nro_htlv_1_2:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CALIFICACION BIOLOGICA (Subproceso de InmunoHematologia en Muestras Analiticas)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. ABO RH Analiticas Totales </label>
                                <div  id="nro_abo_rh_analiticas" class="controls">
                                    <?php echo ($result)?$result->nro_abo_rh_analiticas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de RH Negativos Totales</label>
                                <div  id="rh_negativos" class="controls">
                                    <?php echo ($result)?$result->rh_negativos:""; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">*Nro. de Fenotipo - CDE</label>
                                <div  id="nro_fenotipo" class="controls">
                                    <?php echo ($result)?$result->nro_fenotipo:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI </label>
                                <div  id="nro_cooms_indirecta" class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI (+)</label>
                                <div id="nro_cooms_indirecta_mas"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta_mas:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CALIFICACION BIOLOGICA (Subproceso de InmunoHematologia en Donantes)</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. ABO RH DONANTES Totales </label>
                                <div  id="nro_abo_rh_donantes" class="controls">
                                    <?php echo ($result)?$result->nro_abo_rh_donantes:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de RH Negativos Totales</label>
                                <div  id="rh_reativos" class="controls">
                                    <?php echo ($result)?$result->rh_reativos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro de Pruebas D-debil</label>
                                <div id="nro_pruebas"  class="controls">
                                    <?php echo ($result)?$result->nro_pruebas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">*Nro. de Fenotipo - CDE</label>
                                <div  id="nro_fenotipo" class="controls">
                                    <?php echo ($result)?$result->nro_fenotipo:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI </label>
                                <div id="nro_cooms_indirecta"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Pruebas de Coombs Indirecta - PCI (+)</label>
                                <div id="nro_cooms_indirecta_mas"  class="controls">
                                    <?php echo ($result)?$result->nro_cooms_indirecta_mas:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE PRODUCCION DE HEMOCOMPONENTES</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Unidades Fraccionadas </label>
                                <div id="unidades_fraccionadas" class="controls">
                                    <?php echo ($result)?$result->unidades_fraccionadas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. Total de Hemocomponentes Obtenidos  </label>
                                <div id="hemo_obtenidos" class="controls">
                                    <?php echo ($result)?$result->hemo_obtenidos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS DESPLASMATIZADOS </label>
                                <div  id="globulos_rojos" class="controls">
                                   <?php echo ($result)?$result->globulos_rojos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLASMA FRESCO CONGELADO  </label>
                                <div id="plasma_fresco_congelado"  class="controls">
                                    <?php echo ($result)?$result->plasma_fresco_congelado:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLASMA MODIFICADO  </label>
                                <div  id="plasma_modificado" class="controls">
                                    <?php echo ($result)?$result->plasma_modificado:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">CONCENTRADO DE PLAQUETAS  </label>
                                <div  id="concentrado_plaquetas" class="controls">
                                    <?php echo ($result)?$result->concentrado_plaquetas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">CRIOPRECIPITADOS  </label>
                                <div id="criopresepitados"  class="controls">
                                    <?php echo ($result)?$result->criopresepitados:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                            <label class="control-label" for="general-text">PLASMA AFERESIS </label>
                                <div id="plasma_aferesis"  class="controls">
                                    <?php echo ($result)?$result->plasma_aferesis:""; ?>
                                </div>
                            </div>
                                <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS </label>
                                <div  id="plaqueta_aferesis" class="controls">
                                    <?php echo ($result)?$result->plaqueta_aferesis:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE PRODUCCION DE HEMOCOMPONENTES(ESPECIALES) </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS LEUCORREDUCIDOS </label>
                                <div  id="rojos_leucoreducidos" class="controls">
                                    <?php echo ($result)?$result->rojos_leucoreducidos:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS IRRADIADOS </label>
                                <div id="rojos_irradiados"  class="controls">
                                    <?php echo ($result)?$result->rojos_irradiados:""; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS IRRADIADOS </label>
                                <div  id="plaquetas_irradiados" class="controls">
                                    <?php echo ($result)?$result->plaquetas_irradiados:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS LEUCORREDUCIDAS  </label>
                                <div id="plaquetas_leucoreducidas"  class="controls">
                                    <?php echo ($result)?$result->plaquetas_leucoreducidas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS IRRADIADOS  </label>
                                <div  id="plaquetas_aferesis_leucoreducidas" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_leucoreducidas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS LEUCORREDUCIDAS </label>
                                <div id="plaquetas_aferesis_irradiados"  class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_irradiados:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS FRACCIONADOS PEDIATRIA Y NEONATOLOGIA  </label>
                                <div  id="rojos_fraccionados_pediatria" class="controls">
                                    <?php echo ($result)?$result->rojos_fraccionados_pediatria:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE ALMACENAMIENTO DE HEMOCOMPONENTES</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS LEUCORREDUCIDOS </label>
                                <div id="rojos_leucoreducidos2"  class="controls">
                                    <?php echo ($result)?$result->rojos_leucoreducidos2:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS IRRADIADOS </label>
                                <div id="rojos_irradiados2"  class="controls">
                                    <?php echo ($result)?$result->rojos_irradiados2:""; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS IRRADIADOS </label>
                                <div  id="plaquetas_irradiados2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_irradiados2:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">POOL DE PLAQUETAS LEUCORREDUCIDAS  </label>
                                <div  id="plaquetas_leucoreducidas2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_leucoreducidas2:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS IRRADIADOS  </label>
                                <div  id="plaquetas_aferesis_leucoreducidas2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_leucoreducidas2:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">PLAQUETAS AFERESIS LEUCORREDUCIDAS </label>
                                <div  id="plaquetas_aferesis_irradiados2" class="controls">
                                    <?php echo ($result)?$result->plaquetas_aferesis_irradiados2:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GLOBULOS ROJOS FRACCIONADOS PEDIATRIA Y NEONATOLOGIA  </label>
                                <div id="rojos_fraccionados_pediatria2"  class="controls">
                                    <?php echo ($result)?$result->rojos_fraccionados_pediatria2:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE ALMACENAMIENTO DE HEMODERIVADOS</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">ALBUMINA SERICA HUMANA 20 %  </label>
                                <div id="albumina_serica_humana"  class="controls">
                                    <?php echo ($result)?$result->albumina_serica_humana:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 2,5 GR</label>
                                <div id="gamaglobulina_2_5"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_2_5:""; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 5 GR</label>
                                <div id="gamaglobulina_5"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_5:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMAGLOBULINA EV 10 GR  </label>
                                <div id="gamaglobulina_10"  class="controls">
                                    <?php echo ($result)?$result->gamaglobulina_10:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMA ANTITETANICA  </label>
                                <div id="gama_antitetanica"  class="controls">
                                    <?php echo ($result)?$result->gama_antitetanica:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">GAMA ANTI RH </label>
                                <div  id="gama_anti_rh" class="controls">
                                    <?php echo ($result)?$result->gama_anti_rh:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">FACTOR VIII AntiHemofilico 250 UL  </label>
                                <div id="factor_vIII"  class="controls">
                                    <?php echo ($result)?$result->factor_vIII:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESO DE CITACION </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Total Citaciones por Informar </label>
                                <div id="pendiente_informar"  class="controls">
                                    <?php echo ($result)?$result->pendiente_informar:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro Total Citaciones por resultados por informar</label>
                                <div  id="pendiente_resultados" class="controls">
                                    <?php echo ($result)?$result->pendiente_resultados:""; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Notificaciones  realizadas</label>
                                <div id="realizadas"  class="controls">
                                    <?php echo ($result)?$result->realizadas:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESOS DE APOYO</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de referencias verificadas conforme en auditoria mensual </label>
                                <div id="ref_verificadas"  class="controls">
                                    <?php echo ($result)?$result->ref_verificadas:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de referencias faltantes</label>
                                <div id="num_ref_faltantes"  class="controls">
                                    <?php echo ($result)?$result->num_ref_faltantes:""; ?>
                                </div>
                            </div>
                            <div id="rojo" class="alert alert-error"><i class="icon-remove-sign"> </i>PROCESOS DE MEDICION ANALISIS Y MEJORA</div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Instituciones con Convenio </label>
                                <div id="inst_convenio"  class="controls">
                                    <?php echo ($result)?$result->inst_convenio:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Instituciones con servicios de Hemoterapia</label>
                                <div id="inst_servicios_hemoterapia"  class="controls">
                                    <?php echo ($result)?$result->inst_servicios_hemoterapia:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Privado) - CRH</label>
                                <div id="centro_hemoterapia_privado"  class="controls">
                                    <?php echo ($result)?$result->centro_hemoterapia_privado:""; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Centros Regionales de Hemoterapia (Publico) - CRH</label>
                                <div id="centro_hemoterapia_publico"  class="controls">
                                    <?php echo ($result)?$result->centro_hemoterapia_publico:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Publico) BSE</label>
                                <div  id="bs_extrahospitalario_privado" class="controls">
                                    <?php echo ($result)?$result->bs_extrahospitalario_privado:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre ExtraHospitalario (Privado) BSE</label>
                                <div id="bs_extrahospitalario_publico"  class="controls">
                                    <?php echo ($result)?$result->bs_extrahospitalario_publico:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Publico) BSI</label>
                                <div id="bs_intrahospitalario_privado"  class="controls">
                                    <?php echo ($result)?$result->bs_intrahospitalario_privado:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Banco de Sangre IntraHospitalario (Privado) BSI</label>
                                <div id="bs_intrahospitalario_publico"  class="controls">
                                    <?php echo ($result)?$result->bs_intrahospitalario_publico:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Publico)</label>
                                <div id="servicio_transfusion_privado"  class="controls">
                                    <?php echo ($result)?$result->servicio_transfusion_privado:""; ?>
                                </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label" for="general-text">Nro. de Servicio de Transfusion (Privado)</label>
                                <div  id="servicio_transfusion_publico" class="controls">
                                    <?php echo ($result)?$result->servicio_transfusion_publico:""; ?>
                                </div>
                            </div> 
                            <div class="form-actions">
                                <button type="reset" onclick="location.href='principal.php'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                            </div>
                            </form>
                        </div>
                        <!-- END Profile Tab Content -->
                    </div>
                </div>
                <!-- END Modal Tabs -->
        </div>
        
        <script src="js/jquery.min.js"></script>
        
        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <script type="text/javascript" src="js/from_el.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/funciones.js"></script>
    </body>
</html>
