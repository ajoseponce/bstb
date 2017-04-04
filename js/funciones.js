function ver_pdf(value){
    //alert('jola');
    window.open("archivos/poe_"+value+".pdf","_blank");
     
}
function ver_doc(value){
    //alert('jola');
    window.open('archivos/poe_'+value+'.doc','_blank');
     
}
function ver_doc_registro(value){
    //alert('jola');
    window.open('archivos/'+value,'_blank');
     
}
function vermanual(value){
    //alert('jola');
    if(value=='S'){
        $("#manual_equipo").show();
    }else{
        $("#manual_equipo").hide();
    }
}
function ver_detalle(value){
   $("#detalle_"+value).show();
}
function cierra_detalle(value){
   $("#detalle_"+value).hide();
}

function _soloNumeros(evt){	
    // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
  // coma = 44, punto = 46
  var nav4 = !window.event ? true : false;
  var key = nav4 ? evt.which : evt.keyCode;	
//  return (key <= 13  || (key >= 48 && key <= 57)); NUMEROS SOLA/
  return (key <= 13 || (key >= 48 && key <= 57));
}
function busca_periodo_colecta(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_externa"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                //alert('Este periodo no tiene ningun dato cargado hasta el momento ');
                $('#colectas_programadas').val("");
                $('#colectas_realizadas').val("");
                $('#promedio_donante').val("");
                $('#colectas_realizadas_interior_prov').val("");
                $('#colectas_realizadas_pos_gar_can').val("");
                $('#combustible').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#colectas_programadas').val(data.colectas_programadas);
                $('#colectas_realizadas').val(data.colectas_realizadas);
                $('#promedio_donante').val(data.promedio_donante);
                $('#colectas_realizadas_interior_prov').val(data.colectas_realizadas_interior_prov);
                $('#colectas_realizadas_pos_gar_can').val(data.colectas_realizadas_pos_gar_can);
                $('#combustible').val(data.combustible);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_colecta_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_externa"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                //alert('Este periodo no tiene ningun dato cargado hasta el momento ');
                $('#colectas_programadas').html("");
                $('#colectas_realizadas').html("");
                $('#promedio_donante').html("");
                $('#colectas_realizadas_interior_prov').html("");
                $('#colectas_realizadas_pos_gar_can').html("");
                $('#combustible').html("");
                
            }else{
                $('#colectas_programadas').html(data.colectas_programadas);
                $('#colectas_realizadas').html(data.colectas_realizadas);
                $('#promedio_donante').html(data.promedio_donante);
                $('#colectas_realizadas_interior_prov').html(data.colectas_realizadas_interior_prov);
                $('#colectas_realizadas_pos_gar_can').html(data.colectas_realizadas_pos_gar_can);
                $('#combustible').html(data.combustible);
                
            }
            
        }
    });
}

function busca_periodo_aferesis(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_aferesis"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            
            if(data.colectas_vacio==0){
                               
                $('#aferesis_pacientes').val("");
                $('#aferesis_donantes').val("");
                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                
                $('#aferesis_pacientes').val(data.aferesis_pacientes);
                $('#aferesis_donantes').val(data.aferesis_donantes);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
                
            }
        }
    });
}

function busca_periodo_aferesis_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_aferesis"},
        dataType:      'json',
        type: 'get',
        success:       function(data){

            if(data.colectas_vacio==0){

                $('#aferesis_pacientes').html("");
                $('#aferesis_donantes').html("");

            }else{
                $('#aferesis_pacientes').html(data.aferesis_pacientes);
                $('#aferesis_donantes').html(data.aferesis_donantes);
            }
        }
    });
}
function busca_periodo_apoyo_insumos(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_apoyo_insumos"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            
            if(data.colectas_vacio==0){
                            
                
                $('#ref_verificadas').val("");
                $('#num_ref_faltantes').val("");
                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                
                $('#ref_verificadas').val(data.ref_verificadas);
                $('#num_ref_faltantes').val(data.num_ref_faltantes);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
                
            }
        }
    });
}
function busca_periodo_apoyo_insumos_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_apoyo_insumos"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            
            if(data.colectas_vacio==0){
                            
                
                $('#ref_verificadas').html("");
                $('#num_ref_faltantes').html("");
                
                
            }else{
                
                $('#ref_verificadas').html(data.ref_verificadas);
                $('#num_ref_faltantes').html(data.num_ref_faltantes);
            }
        }
    });
}
function busca_periodo_atencion(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_atencion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            
            if(data.colectas_vacio==0){
                               
                $('#donantes_bscm').val("");
                $('#donantes_colectas').val("");
                $('#donantes_dorado').val("");
                $('#donantes_obera').val("");
                $('#diferidos').val("");
                $('#autoexcluidos').val("");
                $('#extracion_fallida').val("");
                $('#serologia_reactiva').val("");
                $('#n_vencimientos').val("");
                $('#uni_descartadas_prod_plasma').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#donantes_bscm').val(data.donantes_bscm);
                $('#donantes_colectas').val(data.donantes_colectas);
                $('#donantes_dorado').val(data.donantes_dorado);
                $('#donantes_obera').val(data.donantes_obera);
                $('#diferidos').val(data.diferidos);
                $('#autoexcluidos').val(data.autoexcluidos);
                $('#extracion_fallida').val(data.extracion_fallida);
                $('#serologia_reactiva').val(data.serologia_reactiva);
                $('#n_vencimientos').val(data.n_vencimientos);
                $('#uni_descartadas_prod_plasma').val(data.uni_descartadas_prod_plasma);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
                
            }
        }
    });
}
function busca_periodo_atencion_informe(value){
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_atencion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){

            if(data.colectas_vacio==0){

                $('#donantes_bscm').html("");
                $('#donantes_colectas').html("");
                $('#donantes_dorado').html("");
                $('#donantes_obera').html("");
                $('#diferidos').html("");
                $('#autoexcluidos').html("");
                $('#extracion_fallida').html("");
                $('#serologia_reactiva').html("");
                $('#n_vencimientos').html("");
                $('#uni_descartadas_prod_plasma').html("");

            }else{
                $('#donantes_bscm').html(data.donantes_bscm);
                $('#donantes_colectas').html(data.donantes_colectas);
                $('#donantes_dorado').html(data.donantes_dorado);
                $('#donantes_obera').html(data.donantes_obera);
                $('#diferidos').html(data.diferidos);
                $('#autoexcluidos').html(data.autoexcluidos);
                $('#extracion_fallida').html(data.extracion_fallida);
                $('#serologia_reactiva').html(data.serologia_reactiva);
                $('#n_vencimientos').html(data.n_vencimientos);
                $('#uni_descartadas_prod_plasma').html(data.uni_descartadas_prod_plasma);

            }
        }
    });
}
/***********inmuno**********/
function busca_periodo_inmuno(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#num_serologia').val("");
                $('#porcentaje_serologia').val("");
                $('#nro_hiv_ac').val("");
                $('#nro_hiv_p24').val("");
                $('#nro_hbv_HbsAg').val("");
                $('#nro_hbv_ac').val("");
                $('#nro_HBV_Ac_HBs').val("");
                $('#nro_hcv').val("");
                $('#nro_chagas_hai').val("");
                $('#nro_chagas_elisa').val("");
                $('#nro_sifilis').val("");
                $('#nro_brucelosi').val("");
                $('#nro_htlv_1_2').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#num_serologia').val(data.num_serologia);
                $('#porcentaje_serologia').val(data.porcentaje_serologia);
                $('#nro_hiv_ac').val(data.nro_hiv_ac);
                $('#nro_hiv_p24').val(data.nro_hiv_p24);
                $('#nro_hbv_HbsAg').val(data.nro_hbv_HbsAg);
                $('#nro_hbv_ac').val(data.nro_hbv_ac);
                $('#nro_HBV_Ac_HBs').val(data.nro_HBV_Ac_HBs);
                $('#nro_hcv').val(data.nro_hcv);
                $('#nro_chagas_hai').val(data.nro_chagas_hai);
                $('#nro_chagas_elisa').val(data.nro_chagas_elisa);
                $('#nro_sifilis').val(data.nro_sifilis);
                $('#nro_brucelosi').val(data.nro_brucelosi);
                $('#nro_htlv_1_2').val(data.nro_htlv_1_2);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_inmuno_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#num_serologia').html("");
                $('#porcentaje_serologia').html("");
                $('#nro_hiv_ac').html("");
                $('#nro_hiv_p24').html("");
                $('#nro_hbv_HbsAg').html("");
                $('#nro_hbv_ac').html("");
                $('#nro_HBV_Ac_HBs').html("");
                $('#nro_hcv').html("");
                $('#nro_chagas_hai').html("");
                $('#nro_chagas_elisa').html("");
                $('#nro_sifilis').html("");
                $('#nro_brucelosi').html("");
                $('#nro_htlv_1_2').html("");
                
            }else{
                $('#num_serologia').html(data.num_serologia);
                $('#porcentaje_serologia').html(data.porcentaje_serologia);
                $('#nro_hiv_ac').html(data.nro_hiv_ac);
                $('#nro_hiv_p24').html(data.nro_hiv_p24);
                $('#nro_hbv_HbsAg').html(data.nro_hbv_HbsAg);
                $('#nro_hbv_ac').html(data.nro_hbv_ac);
                $('#nro_HBV_Ac_HBs').html(data.nro_HBV_Ac_HBs);
                $('#nro_hcv').html(data.nro_hcv);
                $('#nro_chagas_hai').html(data.nro_chagas_hai);
                $('#nro_chagas_elisa').html(data.nro_chagas_elisa);
                $('#nro_sifilis').html(data.nro_sifilis);
                $('#nro_brucelosi').html(data.nro_brucelosi);
                $('#nro_htlv_1_2').html(data.nro_htlv_1_2);
                
            }
            
        }
    });
}
/**************************/
/***********inmuno donantes**********/
function busca_periodo_inmuno_donantes(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno_donantes"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                $('#nro_abo_rh_donantes').val("");
                $('#rh_reativos').val("");
                $('#nro_pruebas').val("");
                $('#nro_fenotipo').val("");
                $('#nro_cooms_indirecta').val("");
                $('#nro_cooms_indirecta_mas').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#nro_abo_rh_donantes').val(data.nro_abo_rh_donantes);
                $('#rh_reativos').val(data.rh_reativos);
                $('#nro_pruebas').val(data.nro_pruebas);
                $('#nro_fenotipo').val(data.nro_fenotipo);
                $('#nro_cooms_indirecta').val(data.nro_cooms_indirecta);
                $('#nro_cooms_indirecta_mas').val(data.nro_cooms_indirecta_mas);
               
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_inmuno_donantes_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno_donantes"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                $('#nro_abo_rh_donantes').html("");
                $('#rh_reativos').html("");
                $('#nro_pruebas').html("");
                $('#nro_fenotipo').html("");
                $('#nro_cooms_indirecta').html("");
                $('#nro_cooms_indirecta_mas').html("");
                
            }else{
                $('#nro_abo_rh_donantes').html(data.nro_abo_rh_donantes);
                $('#rh_reativos').html(data.rh_reativos);
                $('#nro_pruebas').html(data.nro_pruebas);
                $('#nro_fenotipo').html(data.nro_fenotipo);
                $('#nro_cooms_indirecta').html(data.nro_cooms_indirecta);
                $('#nro_cooms_indirecta_mas').html(data.nro_cooms_indirecta_mas);
               
            }
            
        }
    });
}
/**************************/
/***********inmuno donantes**********/
function busca_periodo_inmuno_analiticas(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno_analiticas"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#nro_abo_rh_analiticas').val("");
                $('#rh_negativos').val("");
                $('#nro_fenotipo').val("");
                $('#nro_cooms_indirecta').val("");
                $('#nro_cooms_indirecta_mas').val("");
                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#nro_abo_rh_analiticas').val(data.nro_abo_rh_analiticas);
                $('#rh_negativos').val(data.rh_negativos);
                $('#nro_fenotipo').val(data.nro_fenotipo);
                $('#nro_cooms_indirecta').val(data.nro_cooms_indirecta);
                $('#nro_cooms_indirecta_mas').val(data.nro_cooms_indirecta_mas);
               
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_inmuno_analiticas(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_colecta_inmuno_analiticas"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#nro_abo_rh_analiticas').html("");
                $('#rh_negativos').html("");
                $('#nro_fenotipo').html("");
                $('#nro_cooms_indirecta').html("");
                $('#nro_cooms_indirecta_mas').html("");
                
            }else{
                $('#nro_abo_rh_analiticas').html(data.nro_abo_rh_analiticas);
                $('#rh_negativos').html(data.rh_negativos);
                $('#nro_fenotipo').html(data.nro_fenotipo);
                $('#nro_cooms_indirecta').html(data.nro_cooms_indirecta);
                $('#nro_cooms_indirecta_mas').html(data.nro_cooms_indirecta_mas);
               
            }
            
        }
    });
}
/**************************/
/***********producion hemocomponentes**********/
function busca_periodo_produccion(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_produccion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                
                $('#unidades_fraccionadas').val("");
                $('#hemo_obtenidos').val("");
                $('#globulos_rojos').val("");
                $('#plasma_fresco_congelado').val("");
                $('#plasma_modificado').val("");
                $('#concentrado_plaquetas').val("");
                $('#criopresepitados').val("");
                $('#plasma_aferesis').val("");
                $('#plaqueta_aferesis').val("");
                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#unidades_fraccionadas').val(data.unidades_fraccionadas);
                $('#hemo_obtenidos').val(data.hemo_obtenidos);
                $('#globulos_rojos').val(data.globulos_rojos);
                $('#plasma_fresco_congelado').val(data.plasma_fresco_congelado);
                $('#plasma_modificado').val(data.plasma_modificado);
                $('#concentrado_plaquetas').val(data.concentrado_plaquetas);
                $('#criopresepitados').val(data.criopresepitados);
                $('#plasma_aferesis').val(data.plasma_aferesis);
                $('#plaqueta_aferesis').val(data.plaqueta_aferesis);
                
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_produccion_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_produccion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                
                $('#unidades_fraccionadas').html("");
                $('#hemo_obtenidos').html("");
                $('#globulos_rojos').html("");
                $('#plasma_fresco_congelado').html("");
                $('#plasma_modificado').html("");
                $('#concentrado_plaquetas').html("");
                $('#criopresepitados').html("");
                $('#plasma_aferesis').html("");
                $('#plaqueta_aferesis').html("");
                
            }else{
               // alert($('#globulos_rojos').html());
                $('#unidades_fraccionadas').html(data.unidades_fraccionadas);
                $('#hemo_obtenidos').html(data.hemo_obtenidos);
                $('#globulos_rojos').html(data.globulos_rojos);
                $('#plasma_fresco_congelado').html(data.plasma_fresco_congelado);
                $('#plasma_modificado').html(data.plasma_modificado);
                $('#concentrado_plaquetas').html(data.concentrado_plaquetas);
                $('#criopresepitados').html(data.criopresepitados);
                $('#plasma_aferesis').html(data.plasma_aferesis);
                $('#plaqueta_aferesis').html(data.plaqueta_aferesis);
                 //alert($('#globulos_rojos').html());
            }
            
        }
    });
}
/**************************/
/***********producion hemocomponentes**********/
function busca_periodo_produccion_especiales(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_produccion_especiales"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#rojos_leucoreducidos').val("");
                $('#rojos_irradiados').val("");
                $('#plaquetas_irradiados').val("");
                $('#plaquetas_leucoreducidas').val("");
                $('#plaquetas_aferesis_leucoreducidas').val("");
                $('#plaquetas_aferesis_irradiados').val("");
                $('#rojos_fraccionados_pediatria').val("");
                                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#rojos_leucoreducidos').val(data.rojos_leucoreducidos);
                $('#rojos_irradiados').val(data.rojos_irradiados);
                $('#plaquetas_irradiados').val(data.plaquetas_irradiados);
                $('#plaquetas_leucoreducidas').val(data.plaquetas_leucoreducidas);
                $('#plaquetas_aferesis_leucoreducidas').val(data.plaquetas_aferesis_leucoreducidas);
                $('#plaquetas_aferesis_irradiados').val(data.plaquetas_aferesis_irradiados);
                $('#rojos_fraccionados_pediatria').val(data.rojos_fraccionados_pediatria);
                                
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_produccion_especiales_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_produccion_especiales"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#rojos_leucoreducidos').html("");
                $('#rojos_irradiados').html("");
                $('#plaquetas_irradiados').html("");
                $('#plaquetas_leucoreducidas').html("");
                $('#plaquetas_aferesis_leucoreducidas').html("");
                $('#plaquetas_aferesis_irradiados').html("");
                $('#rojos_fraccionados_pediatria').html("");
                
            }else{
                $('#rojos_leucoreducidos').html(data.rojos_leucoreducidos);
                $('#rojos_irradiados').html(data.rojos_irradiados);
                $('#plaquetas_irradiados').html(data.plaquetas_irradiados);
                $('#plaquetas_leucoreducidas').html(data.plaquetas_leucoreducidas);
                $('#plaquetas_aferesis_leucoreducidas').html(data.plaquetas_aferesis_leucoreducidas);
                $('#plaquetas_aferesis_irradiados').html(data.plaquetas_aferesis_irradiados);
                $('#rojos_fraccionados_pediatria').html(data.rojos_fraccionados_pediatria);
                     
            }
            
        }
    });
}
/**************************/
/***********producion hemocomponentes**********/
function busca_periodo_almacenamiento(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_almacenamiento_hemocomponentes"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#rojos_leucoreducidos').val("");
                $('#rojos_irradiados').val("");
                $('#plaquetas_irradiados').val("");
                $('#plaquetas_leucoreducidas').val("");
                $('#plaquetas_aferesis_leucoreducidas').val("");
                $('#plaquetas_aferesis_irradiados').val("");
                $('#rojos_fraccionados_pediatria').val("");
                                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#rojos_leucoreducidos').val(data.rojos_leucoreducidos);
                $('#rojos_irradiados').val(data.rojos_irradiados);
                $('#plaquetas_irradiados').val(data.plaquetas_irradiados);
                $('#plaquetas_leucoreducidas').val(data.plaquetas_leucoreducidas);
                $('#plaquetas_aferesis_leucoreducidas').val(data.plaquetas_aferesis_leucoreducidas);
                $('#plaquetas_aferesis_irradiados').val(data.plaquetas_aferesis_irradiados);
                $('#rojos_fraccionados_pediatria').val(data.rojos_fraccionados_pediatria);
                                
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_almacenamiento_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_almacenamiento_hemocomponentes"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#rojos_leucoreducidos2').html("");
                $('#rojos_irradiados2').html("");
                $('#plaquetas_irradiados2').html("");
                $('#plaquetas_leucoreducidas2').html("");
                $('#plaquetas_aferesis_leucoreducidas2').html("");
                $('#plaquetas_aferesis_irradiados2').html("");
                $('#rojos_fraccionados_pediatria2').html("");
                 
            }else{
                $('#rojos_leucoreducidos2').html(data.rojos_leucoreducidos);
                $('#rojos_irradiados2').html(data.rojos_irradiados);
                $('#plaquetas_irradiados2').html(data.plaquetas_irradiados);
                $('#plaquetas_leucoreducidas2').html(data.plaquetas_leucoreducidas);
                $('#plaquetas_aferesis_leucoreducidas2').html(data.plaquetas_aferesis_leucoreducidas);
                $('#plaquetas_aferesis_irradiados2').html(data.plaquetas_aferesis_irradiados);
                $('#rojos_fraccionados_pediatria2').html(data.rojos_fraccionados_pediatria);
                     
            }
            
        }
    });
}
/**************************/
/***********producion hemocomponentes**********/
function busca_periodo_alma_hemoderivados(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_almacenamiento_hemoderivados"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#albumina_serica_humana').val("");
                $('#gamaglobulina_2_5').val("");
                $('#gamaglobulina_5').val("");
                $('#gamaglobulina_10').val("");
                $('#gama_antitetanica').val("");
                $('#gama_anti_rh').val("");
                $('#factor_vIII').val("");
                                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#albumina_serica_humana').val(data.albumina_serica_humana);
                $('#gamaglobulina_2_5').val(data.gamaglobulina_2_5);
                $('#gamaglobulina_5').val(data.gamaglobulina_5);
                $('#gamaglobulina_10').val(data.gamaglobulina_10);
                $('#gama_antitetanica').val(data.gama_antitetanica);
                $('#gama_anti_rh').val(data.gama_anti_rh);
                $('#factor_vIII').val(data.factor_vIII);
                                
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_alma_hemoderivados_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_almacenamiento_hemoderivados"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#albumina_serica_humana').html("");
                $('#gamaglobulina_2_5').html("");
                $('#gamaglobulina_5').html("");
                $('#gamaglobulina_10').html("");
                $('#gama_antitetanica').html("");
                $('#gama_anti_rh').html("");
                $('#factor_vIII').html("");
                 
            }else{
                $('#albumina_serica_humana').html(data.albumina_serica_humana);
                $('#gamaglobulina_2_5').html(data.gamaglobulina_2_5);
                $('#gamaglobulina_5').html(data.gamaglobulina_5);
                $('#gamaglobulina_10').html(data.gamaglobulina_10);
                $('#gama_antitetanica').html(data.gama_antitetanica);
                $('#gama_anti_rh').html(data.gama_anti_rh);
                $('#factor_vIII').html(data.factor_vIII);
                 
            }
            
        }
    });
}
/**************************/
/***********_periodo_transfusiones**********/
function busca_periodo_transfusiones(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_transfusiones"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#globulos_rojos').val("");
                $('#plasma_fresco').val("");
                $('#plaquetas_aferesis').val("");
                $('#plaquetas').val("");
                $('#criopresipitados').val("");
                $('#descartes_plasma').val("");
                $('#descartes_plaquetas').val("");
                $('#descartes_globulos_rojos').val("");
                $('#descartes_criopresipitados').val("");
                $('#descartes_plaquetas_aferesis').val(""); 
                
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#globulos_rojos').val(data.globulos_rojos);
                $('#plasma_fresco').val(data.plasma_fresco);
                $('#plaquetas_aferesis').val(data.plaquetas_aferesis);
                $('#plaquetas').val(data.plaquetas);
                $('#criopresipitados').val(data.criopresipitados);
                $('#descartes_plasma').val(data.descartes_plasma);
                $('#descartes_plaquetas').val(data.descartes_plaquetas);
                $('#descartes_globulos_rojos').val(data.descartes_globulos_rojos);
                $('#descartes_criopresipitados').val(data.descartes_criopresipitados);
                $('#descartes_plaquetas_aferesis').val(data.descartes_plaquetas_aferesis);
                
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_transfusiones_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_transfusiones"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
               // $('#globulos_rojos').html("");
                $('#plasma_fresco').html("");
                $('#plaquetas_aferesis').html("");
                $('#plaquetas').html("");
                $('#criopresipitados').html("");
                $('#descartes_plasma').html("");
                $('#descartes_plaquetas').html("");
                $('#descartes_globulos_rojos').html("");
                $('#descartes_criopresipitados').html("");
                $('#descartes_plaquetas_aferesis').html(""); 
                
                
            }else{
               // $('#globulos_rojos').html(data.globulos_rojos);
                $('#plasma_fresco').html(data.plasma_fresco);
                $('#plaquetas_aferesis').html(data.plaquetas_aferesis);
                $('#plaquetas').html(data.plaquetas);
                $('#criopresipitados').html(data.criopresipitados);
                $('#descartes_plasma').html(data.descartes_plasma);
                $('#descartes_plaquetas').html(data.descartes_plaquetas);
                $('#descartes_globulos_rojos').html(data.descartes_globulos_rojos);
                $('#descartes_criopresipitados').html(data.descartes_criopresipitados);
                $('#descartes_plaquetas_aferesis').html(data.descartes_plaquetas_aferesis);
                
            }
            
        }
    });
}
/**************************/
/***********citaciones**********/
function busca_periodo_citaciones(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_citaciones"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#pendiente_informar').val("");
                $('#pendiente_resultados').val("");
                $('#realizadas').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#pendiente_informar').val(data.pendiente_informar);
                $('#pendiente_resultados').val(data.pendiente_resultados);
                $('#realizadas').val(data.realizadas);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_citaciones_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_citaciones"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                $('#pendiente_informar').html("");
                $('#pendiente_resultados').html("");
                $('#realizadas').html("");
                
            }else{
                $('#pendiente_informar').html(data.pendiente_informar);
                $('#pendiente_resultados').html(data.pendiente_resultados);
                $('#realizadas').html(data.realizadas);
                
            }
            
        }
    });
}
/**************************/
/***********medicion**********/
function busca_periodo_medicion(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_medicion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                
                $('#inst_convenio').val("");
                $('#inst_servicios_hemoterapia').val("");
                $('#centro_hemoterapia_privado').val("");
                $('#centro_hemoterapia_publico').val("");
                $('#bs_extrahospitalario_privado').val("");
                $('#bs_extrahospitalario_publico').val("");
                $('#bs_intrahospitalario_privado').val("");
                $('#bs_intrahospitalario_publico').val("");
                $('#servicio_transfusion_privado').val("");
                $('#servicio_transfusion_publico').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#inst_convenio').val(data.inst_convenio);
                $('#inst_servicios_hemoterapia').val(data.inst_servicios_hemoterapia);
                $('#centro_hemoterapia_privado').val(data.centro_hemoterapia_privado);
                $('#centro_hemoterapia_publico').val(data.centro_hemoterapia_publico);
                $('#bs_extrahospitalario_privado').val(data.bs_extrahospitalario_privado);
                $('#bs_extrahospitalario_publico').val(data.bs_extrahospitalario_publico);
                $('#bs_intrahospitalario_privado').val(data.bs_intrahospitalario_privado);
                $('#bs_intrahospitalario_publico').val(data.bs_intrahospitalario_publico);
                $('#servicio_transfusion_privado').val(data.servicio_transfusion_privado);
                $('#servicio_transfusion_publico').val(data.servicio_transfusion_publico);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
function busca_periodo_medicion_informe(value){	
    $.ajax({
        url:           "controlador.php",
        data:          {periodo: ""+value+"" , action: "buscar_medicion"},
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.colectas_vacio==0){
                
                
                $('#inst_convenio').val("");
                $('#inst_servicios_hemoterapia').val("");
                $('#centro_hemoterapia_privado').val("");
                $('#centro_hemoterapia_publico').val("");
                $('#bs_extrahospitalario_privado').val("");
                $('#bs_extrahospitalario_publico').val("");
                $('#bs_intrahospitalario_privado').val("");
                $('#bs_intrahospitalario_publico').val("");
                $('#servicio_transfusion_privado').val("");
                $('#servicio_transfusion_publico').val("");
                $('#id_registro').val("");
                $('#azul').hide();
                $('#amarillo').show();
                $('#rojo').hide();
                $('#verde').hide();
            }else{
                $('#inst_convenio').val(data.inst_convenio);
                $('#inst_servicios_hemoterapia').val(data.inst_servicios_hemoterapia);
                $('#centro_hemoterapia_privado').val(data.centro_hemoterapia_privado);
                $('#centro_hemoterapia_publico').val(data.centro_hemoterapia_publico);
                $('#bs_extrahospitalario_privado').val(data.bs_extrahospitalario_privado);
                $('#bs_extrahospitalario_publico').val(data.bs_extrahospitalario_publico);
                $('#bs_intrahospitalario_privado').val(data.bs_intrahospitalario_privado);
                $('#bs_intrahospitalario_publico').val(data.bs_intrahospitalario_publico);
                $('#servicio_transfusion_privado').val(data.servicio_transfusion_privado);
                $('#servicio_transfusion_publico').val(data.servicio_transfusion_publico);
                $('#id_registro').val(data.id_registro);
                $('#azul').show();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').hide();
            }
            
        }
    });
}
/**************************/
function save_datos(){	
    var data=$("#form_datos").serialize();
    $.ajax({
        url:           "controlador.php",
        data:           data ,
        type: 'post',
        success:       function(data){
            //alert(data);
            if(data!=0){
                $('#azul').hide();
                $('#amarillo').hide();
                $('#rojo').hide();
                $('#verde').show();
                $('#id_registro').val(data);
            }else{
                $('#azul').hide();
                $('#amarillo').hide();
                $('#rojo').show();
                $('#verde').hide();
            }
            
        }
    });
}
/**************************/
function save_datos_equipo(){
    //alert('hoa');
    $("#form_datos").submit();
}
function save_datos_menu(){
    //alert('hoa');
    $("#form_datos").submit();
}
function save_datos_solicitud(){
    //alert('hoa');
    $("#form_datos").submit();
}
function save_datos_marcas(){
    //alert('hoa');
    $("#form_datos").submit();
}
function save_datos_lugares(){
    $("#form_datos").submit();
}
function save_datos_tipo_equipo(){
    $("#form_datos").submit();
}
function save_datos_proveedores(){
    $("#form_datos").submit();
}
function editar_datos(){
    $("#form_datos").submit();
}
function save_datos_sectores(){
    $("#form_datos").submit();
}
function save_datos_servicios(){
    $("#form_datos").submit();
}

/***********************/
function save_datos_poe(){
    if($("#descripcion").val()==''){
        $('#rojo').html('Debe ingresar todos los campos');
        $('#rojo').show();
        return false;
    }
    $("#form_datos").submit();
    
}
function save_datos_area(){
    if($("#descripcion").val()==''){
        $('#rojo').html('Debe ingresar todos los campos');
        $('#rojo').show();
        return false;
    }
    $("#form_datos").submit();
    
}
function save_datos_personas(){
    //alert('sadasdasd');
    $("#form_datos").submit();
    
}
 
function guardar_examen(){
$("#form_datos_examen").submit();
}
function calificar_alumno(){
$("#form_datos").submit();
}
function validar_examen(){
$("#form_datos").submit();
}
function volver_listado(){
 window.location.href = 'controlador.php?action=lista_examenes_validar';
}
 
/*****************************************/
function busca_periodo_informe(value){	
    busca_periodo_colecta_informe(value);
    busca_periodo_aferesis_informe(value);
    busca_periodo_atencion_informe(value);  
    busca_periodo_apoyo_insumos_informe(value);
    busca_periodo_inmuno_informe(value);
    busca_periodo_inmuno_donantes_informe(value);
    busca_periodo_produccion_informe(value);	
    busca_periodo_produccion_especiales_informe(value);
    busca_periodo_alma_hemoderivados_informe(value);
    busca_periodo_transfusiones_informe(value);
    busca_periodo_citaciones_informe(value);
    busca_periodo_medicion_informe(value);
    busca_periodo_almacenamiento_informe(value);
}
function save_item_mantenimiento(){
    var tipo_equipo=$("#tipo_equipo").val();
    var tipo_mantenimiento=$("#tipo_mantenimiento").val();
    var titulo=$("#titulo").val();
    var item=$("#item").val();
    var costo=$("#costo").val();
    var tiempo=$("#tiempo").val();
    var frecuencia=$("#frecuencia").val();
    var condicion=$("#condicion").val();
    var id_registro=$("#id_registro").val();
    if(tipo_equipo=='0'){
        alert('Debe ingresar un tipo de equipo');
        return false;
    }
    if(tipo_mantenimiento=='0'){
        alert('Debe ingresar un tipo de mantenimiento');
        return false;
    }
    if(item==''){
        alert('Debe ingresar una descripcion');
        return false;
    }
    $.ajax({
        url:           "controlador.php",
        data:          {tipo_equipo: ""+tipo_equipo+"", condicion: ""+condicion+"", frecuencia: ""+frecuencia+"", costo: ""+costo+"", tiempo: ""+tiempo+"", titulo: ""+titulo+"", tipo_mantenimiento: ""+tipo_mantenimiento+"", item: ""+item+"", id_registro: ""+id_registro+"", action: "guardar_item"},
        type: 'post',
        success:       function(data){
            $("#item").val('');
            $("#condicion").val('');
            $("#frecuencia").val('');
            $("#costo").val('');
            $("#tiempo").val('');
            $("#titulo").val('');
            $("#id_registro").val('');
            trae_item_mantenimiento();
        }    
    });    
}
function elimina_item(item){
    if(confirm('Usted esta por eliminar un item.Desea Continuar?')){
        $.ajax({
            url:           "controlador.php",
            data:          {item: ""+item+"", action: "eliminar_item"},
            type: 'post',
            success:       function(data){
                trae_item_mantenimiento();
            }    
        });
    }
}
function edita_item(item){
    if(confirm('Usted esta por editar un item.Desea Continuar?')){
        $.ajax({
            url: "trae_datos_item_mantenimiento.php",
            data: {item: ""+item+""},
            type: 'post',
            dataType:      'json',
            success:       function(data){
                //alert(data.tiempo);
                document.forms['form_datos']['frecuencia'].value=data.frecuencia;
                document.forms['form_datos']['condicion'].value=data.condicion;
                $("#titulo").val(data.titulo);
                $("#item").val(data.descripcion);
                $("#costo").val(data.costo);
                $("#tiempo").val(data.tiempo);
                $("#id_registro").val(data.id_registro);
            }
        });
    }
}
function trae_item_mantenimiento(){
    var tipo_mantenimiento=$("#tipo_mantenimiento").val();
    var tipo_equipo=$("#tipo_equipo").val()
    $("#id_registro").val('');
    //$(".se-pre-con").show();
    $("#tabla_listado_item_mantenimiento").load('trae_item_mantenimiento.php?tipo_equipo='+tipo_equipo+'&tipo_mantenimiento='+tipo_mantenimiento);
}
function trae_provincias(pais){
   // alert(pais);
    $("#idprovincia").load('trae_provincias.php?idpais='+pais);
}
function trae_localidad(provincia){
    $("#idlocalidad").load('trae_localidad.php?idprovincia='+provincia);
}
function trae_provincias(pais){
    // alert(pais);
    $("#idprovincia").load('trae_provincias.php?idpais='+pais);
}
function trae_localidad(provincia){
    $("#idlocalidad").load('trae_localidad.php?idprovincia='+provincia);
}
// ///////////*************mascar a de hora***********//////////////
function mascaraHora(ob,ponMascara,valida) {
    cursor=ob.selectionStart;
  
    /* Validacion cuando la caja pierde el foco*/
    if(valida) {
    if (/^(0[0-9]|1\d|2[0-3]):([0-5]\d)/.test(ob.value)) {
      return true;
    }else{
      ob.value='';
      return false;
    }
    }
    /* Pone mascara si la caja esta en blanco */
    if(ponMascara) {
      if (ob.value=='') ob.value='hh:mm';
      ob.setSelectionRange(0,0);
      return true;
    }
    /* Una vez la hora es correcta no deja añadir mas nada */
    if (ob.value.length>5 && /^(0[1-9]|1\d|2[0-3]):([0-5]\d)/.test(ob.value) && cursor > 5) {
      ob.value=ob.value.slice(0,ob.value.length-1)
      return true;
    }
    /* Procesa los numeros que se van introduciendo */
    if (ob.value.length>5){
    switch (cursor){
    case 1:
      if (/^[012]/.test(ob.value[cursor-1])) {
        if (/^[4-9]/.test(ob.value[cursor+1]) && /^[2]/.test(ob.value[cursor-1])) {
          //alert('siii')
          ob.value=ob.value[cursor]+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor-1,cursor-1);
        }else{
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor,cursor);
        }
      }else{
        ob.value=ob.value.substring( cursor,ob.value.length)
        ob.setSelectionRange(cursor-1,cursor-1);
      }
      break;
    case 2:
      if (/^[2]/.test(ob.value[cursor-2])) {
        if (/^[0-3]/.test(ob.value[cursor-1])) {
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor+1,cursor+1);
        }else{
          ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
          ob.setSelectionRange(cursor-1,cursor-1);
        }
      }else if (/^[01]/.test(ob.value[cursor-2])) {
        if (/^[0-9]/.test(ob.value[cursor-1])) {
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor+1,cursor+1);
        }else{
          ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
          ob.setSelectionRange(cursor-1,cursor-1);
        }
      }else{
        ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
        ob.setSelectionRange(cursor-1,cursor-1);
      }
      break;
    case 3:
        if (/^:/.test(ob.value[cursor-1])) {
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor,cursor);
        }else{
          ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
          ob.setSelectionRange(cursor-1,cursor-1);
        }
      break;
    case 4:
        if (/^[0-5]/.test(ob.value[cursor-1])) {
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor,cursor);
        }else{
          ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
          ob.setSelectionRange(cursor-1,cursor-1);
        }
      break;
    case 5:
        if (/^[0-9]/.test(ob.value[cursor-1])) {
          ob.value=ob.value.substring(0,cursor)+ob.value.substring(cursor+1,ob.value.length);
          ob.setSelectionRange(cursor,cursor);
        }else{
          ob.value=ob.value.substring( 0,cursor-1)+ob.value.substring( cursor,ob.value.length)
          ob.setSelectionRange(cursor-1,cursor-1);
        }
      break;
    default:
      alert('Error!!!');
      break;
    }
    return true
  }else if(ob.value.length<5){
    ob.value='hh:mm';
    ob.setSelectionRange(0,0);
  }
}
//////////////////////////////////////////////
function ver_datos_unidad(value){
    //alert('Estoy en una Granja!!!');
    $.ajax({
        url:           "trae_datos_unidad.php",
        data:          { numeroUnidad: ""+value+"" },
        dataType:      'json',
        type: 'get',
        success:       function(data){
            if(data.error=='1'){
                alert('El numero de unidad no existe')
                $("#nro_unidad").val('');
                $("#datos_unidad").hide();
            }else {
                $("#nro_donacion").html(data.nrodonante);
                $("#paciente").html(data.paciente);
                $("#datos_unidad").show();

            }
        }
    });
}
function  ver_detalle_mantenimiento(mantenimiento,equipo){
    $("#detalle_mantenimiento").show();
    $("#detalle_mantenimiento").load('trae_detalle_mantenimiento.php?equipo='+equipo+'&mantenimiento='+mantenimiento);
}
function  cieerra_detalle_mantenimiento(mantenimiento,equipo) {
    $("#detalle_mantenimiento").hide();
}