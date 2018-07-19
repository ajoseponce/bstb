<?php
//ini_set('upload_max_filesize', '50M');
//set_time_limit(0);
include('lib/functions.php');
requireLogin();
error_reporting(0);
$action = $_REQUEST["action"];
//
    switch ($action) {

        //crga el categorias
        case "informe_mensual":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includesf******************/

            $result = $consultas->getInformeMensual(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_informe_mensual.php';
            break;
        case "carga_colecta_externa_indi":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getColectasExternas(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_colecta_externa.php';
            break;
        /*********carga de poes*********/
        case "carga_poe":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $formulario = 'forms/form_poe.php';
            break;
        /*********carga de poes*********/
        case "carga_area":

            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            /*********************/

            $formulario = 'forms/form_area.php';
            break;
        case "edita_poe":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getPoeById($_REQUEST['id_poe']);
            $formulario = 'forms/form_poe.php';
            break;

        case "edita_area":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getAreaById($_REQUEST['id_area']);
            $formulario = 'forms/form_area.php';
            break;
        case "eliminar_doc":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            unlink("archivos/poe_" . $_REQUEST['id_poe'] . ".doc");
            $result = $consultas->getPoeById($_REQUEST['id_poe']);
            $formulario = 'forms/form_poe.php';
            break;

        case "eliminar_registro":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/

            unlink("archivos/" . $_REQUEST['archivoregistro']);
            // $result = $consultas->getPoeById($_REQUEST['id_poe']);
            $sql = "DELETE FROM poe_registros WHERE id_registro='" . $_REQUEST['id_registro'] . "'";

            $conn->execute($sql);
            $formulario = 'forms/form_agrega_registros.php';
            break;
        case "carga_proceso_atencion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProcesoAtencion(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_proceso_atencion.php';
            break;
        case "carga_aferesis":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getAferesis(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_aferesis.php';
            break;
        case "carga_calif_bio_inmuno":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getCalifBioInmuno(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_calif_bio_inmuno.php';
            break;

        /*****************bio imuno analitico******************/
        case "carga_calif_bio_inmuno_analiticos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getCalifBioInmunoAnaliticos(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_calif_bio_inmuno_analiticas.php';
            break;
        /*****************bio imuno donanttes******************/
        case "carga_calif_bio_inmuno_donantes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getCalifBioInmunoDonantes(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_calif_bio_inmuno_donantes.php';
            break;
        /*****************produccion hemocomponentes******************/
        case "carga_produccion_hemocomponentes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProduccionHemocomponentes(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_produccion_hemocomponentes.php';
            break;
        /*****************produccion hemocomponentes******************/
        case "carga_produccion_hemocomponentes_especiales":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProduccionHemocomponentesEspeciales(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_produccion_hemo_especiales.php';
            break;
        /*****************produccion hemocomponentes******************/
        case "carga_apoyo_insumos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getApoyoInsumos(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/

            $formulario = 'forms/form_apoyo_insumos.php';
            break;
        /*****************almacenamiento hemocomponentes******************/
        case "carga_almacenamiento_hemocomponentes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getAlmacenamientoHemocomponentes(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/
            $formulario = 'forms/form_almacenamiento_hemocomponentes.php';
            break;
        /*****************almacenamiento hemoderivados******************/
        case "carga_almacenamiento_hemoderivados":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getAlmacenamientoHemoderivados(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/
            $formulario = 'forms/form_almacenamiento_hemoderivados.php';
            break;
        /*****************proceso_ transfusion******************/
        case "carga_proceso_transfusion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProcesoTransfusion(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/
            $formulario = 'forms/form_transfusiones.php';
            break;
        /*****************proceso_ transfusion******************/
        case "carga_proceso_citaciones":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProcesoCitacion(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/
            $formulario = 'forms/form_citaciones.php';
            break;
        /*****************proceso_ transfusion******************/
        case "carga_medicion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/

            $result = $consultas->getProcesoMedicion(date('n'));
            if ($result) {
                $estado_azul = "";
                $estado_amarillo = "none";
            } else {
                $estado_azul = "none";
                $estado_amarillo = "";
            }
            /*********************/
            $formulario = 'forms/form_medicion.php';
            break;
        /********************************/
        case "logout":
            /***************includes******************/
            logOut();
            exit;
            break;
        case "buscar_colecta_externa":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getColectasExternas($_REQUEST['periodo']);
            if ($result) {
                $html['colectas_programadas'] = $result->colectas_programadas;
                $html['colectas_realizadas'] = $result->colectas_realizadas;
                $html['promedio_donante'] = $result->promedio_donante;
                $html['colectas_realizadas_interior_prov'] = $result->colectas_realizadas_interior_prov;
                $html['colectas_realizadas_pos_gar_can'] = $result->colectas_realizadas_pos_gar_can;
                $html['combustible'] = $result->combustible;
                $html['id_registro'] = $result->id_registro;
                //$html['colectas_programadas']=$result->colectas_programadas;
            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar atencion******************/
        case "buscar_atencion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProcesoAtencion($_REQUEST['periodo']);
            if ($result) {

                $html['donantes_bscm'] = $result->donantes_bscm;
                $html['donantes_colectas'] = $result->donantes_colectas;
                $html['donantes_dorado'] = $result->donantes_dorado;
                $html['diferidos'] = $result->diferidos;
                $html['autoexcluidos'] = $result->autoexcluidos;
                $html['extracion_fallida'] = $result->extracion_fallida;
                $html['serologia_reactiva'] = $result->serologia_reactiva;
                $html['n_vencimientos'] = $result->n_vencimientos;
                $html['uni_descartadas_prod_plasma'] = $result->uni_descartadas_prod_plasma;

                $html['id_registro'] = $result->id_registro;
                //$html['colectas_programadas']=$result->colectas_programadas;
            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar aferesis******************/
        case "buscar_aferesis":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getAferesis($_REQUEST['periodo']);
            if ($result) {
                $html['aferesis_pacientes'] = $result->aferesis_pacientes;
                $html['aferesis_donantes'] = $result->aferesis_donantes;
                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar aferesis******************/
        case "buscar_apoyo_insumos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************fin includes******************/
            $html = array();
            $result = $consultas->getApoyoInsumos($_REQUEST['periodo']);
            if ($result) {
                $html['ref_verificadas'] = $result->ref_verificadas;
                $html['num_ref_faltantes'] = $result->num_ref_faltantes;
                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar inmuno******************/
        case "buscar_colecta_inmuno":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getCalifBioInmuno($_REQUEST['periodo']);
            if ($result) {
                $html['num_serologia'] = $result->num_serologia;
                $html['porcentaje_serologia'] = $result->porcentaje_serologia;
                $html['nro_hiv_ac'] = $result->nro_hiv_ac;
                $html['nro_hiv_p24'] = $result->nro_hiv_p24;
                $html['nro_hbv_HbsAg'] = $result->nro_hbv_HbsAg;
                $html['nro_hbv_ac'] = $result->nro_hbv_ac;
                $html['nro_HBV_Ac_HBs'] = $result->nro_HBV_Ac_HBs;
                $html['nro_hcv'] = $result->nro_hcv;
                $html['nro_chagas_hai'] = $result->nro_chagas_hai;
                $html['nro_chagas_elisa'] = $result->nro_chagas_elisa;
                $html['nro_sifilis'] = $result->nro_sifilis;
                $html['nro_brucelosi'] = $result->nro_brucelosi;
                $html['nro_htlv_1_2'] = $result->nro_htlv_1_2;
                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar inmuno******************/
        case "buscar_colecta_inmuno_donantes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getCalifBioInmunoDonantes($_REQUEST['periodo']);
            if ($result) {

                $html['nro_abo_rh_donantes'] = $result->nro_abo_rh_donantes;
                $html['rh_reativos'] = $result->rh_reativos;
                $html['nro_pruebas'] = $result->nro_pruebas;
                $html['nro_fenotipo'] = $result->nro_fenotipo;
                $html['nro_cooms_indirecta'] = $result->nro_cooms_indirecta;
                $html['nro_cooms_indirecta_mas'] = $result->nro_cooms_indirecta_mas;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar inmuno******************/
        case "buscar_colecta_inmuno_analiticas":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getCalifBioInmunoAnaliticos($_REQUEST['periodo']);
            if ($result) {

                $html['nro_abo_rh_analiticas'] = $result->nro_abo_rh_analiticas;
                $html['rh_negativos'] = $result->rh_negativos;
                $html['nro_fenotipo'] = $result->nro_fenotipo;
                $html['nro_cooms_indirecta'] = $result->nro_cooms_indirecta;
                $html['nro_cooms_indirecta_mas'] = $result->nro_cooms_indirecta_mas;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar inmuno******************/
        case "buscar_produccion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProduccionHemocomponentes($_REQUEST['periodo']);
            if ($result) {

                $html['unidades_fraccionadas'] = $result->unidades_fraccionadas;
                $html['hemo_obtenidos'] = $result->hemo_obtenidos;
                $html['globulos_rojos'] = $result->globulos_rojos;
                $html['plasma_fresco_congelado'] = $result->plasma_fresco_congelado;
                $html['plasma_modificado'] = $result->plasma_modificado;
                $html['concentrado_plaquetas'] = $result->concentrado_plaquetas;
                $html['criopresepitados'] = $result->criopresepitados;
                $html['plasma_aferesis'] = $result->plasma_aferesis;
                $html['plaqueta_aferesis'] = $result->plaqueta_aferesis;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_produccion_especiales":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProduccionHemocomponentesEspeciales($_REQUEST['periodo']);
            if ($result) {
                $html['rojos_leucoreducidos'] = $result->rojos_leucoreducidos;
                $html['rojos_irradiados'] = $result->rojos_irradiados;
                $html['plaquetas_irradiados'] = $result->plaquetas_irradiados;
                $html['plaquetas_leucoreducidas'] = $result->plaquetas_leucoreducidas;
                $html['plaquetas_aferesis_leucoreducidas'] = $result->plaquetas_aferesis_leucoreducidas;
                $html['plaquetas_aferesis_irradiados'] = $result->plaquetas_aferesis_irradiados;
                $html['rojos_fraccionados_pediatria'] = $result->rojos_fraccionados_pediatria;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_almacenamiento_hemocomponentes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getAlmacenamientoHemocomponentes($_REQUEST['periodo']);
            if ($result) {
                $html['rojos_leucoreducidos'] = $result->rojos_leucoreducidos;
                $html['rojos_irradiados'] = $result->rojos_irradiados;
                $html['plaquetas_irradiados'] = $result->plaquetas_irradiados;
                $html['plaquetas_leucoreducidas'] = $result->plaquetas_leucoreducidas;
                $html['plaquetas_aferesis_leucoreducidas'] = $result->plaquetas_aferesis_leucoreducidas;
                $html['plaquetas_aferesis_irradiados'] = $result->plaquetas_aferesis_irradiados;
                $html['rojos_fraccionados_pediatria'] = $result->rojos_fraccionados_pediatria;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_almacenamiento_hemoderivados":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getAlmacenamientoHemoderivados($_REQUEST['periodo']);
            if ($result) {

                $html['albumina_serica_humana'] = $result->albumina_serica_humana;
                $html['gamaglobulina_2_5'] = $result->gamaglobulina_2_5;
                $html['gamaglobulina_5'] = $result->gamaglobulina_5;
                $html['gamaglobulina_10'] = $result->gamaglobulina_10;
                $html['gama_antitetanica'] = $result->gama_antitetanica;
                $html['gama_anti_rh'] = $result->gama_anti_rh;
                $html['factor_vIII'] = $result->factor_vIII;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_transfusiones":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProcesoTransfusion($_REQUEST['periodo']);
            if ($result) {

                $html['globulos_rojos'] = $result->globulos_rojos;
                $html['plasma_fresco'] = $result->plasma_fresco;
                $html['plaquetas_aferesis'] = $result->plaquetas_aferesis;
                $html['plaquetas'] = $result->plaquetas;
                $html['criopresipitados'] = $result->criopresipitados;
                $html['descartes_plasma'] = $result->descartes_plasma;
                $html['descartes_plaquetas'] = $result->descartes_plaquetas;
                $html['descartes_globulos_rojos'] = $result->descartes_globulos_rojos;
                $html['descartes_criopresipitados'] = $result->descartes_criopresipitados;
                $html['descartes_plaquetas_aferesis'] = $result->descartes_plaquetas_aferesis;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_citaciones":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProcesoCitacion($_REQUEST['periodo']);
            if ($result) {

                $html['pendiente_informar'] = $result->pendiente_informar;
                $html['pendiente_resultados'] = $result->pendiente_resultados;
                $html['realizadas'] = $result->realizadas;

                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        /**************buscar produccion_especiales******************/
        case "buscar_medicion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/
            $html = array();
            $result = $consultas->getProcesoMedicion($_REQUEST['periodo']);
            if ($result) {

                $html['inst_convenio'] = $result->inst_convenio;
                $html['inst_servicios_hemoterapia'] = $result->inst_servicios_hemoterapia;
                $html['centro_hemoterapia_privado'] = $result->centro_hemoterapia_privado;
                $html['centro_hemoterapia_publico'] = $result->centro_hemoterapia_publico;
                $html['bs_extrahospitalario_privado'] = $result->bs_extrahospitalario_privado;
                $html['bs_extrahospitalario_publico'] = $result->bs_extrahospitalario_publico;
                $html['bs_intrahospitalario_privado'] = $result->bs_intrahospitalario_privado;
                $html['bs_intrahospitalario_publico'] = $result->bs_intrahospitalario_publico;
                $html['servicio_transfusion_privado'] = $result->servicio_transfusion_privado;
                $html['servicio_transfusion_publico'] = $result->servicio_transfusion_publico;


                $html['id_registro'] = $result->id_registro;

            } else {
                $html['colectas_vacio'] = 0;
            }
            echo json_encode($html);
            exit;
            break;
        case "lista_poes":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_areas_user = $consultas->getAreas();

            /*********************/
            $formulario = 'forms/form_lista_poes.php';
            break;
        case "lista_examenes":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getExamenes();

            /*********************/
            $formulario = 'forms/form_lista_examenes.php';
            break;
        case "lista_examenes_validar":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getExamenesPorValidad();

            /*********************/
            $formulario = 'forms/form_lista_examenes_validar.php';
            break;
        case "rendir_poe":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $estado = $consultas->getRindioExamen($_REQUEST['id_examen']);
            if ($estado) {
                //echo "No sea pillo Usted ya rindio el examen";
                $mensaje = "Usted ya rindio el examen y su calificacion fue un " . $estado;
                $formulario = 'forms/form_mensaje.php';
                //exit;
            } else {
                /***************fin includes******************/
                $preguntas = $consultas->getExamen($_REQUEST['id_examen']);
                /*********************/
                $formulario = 'forms/form_examen.php';
            }
            break;
        case "validar_examen":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            /***************fin includes******************/
            $preguntas = $consultas->getExamen($_REQUEST['id_examen']);
            /*********************/
            $formulario = 'forms/form_examen_validar.php';

            break;
        case "validar_examen_entero":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $sql = "UPDATE examen SET estado='A' WHERE id_examen='" . $_REQUEST['id_examen'] . "'";
            mysql_query($sql);
            $result_user = $consultas->getExamenesPorValidad();

            /*********************/
            $formulario = 'forms/form_lista_examenes_validar.php';


            break;
        case "listar_personas":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_personas = $consultas->getpersonas();
            /*********************/
            $formulario = 'forms/form_lista_personas.php';
            break;
        case "guardar_persona":
            include('lib/DB_Conectar.php');
            //include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');

            $result = $consultas->save_persona($_REQUEST);
            //$result_hemo = $consultas->save_persona_hemotrans($_REQUEST);
            include('header.php');
            include('menu.php');

            //$result_user = $consultas->getPersonas();
            $result_personas = $consultas->getpersonas();
            /*********************/
            $formulario = 'forms/form_lista_personas.php';
            //exit;
            break;
        case "edita_persona":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            //include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            //$paises = $consultas->getPaises();
            $result = $consultas->getPersonaById($_REQUEST['personaID']);
            $formulario = 'forms/form_persona.php';
            break;
        case "lista_areas":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getAreas();
            /*********************/
            $formulario = 'forms/form_lista_area.php';
            break;
        case "lista_poe_admin":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getPoes();
            /*********************/
            $formulario = 'forms/form_lista_poe_admin.php';
            break;

        /*************************************/
        case "guardar_poe":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_FILES["file_doc"]["type"]);
            //exit;
            $result = $consultas->save_datos_poe($_REQUEST);

            // Hacemos una condicion en la que solo permitiremos que se suban DOCs

            if (isset($_FILES["file_doc"])) {
                if ($_FILES["file_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $_FILES["file_doc"]["type"] == "application/msword") {
                    //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
                    if ($_FILES["file_doc"]["error"] > 0) {
                        echo $_FILES["file_doc"]["error"] . "";
                    } else {
                        // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
                        if (file_exists("archivos/poe_" . $result . ".doc")) {
                            //echo  " ya existe. ";
                        } else {
                            // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                            move_uploaded_file($_FILES["file_doc"]["tmp_name"], "archivos/poe_" . $result . ".doc");
                            //echo "Archivo Subido ";
                            // echo "<img src='archivos/".$_FILES["file_pdf"]["name"]."'>";
                        }
                    }
                }
            }
            /***************fin includes******************/
            /***************includes******************/


            include('header.php');
            include('menu.php');
            $result_user = $consultas->getPoes();
            /*********************/
            $formulario = 'forms/form_lista_poe_admin.php';
            //exit;
            break;
        /*************************************/
        case "guardar_registro":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);
            $result = $consultas->save_registro_poe($_REQUEST, $_FILES["file_doc_registro"]["name"]);

            // Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 20 KB
            if (isset($_FILES["file_doc_registro"])) {
                //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
                if ($_FILES["file_doc_registro"]["error"] > 0) {
                    echo $_FILES["file_doc_registro"]["error"] . "";
                } else {

                    move_uploaded_file($_FILES["file_doc_registro"]["tmp_name"], "archivos/" . $_FILES["file_doc_registro"]["name"]);
                    //echo "Archivo Subido ";
                    // echo "<img src='archivos/".$_FILES["file_pdf"]["name"]."'>";

                }

            }
            //print_r($_REQUEST);

            /***************fin includes******************/
            /***************includes******************/


            include('header.php');
            include('menu.php');
            $_REQUEST['poe'] = $consultas->getNombrePoes($_REQUEST['id_poe']);
            /*********************/
            $formulario = 'forms/form_agrega_registros.php';

            //exit;
            break;
        case "carga_persona":

            include('lib/DB_Conectar.php');
           // include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');
            //print_r($_SESSION);

            include('header.php');
            include('menu.php');
            //$paises = $consultas->getPaises();
            $formulario = 'forms/form_persona.php';
            break;
        /**********carga relacion poe area***********/
        case "guardar_relacion_poe_area":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);
            $result = $consultas->save_datos_relacion($_REQUEST);
            include('header.php');
            include('menu.php');
            $result_user = $consultas->getRelaciones();
            /*********************/
            $formulario = 'forms/form_lista_relaciones.php';
            //exit;
            break;
        case "carga_relacion_poe_area":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);

            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_relacion_poe_area.php';
            break;
        case "edita_relacion":

            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getRelacionesbyID($_REQUEST['id_relacion']);
            $formulario = 'forms/form_relacion_poe_area.php';
            break;
        case "lista_relaciones":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getRelaciones();
            /*********************/
            $formulario = 'forms/form_lista_relaciones.php';
            break;
        /***************************/
        case "carga_registros":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);

            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_agrega_registros.php';
            break;
        case "carga_examen":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);

            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_carga_examen.php';
            break;
        /*************************************/
        case "guardar_area":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);
            $result = $consultas->save_datos_area($_REQUEST);
            include('header.php');
            include('menu.php');
            $result_user = $consultas->getAreas();
            /*********************/
            $formulario = 'forms/form_lista_area.php';
            //exit;
            break;


        case "guardar_colecta_indicador":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_datos($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_proceso_atencion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_atencion($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_aferesis":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_aferesis($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_inmuno":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_inmuno($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_inmuno_analiticas":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_inmuno_analiticas($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_inmuno_donantes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_inmuno_donantes($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_produccion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_produccion_hemocomponentes($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_produccion_especiales":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin includes******************/

            $result = $consultas->save_produccion_hemocomponentes_especiales($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_almacenamiento_hemocomponentes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin inscludes******************/
            $result = $consultas->save_almacenamiento_hemocomponentes($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_almacenamiento_hemoderivados":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin inscludes******************/
            $result = $consultas->save_almacenamiento_hemoderivados($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_transfusiones":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin inscludes******************/
            $result = $consultas->save_transfusion($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_citaciones":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            /***************fin inscludes******************/
            $result = $consultas->save_citaciones($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_medicion":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************fin inscludes******************/
            $result = $consultas->save_medicion($_REQUEST);
            echo $result;
            exit;
            break;
        case "guardar_apoyo_insumos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************fin inscludes******************/
            $result = $consultas->save_apoyo_insumos($_REQUEST);
            echo $result;
            exit;
            break;
        case "calificar_alumno":
            /***************includes******************/

            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //$i=1;
            //print_r($_REQUEST);
            $preguntas = $consultas->getExamen($_REQUEST['id_examen']);

            $i = 1;
            $nota = 0;
            $tipo = "";
            while ($i <= COUNT($preguntas)) {
                $respuesta_correctas = $consultas->getRespuestasCorrectas($_REQUEST['id_examen'], $i);
                if ($_REQUEST['pregunta' . $i] == $respuesta_correctas) {
                    $nota++;
                    $tipo = "S";
                } else {
                    $tipo = "N";
                }
                $consultas->save_respuestas_examen($_REQUEST, $i, $tipo);
                $i++;
            }
            $calificacion = $nota / COUNT($preguntas);
            $nota_virgen = $calificacion * 10;
            $notex = substr($nota_virgen, 0, 4);

            $consultas->save_calificacion_examen($_REQUEST, $notex);
            $mensaje = "Su calificacion fue un " . $notex;
            $formulario = 'forms/form_mensaje.php';
            break;
        case "guardar_examen":
            /***************includes******************/

            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //$i=1;
            $correto = "";
            //print_r($_REQUEST);
            $id_examen = $consultas->save_examen($_REQUEST);
            $i = 1;
            while ($i <= $_REQUEST['cantidad_preguntas']) {
                $v = 1;
                $consultas->save_examen_preguntas($id_examen, $i, $_REQUEST['pregunta' . $i]);
                $correto = "";
                while ($v < $_REQUEST['cant_respuestas_preg_' . $i]) {
                    if ($_REQUEST['respuesta_pregunta_' . $i] == $v) {
                        $correto = "S";
                    } else {
                        $correto = "N";
                    }
                    $consultas->save_examen_respuestas($id_examen, $i, $v, $_REQUEST['respuesta' . $i . '_num' . $v], $correto);
                    $v++;
                }
                $i++;
            }

            $mensaje = "El examen se grabo correctamente";
            $formulario = 'forms/form_mensaje.php';
            //exit;
            break;
        case "panel_control":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $formulario = 'forms/form_panel_control.php';
            break;
        case "ver_calificaciones":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $formulario = 'forms/form_reporte_calificaciones.php';
            break;
        case "cargar_equipo":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*******************************/
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            $result_lugares = $consultas->getLugares();
            $result_sectores = $consultas->getSectores();
            $result_proveedores = $consultas->getProveedores();
            /*******************************/
            $formulario = 'forms/form_carga_equipo.php';
            break;
        case "lista_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            $result_lugares = $consultas->getLugares();
            $result = $consultas->getEquiposFiltros($_REQUEST);
            $formulario = 'forms/form_lista_equipos.php';
            break;
        case "guardar_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
//            print_r($_REQUEST);
//            exit;
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            //print_r($_FILES);
            $count=0;
            if ($_REQUEST['id_equipo'] == '') {
                $count = $consultas->chequear_existencia_equipo($_REQUEST);
            }
            if ($count == 0) {
                $id_equipo = $consultas->save_datos_equipo($_REQUEST, $_FILES["file_doc"]["name"], $_FILES["ficha_doc"]["name"]);
                /************manual de equioi************/
                if (isset($_FILES["file_doc"])) {
                    if ($_FILES["file_doc"]["error"] > 0) {
                        echo $_FILES["file_doc"]["error"] . "";
                    } else {
                        $nombre_archivo_doc = $_FILES['file_doc']['name'];
                        if (move_uploaded_file($_FILES['file_doc']['tmp_name'], "manuales/" . $nombre_archivo_doc)) {
                            // echo "El archivo ha sido cargado correctamente.";
                        } else {
                            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        }

                    }
                }
                /************ficha de equioi************/
                if (isset($_FILES["ficha_doc"])) {
                    if ($_FILES["ficha_doc"]["error"] > 0) {
                        echo $_FILES["ficha_doc"]["error"] . "";
                    } else {
                        $nombre_archivo = $_FILES['ficha_doc']['name'];
                        if (move_uploaded_file($_FILES['ficha_doc']['tmp_name'], "fichas/" . $nombre_archivo)) {
                            // echo "El archivo ha sido cargado correctamente.";
                        } else {
                            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        }

                    }
                }
                $mensaje = "El equipo se guardo correctamente ";
                $formulario = 'forms/form_mensaje.php';
                $url='controlador.php?action=lista_equipo&marca_filtro='.$_REQUEST['marca_filtro'].'&sector_filtro='.$_REQUEST['sector_filtro'].'&sector_filtroID='.$_REQUEST['sector_filtroID'].'&lugar_filtro='.$_REQUEST['lugar_filtro'].'&lugar_filtro_texto='.$_REQUEST['lugar_filtro_texto'].'&tipo_equipo_filtro='.$_REQUEST['tipo_equipo_filtro'].'&num_serie='.$_REQUEST['num_serie'];
            }else{
                $mensaje = "Cuidado! El equipo que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
                $url='controlador.php?action=cargar_equipo';
            }
//            $result = $consultas->getEquipos();
//            $formulario = 'forms/form_lista_equipos.php';
            break;
        case "edita_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*******************************/
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            //$result_lugares = $consultas->getLugares();
            $result_proveedores = $consultas->getProveedores();
            $result_marcas = $consultas->getMarca();
            $result_lugares = $consultas->getLugares();
            $result_sectores = $consultas->getSectores();
            /*******************************/
            $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);
            //$cartel='<div id="verde" style="display: block;" class="alert alert-success"><i class="icon-ok"> </i>Los datos se guardaron correctamente</div>';
            $formulario = 'forms/form_carga_equipo.php';
            break;
        case "eliminar_ficha_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            /*******************************/
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            $result_lugares = $consultas->getLugares();
            $result_sectores = $consultas->getSectores();
            $result_proveedores = $consultas->getProveedores();
            $result_marcas = $consultas->getMarca();
            /*******************************/
            unlink("fichas/" . $_REQUEST['ficha_tecnica']);
            $sql = "UPDATE equipos SET ficha_tecnica='' WHERE id_equipo='" . $_REQUEST['id_equipo'] . "'";
            mysql_query($sql);
            //$result = $consultas->getPoeById($_REQUEST['id_poe']);
            $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);
            //$cartel='<div id="verde" style="display: block;" class="alert alert-success"><i class="icon-ok"> </i>Los datos se guardaron correctamente</div>';
            $formulario = 'forms/form_carga_equipo.php';
            break;
        case "eliminar_manual_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*******************************/
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();

            $result_proveedores = $consultas->getProveedores();
            $result_marcas = $consultas->getMarca();
            $result_lugares = $consultas->getLugares();
            $result_sectores = $consultas->getSectores();
            /*******************************/
            /*********************/
            unlink("manuales/" . $_REQUEST['manual_nombre']);
            $sql = "UPDATE equipos SET manual_nombre='' WHERE id_equipo='" . $_REQUEST['id_equipo'] . "'";
            mysql_query($sql);
            //$result = $consultas->getPoeById($_REQUEST['id_poe']);
            $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);
            //$cartel='<div id="verde" style="display: block;" class="alert alert-success"><i class="icon-ok"> </i>Los datos se guardaron correctamente</div>';
            $formulario = 'forms/form_carga_equipo.php';
            break;
        case "asigna_aplicativos":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_asigna_aplicaciones.php';
            break;
        case "asigna_aplicativos_menu":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_aplicativo_menu.php';
            break;
        case "guardar_aplicativo_persona":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->save_aplicativo_persona($_REQUEST);

            $_REQUEST['persona'] = $consultas->getPersonaNombre($_REQUEST['personaID']);

            $formulario = 'forms/form_asigna_aplicaciones.php';
            break;
        case "guardar_aplicativo_menu":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->save_aplicativo_menu($_REQUEST);

            $_REQUEST['menu'] = $consultas->getMenuByID($_REQUEST['id_menu']);

            $formulario = 'forms/form_aplicativo_menu.php';
            break;
        case "eliminar_aplicativos_menu":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            //include ('menu.php');
            /*********************/
            $sql = "DELETE FROM menu_aplicativo WHERE id_relacion='" . $_REQUEST['id_registro'] . "'";
            $conn->execute($sql);
            include('menu.php');
            $formulario = 'forms/form_aplicativo_menu.php';
            break;
        case "eliminar_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            //include ('menu.php');
            /*********************/
            $sql = "DELETE FROM equipos WHERE id_equipo='" . $_REQUEST['id_equipo'] . "'";
            $conn->execute($sql);
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            $result_lugares = $consultas->getLugares();
            $result = $consultas->getEquipos();
            $mensaje = "El equipo se elimmino correctamente";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=lista_equipo&marca_filtro='.$_REQUEST['marca_filtro'].'&sector_filtro='.$_REQUEST['sector_filtro'].'&sector_filtroID='.$_REQUEST['sector_filtroID'].'&lugar_filtro='.$_REQUEST['lugar_filtro'].'&lugar_filtro_texto='.$_REQUEST['lugar_filtro_texto'].'&tipo_equipo_filtro='.$_REQUEST['tipo_equipo_filtro'].'&num_serie='.$_REQUEST['num_serie'];
            //$formulario = 'forms/form_lista_equipos.php';
            break;
        case "eliminar_aplicativos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $sql = "DELETE FROM usuario_aplicativos WHERE id_registro='" . $_REQUEST['id_registro'] . "'";
            $conn->execute($sql);
            $formulario = 'forms/form_asigna_aplicaciones.php';
            break;
        /************************abm marcas******************************/
        case "listar_marcas":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_marcas = $consultas->getmarcas();
            /*********************/
            $formulario = 'forms/form_lista_marcas.php';
            break;
        case "eliminar_marca":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************/
            $sql = "DELETE FROM marcas WHERE id_marca='" . $_REQUEST['marcaID'] . "'";
            $conn->execute($sql);
            /***************fin includes******************/
            $result_marcas = $consultas->getmarcas();
            /*********************/
            $formulario = 'forms/form_lista_marcas.php';
            /***************/
            break;
        case "guardar_marca":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            if ($_REQUEST['id_marca'] == '') {
                $count = $consultas->chequear_existencia_marcas($_REQUEST['descripcion'], 'marcas');
            }
            if ($count == 0) {
                $result = $consultas->save_marca($_REQUEST);
                $result_marcas = $consultas->getmarcas();
                /*********************/
                $formulario = 'forms/form_lista_marcas.php';
            } else {
                $mensaje = "Cuidado! La Marca que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
            }
            //exit;
            break;
        case "edita_marca":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getMarcaById($_REQUEST['marcaID']);
            $formulario = 'forms/form_marca.php';
            break;

        case "carga_marca":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            //print_r($_SESSION);

            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_marca.php';
            break;
        /******************************************************************/
        /************************abm lugar******************************/
        case "lista_lugares":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_lugars = $consultas->getlugares();
            /*********************/
            $formulario = 'forms/form_lista_lugares.php';
            break;
        case "guardar_lugar":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            if ($_REQUEST['id_lugar'] == '') {
                $count = $consultas->chequear_existencia($_REQUEST['descripcion'], 'lugar');
            }
            if ($count == 0) {
                $result = $consultas->save_lugar($_REQUEST);
                //$result_user = $consultas->getPersonas();
                $result_lugars = $consultas->getlugares();
                /*********************/
                $formulario = 'forms/form_lista_lugares.php';
            } else {
                $mensaje = "Cuidado! La ubicacion que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
            }


            //exit;
            break;
        case "edita_lugar":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $sector=$consultas->getSectores();
            $result = $consultas->getLugarByID($_REQUEST['lugarID']);
            $formulario = 'forms/form_lugar.php';
            break;
        case "carga_lugar":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $sector=$consultas->getSectores();
            $formulario = 'forms/form_lugar.php';
            break;
        case "eliminar_lugar":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM lugar WHERE id_lugar='" . $_REQUEST['lugarID'] . "'";
            $conn->execute($sql);
            include('header.php');
            include('menu.php');
            $result_lugars = $consultas->getlugares();
            /*********************/
            $formulario = 'forms/form_lista_lugares.php';
            /***************/
            break;
        /******************************************************************/
        /************************abm proveedores******************************/
        case "lista_proveedores":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_proveedors = $consultas->getProveedores();
            /*********************/
            $formulario = 'forms/form_lista_proveedores.php';
            break;
        case "guardar_proveedor":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            if ($_REQUEST['id_proveedor'] == '') {
                $count = $consultas->chequear_existencia($_REQUEST['descripcion'], 'proveedor');
            }
            if ($count == 0) {
                $result = $consultas->save_proveedor($_REQUEST);
                /**************************/
                $sql = "UPDATE equipos SET direccion='".$_REQUEST['direccion']."', telefono='".$_REQUEST['telefonos']."', contacto='".$_REQUEST['contacto']."', mail='".$_REQUEST['mail']."' WHERE representante='" . $result . "'";
                mysql_query($sql);
                /*****************************/
                $result_proveedors = $consultas->getProveedores();
                /*********************/
                $formulario = 'forms/form_lista_proveedores.php';
            } else {
                $mensaje = "Cuidado!El Proveedor que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
            }
            //exit;
            break;
        case "edita_proveedor":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getProveedorByID($_REQUEST['proveedorID']);
            $formulario = 'forms/form_proveedor.php';
            break;
        case "carga_proveedor":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_proveedor.php';
            break;
        case "eliminar_proveedor":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM proveedor WHERE id_proveedor='" . $_REQUEST['proveedorID'] . "'";
            $conn->execute($sql);
            include('header.php');
            include('menu.php');
            $result_proveedors = $consultas->getProveedores();
            /*********************/
            $formulario = 'forms/form_lista_proveedores.php';
            /***************/
            break;
        /******************************************************************/
        case "carga_item_mantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $condicion = $consultas->getCondicion();

            $formulario = 'forms/form_item_tipo_equipo.php';
            break;
        case "guardar_item":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
//                verifica existencia de item
            $verificacion = $consultas->getVerificaExistencia($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);
            if (!$verificacion) {
                //$Ressultado = $consultas->save_item_observaciones($_REQUEST);
            }
            $Ressultado = $consultas->save_item_mantenimiento($_REQUEST);
            echo "Grabo todo correctamente";
            /***************/
            break;
        case "eliminar_item":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM mantenimiento_item_tipo_equipo WHERE id_registro='" . $_REQUEST['item'] . "'";
            $conn->execute($sql);

            /***************/
            break;
        /************************abm tipo equipo******************************/
        case "lista_tipo_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_te = $consultas->getTipoEquipo();
            /*********************/
            $formulario = 'forms/form_lista_tipo_equipos.php';
            break;
        case "guardar_tipo_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');

            $result = $consultas->save_tipo_equipo($_REQUEST);
            include('header.php');
            include('menu.php');
            $result_te = $consultas->getTipoEquipo();
            /*********************/
            $formulario = 'forms/form_lista_tipo_equipos.php';
            //exit;
            break;
        case "eliminar_tipo_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM tipo_equipo WHERE id_tipo_equipo='" . $_REQUEST['tipoequipoID'] . "'";
            $conn->execute($sql);
            include('header.php');
            include('menu.php');
            $result_te = $consultas->getTipoEquipo();
            /*********************/
            $formulario = 'forms/form_lista_tipo_equipos.php';
            /***************/
            break;
        case "edita_tipo_equipo":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getTipoEquipoByID($_REQUEST['tipoequipoID']);
            $formulario = 'forms/form_tipo_equipo.php';
            break;
        case "carga_tipo_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_tipo_equipo.php';
            break;
        /*****************************carga mantenimeinto*************************************/
        case "busca_equipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getmarcas();
            $result_lugares = $consultas->getLugares();
            $result = $consultas->getEquipoByUsuario($_REQUEST);
            $formulario = 'forms/form_busqueda_equipo.php';
            break;
        case "cargar_mantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);

            $formulario = 'forms/form_carga_mantenimiento.php';
            break;
        case "guardar_mantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //print_r($_REQUEST);

            $items = $consultas->getItems($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);
            $id_cabecera = $consultas->save_mantenimiento_cabecera($_REQUEST);
            foreach ($items as $i) {
                if ($_REQUEST['item_' . $i->id_registro] != '') {
                    $valor = $_REQUEST['item_' . $i->id_registro];
                } else {
                    $valor = 'N';
                }
                $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $i->id_registro, $valor);
            }
            $mensaje = "Su Mantenimiento se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "buscar_equipo_historial":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getmarcas();
            $result = $consultas->getEquipos();
            $formulario = 'forms/form_busqueda_equipo_historial.php';
            break;
        case "ver_historial_mantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);

            $formulario = 'forms/form_historial_mantenimiento.php';
            break;
        /*******************************************************************/
        case "buscar_equipo_correctivo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getmarcas();
            //$result_lugares = $consultas->getLugares();
            $result = $consultas->getEquiposFiltros($_REQUEST);
            $formulario = 'forms/form_busqueda_equipo_correctivo.php';
            break;

        /*********************Sumar gran valor************************/
        case "buscador_sumar":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_buscador_personas.php';
            break;
        /*******************formulario de capacitacion************************/
        case "carga_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_capacitacion.php';
            break;
        case "guardar_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_capacitacion = $consultas->save_capacitacion($_REQUEST);

            if ($_REQUEST['id_capacitacion']) {
                $sql = "DELETE FROM capacitacion_detalle WHERE id_capacitacion='" . $_REQUEST['id_capacitacion'] . "'";
                $conn->execute($sql);
            }
            ///print_r($_REQUEST);
            foreach ($_REQUEST['integrantes'] as $aver) {
                $id_detalle_capacitacion = $consultas->save_detalle_capacitacion($id_capacitacion, $aver);
            }

            $mensaje = "Su capacitacion se ha cargado correctamente. Gracias<br>Capacitacion Numero: '" . $id_capacitacion . "'";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "listar_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $result = $consultas->getCapacitaciones();
            $formulario = 'forms/form_lista_capacitaciones.php';
            break;
        case "edita_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getCapacitacionByID($_REQUEST['id_capacitacion']);
            $formulario = 'forms/form_capacitacion.php';
            break;


        /***************************/
        /*******************formulario de capacitacion************************/
        case "carga_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_colecta.php';
            break;
        case "guardar_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            //exit;
            $id_colecta = $consultas->save_colecta($_REQUEST);

            if ($_REQUEST['id_colecta']) {
                $sql = "DELETE FROM colecta_detalle WHERE id_colecta='" . $_REQUEST['id_colecta'] . "'";
                $conn->execute($sql);
            }
            ///print_r($_REQUEST);
            foreach ($_REQUEST['integrantes'] as $aver) {
                $id_colecta_detalle = $consultas->save_detalle_colecta($id_colecta, $aver);
            }

            $mensaje = "Su colecta se ha cargado correctamente. Gracias<br>Colecta Numero: '" . $id_colecta . "'";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "listar_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $result = $consultas->getColectas();
            $formulario = 'forms/form_lista_colectas.php';
            break;
        case "edita_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getColectaByID($_REQUEST['id_colecta']);
            $formulario = 'forms/form_colecta.php';
            break;
        case "resultado_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getResultadoColectaByID($_REQUEST['id_colecta']);
            $formulario = 'forms/form_colecta_resultado.php';
            break;
        case "resultado_colecta_hemovigilancia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getResultadoColectaByID($_REQUEST['id_colecta']);
            $formulario = 'forms/form_colecta_resultado_hemovigilancia.php';
            break;
        case "guardar_resultado_colecta":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            //exit;
            $id_resultado_colecta = $consultas->save_resultado_colecta($_REQUEST);

            $mensaje = "Su resultado de colecta se ha cargado correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "guardar_resultado_hemovigilancia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            //exit;
            $id_resultado_colecta = $consultas->save_resultado_hemovigilancia($_REQUEST);

            $mensaje = "Su datos se guardaron correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            break;
        ////////////////////////////////
        case "ver_indicadores":

            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $formulario = 'forms/form_lista_indicadores.php';
            break;
        /*******************formulario de capacitacion************************/
        case "carga_examen_practico":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_examen_practico.php';
            break;
        case "guardar_examen_practico":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_examen_practica = $consultas->save_examen_practico($_REQUEST);

            $mensaje = "Su Examen Practico se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "listar_examen_practico":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $result_user = $consultas->getExamenPractico();
            $formulario = 'forms/form_lista_examen_practico.php';
            break;
        case "edita_examen_practico":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getExamenPracticoByID($_REQUEST['id_examen_practico']);
            $formulario = 'forms/form_examen_practico.php';
            break;
        case "listar_aplicativos":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result_user = $consultas->getAplicativos();
            $formulario = 'forms/form_lista_aplicativos.php';
            break;
        case "edita_aplicativo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getAplicativosByID($_REQUEST['id_aplicativo']);
            $formulario = 'forms/form_aplicativo.php';
            break;
        case "carga_aplicativos":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_aplicativo.php';
            break;
        case "guardar_aplicativo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_aplicativo = $consultas->save_aplicativo($_REQUEST);

            $mensaje = "Su aplicativo se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "carga_competencia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_competencia.php';
            break;
        /********************************************/
        case "guardar_competencia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_competencia = $consultas->save_competencia($_REQUEST);

            $mensaje = "Su competencia se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "listar_competencia":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result_user = $consultas->getCompetencia();
            $formulario = 'forms/form_lista_competencia.php';
            break;
        case "edita_competencia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getCompetenciaByID($_REQUEST['id_competencia']);
            $formulario = 'forms/form_competencia.php';
            break;
        /*******************************/
        case "carga_no_conformidades":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_no_conformidades.php';
            break;
        case "guardar_no_conformidad":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            //print_r($_FILES);exit;
            $id_competencia = $consultas->save_no_conformidad($_REQUEST, $_FILES["archivo"]["name"]);
            if (isset($_FILES["archivo"])) {

                if ($_FILES["archivo"]["error"] > 0) {
                    echo $_FILES["archivo"]["error"] . "";
                } else {
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_nc/" . $id_competencia . '-' . $_FILES["archivo"]["name"]);
                }

            }
            $mensaje = "Su hallazgo se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "listar_no_conformidad":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            include('header.php');
            include('menu.php');
            $result = $consultas->getNoConformidadByFiltro();
            /*********************/
            $formulario = 'forms/form_lista_no_conformidad.php';
            /***************/
            break;
        case "listar_ver_no_conformidad":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            include('header.php');
            include('menu.php');
            $result = $consultas->getNoConformidadByUsuario();
            /*********************/
            $formulario = 'forms/form_lista_mis_no_conf.php';
            /***************/
            break;
        case "edita_no_conformidad":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
//            $sql = "UPDATE no_conformidad SET modificado='N' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
//            mysql_query($sql);
            /*******************frespuesta**/

            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            $formulario = 'forms/form_no_conformidades.php';
            break;
        /********************************************/
        case "guardar_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            if ($_REQUEST['id_sector'] == '') {
                $count = $consultas->chequear_existencia($_REQUEST['descripcion'], 'sector');
            }
            if ($count == 0) {
                $result = $consultas->save_sector($_REQUEST);
                //$result_user = $consultas->getPersonas();
                $result_sectors = $consultas->getsectores();
                /*********************/
                $formulario = 'forms/form_lista_sectores.php';
            } else {
                $mensaje = "Cuidado! El sector que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
            }


            //exit;
            break;
        case "edita_sector":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /****************f*****/
            $servicios=$consultas->getServicios();
            $result = $consultas->getSectorByID($_REQUEST['sectorID']);
            $formulario = 'forms/form_sector.php';
            break;
        case "carga_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $servicios=$consultas->getServicios();
            $formulario = 'forms/form_sector.php';
            break;
        case "eliminar_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/

            $sql = "UPDATE sector SET estado='B' WHERE id_sector='" . $_REQUEST['sectorID'] . "'";
            mysql_query($sql);
            ?>
            <script>
                alert("El estado de su sector cambio correctamente");
            </script>
            <?php
            include('header.php');
            include('menu.php');
            $result_sectors = $consultas->getSectores();
            /*********************/
            $formulario = 'forms/form_lista_sectores.php';
            /***************/
            break;
        case "alta_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/

            $sql = "UPDATE sector SET estado='A' WHERE id_sector='" . $_REQUEST['sectorID'] . "'";
            mysql_query($sql);
            ?>
            <script>
                alert("El estado de su sector cambio correctamente");
            </script>
            <?php
            include('header.php');
            include('menu.php');
            $result_sectors = $consultas->getSectores();
            /*********************/
            $formulario = 'forms/form_lista_sectores.php';
            /***************/
            break;
        case "listar_sectores":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result_sectors = $consultas->getSectores();
            /*********************/
            $formulario = 'forms/form_lista_sectores.php';
            /***************/
            break;
        /********************************************/
        /**********carga responsables ***********/
        case "guardar_responsable_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->save_responsable_sector($_REQUEST);
            $mensaje = "Su Relacion se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;

        case "carga_responsable_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_responsable_sector.php';
            break;
        case "edita_responsable_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getResponsablesbyID($_REQUEST['id_relacion']);
            $formulario = 'forms/form_responsable_sector.php';
            break;
        case "lista_responsables":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result_user = $consultas->getResponsables();
            /*********************/
            $formulario = 'forms/form_lista_responsables.php';
            break;
        case "lista_mis_no_conformidades":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getMisNoConformidades();
            /*********************/
            $formulario = 'forms/form_lista_mis_nc.php';
            break;
        case "respuesta_no_conformidades":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $sql = "UPDATE no_conformidad SET modificado='N' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
            mysql_query($sql);
            $result_r = $consultas->getRespuestaNoConformidad($_REQUEST['id_no_conformidad']);
            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            /*********************/
            $formulario = 'forms/form_respuesta_nc.php';
            break;
        case "derivar_no_conformidad":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            /*********************/
            $formulario = 'forms/form_deriva_nc.php';
            break;
        case "guardar_respuesta_nc":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            $sql = "UPDATE no_conformidad SET modificado='S' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
            mysql_query($sql);
            include('menu.php');
            $sql = "UPDATE no_conformidad SET estado='R' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
            mysql_query($sql);

            $result = $consultas->save_respuesta_nc($_REQUEST);
            $mensaje = "Su respuesta  se ha cargado correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "guardar_deriva_nc":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $sql = "UPDATE no_conformidad SET sector_derivado='" . $_REQUEST['sector_derivadoID'] . "',  nivel_riesgo='" . $_REQUEST['nivel_riesgo'] . "',  estado='As', fecha_derivado=NOW() WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";

            mysql_query($sql);

            $mensaje = "Su hallazgo fue derivada correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "terminar_no_conformidad":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            /*********************/
            $formulario = 'forms/form_terminar_nc.php';
            break;
        case "implementacion_nc":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            /*********************/
            $formulario = 'forms/form_implementacion_nc.php';
            break;
        case "eficacia_nc":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getNoConformidadById($_REQUEST['id_no_conformidad']);
            /*********************/
            $formulario = 'forms/form_eficacia_nc.php';
            break;
        case "guardar_terminar_nc":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $sql = "UPDATE no_conformidad SET estado='" . $_REQUEST['accion'] . "', observaciones='" . $_REQUEST['observaciones'] . "' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";

            mysql_query($sql);

            $mensaje = "Su hallazgo fue Terminada correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            break;
        case "guardar_implementacion_nc":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //if ($_REQUEST['accion']==) {
            $sql = "UPDATE no_conformidad SET estado='".$_REQUEST['accion']."', observacion_implementacion='" . $_REQUEST['observaciones'] . "' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
            mysql_query($sql);
            $mensaje="Su hallazgo fue verificado correctamente. Gracias";
            $formulario='forms/form_mensaje.php';
            break;
        case "guardar_eficacia_nc":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //if ($_REQUEST['accion']==) {
            $sql = "UPDATE no_conformidad SET estado='".$_REQUEST['accion']."', observacion_eficacia='" . $_REQUEST['observaciones'] . "' WHERE id_no_conformidad='" . $_REQUEST['id_no_conformidad'] . "'";
            mysql_query($sql);
            $mensaje="Su hallazgo fue guardado correctamente. Gracias";
            $formulario='forms/form_mensaje.php';
            break;
        /***********guardar_implementacion_nc*********************************/
        case "guardar_menu":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include ('header.php');
            include ('menu.php');
            if($_REQUEST['id_menu']==''){
                $count = $consultas->chequear_existencia($_REQUEST['descripcion'], 'menu');
            }
            if($count==0){
                $result = $consultas->save_menu($_REQUEST);
                //$result_user = $consultas->getPersonas();
                $result_menus = $consultas->getmenues();
                /*********************/
                $formulario='forms/form_lista_menu.php';
            }else{
                $mensaje="Cuidado! El menu que quiere guardar ya existe ";
                $formulario='forms/form_mensaje.php';
            }


            //exit;
            break;
        case "edita_menu":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include ('header.php');
            include ('menu.php');
            /*********************/
            $result = $consultas->getMenuByID($_REQUEST['menuID']);
            $formulario='forms/form_menu.php';
            break;
        case "carga_menu":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include ('header.php');
            include ('menu.php');
            $formulario='forms/form_menu.php';
            break;
        case "eliminar_menu":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM menu WHERE id_menu='".$_REQUEST['menuID']."'";
            $conn->execute($sql);
            include ('header.php');
            include ('menu.php');
            $result_lugars = $consultas->getMenues();
            /*********************/
            $formulario='forms/form_lista_menu.php';
            /***************/
            break;
        case "listar_menues":
        include('lib/DB_Conectar.php');
        include('classes/consultas.php');
        include ('header.php');
        include ('menu.php');
        $result_menus = $consultas->getmenues();
        /*********************/
        $formulario='forms/form_lista_menu.php';
        /***************/
        break;
        /********************************************/
        case "carga_reactivos":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include ('header.php');
            include ('menu.php');
            $determinaciones = $consultas->getDeterminaciones();
            /*********************/
            $formulario='forms/form_carga_reactivos.php';
            /***************/
            break;
        case "guardar_informe":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "DELETE FROM hemovigilancia_detalle WHERE id_informe='".$_REQUEST['id_informe']."'";
            $conn->execute($sql);
            include ('header.php');
            include ('menu.php');
            /*********************/
            $formulario='forms/form_lista_informar.php';
            /***************/
            break;
        case "importar_serologia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            include ('header.php');
            include ('menu.php');
            /*********************/
            $formulario='forms/form_importar_serologia.php';
            /***************/
            break;
        /********************************************/
        /********************************************/
        case "guardar_servicio":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            if ($_REQUEST['id_servicio'] == '') {
                $count = $consultas->chequear_existencia($_REQUEST['descripcion'], 'servicio');
            }
            if ($count == 0) {
                $result = $consultas->save_servicio($_REQUEST);
                //$result_user = $consultas->getPersonas();
                $result_servicio = $consultas->getServicios();
                /*********************/
                $formulario = 'forms/form_lista_servicios.php';
            } else {
                $mensaje = "Cuidado! El servicio que quiere guardar ya existe ";
                $formulario = 'forms/form_mensaje.php';
            }


            //exit;
            break;
        case "edita_servicio":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getServicioByID($_REQUEST['servicioID']);
            $formulario = 'forms/form_servicio.php';
            break;
        case "carga_servicio":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_servicio.php';
            break;
        case "organigrama":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_organigrama.php';
            break;
        case "eliminar_servicio":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/

            $sql = "DELETE FROM servicio WHERE id_servicio='" . $_REQUEST['servicioID'] . "'";
            $conn->execute($sql);
            ?>
            <script>
                alert("El servicio se elimino correctamente");
            </script>
            <?php
            include('header.php');
            include('menu.php');
            $result_servicio = $consultas->getServicios();
            /*********************/
            $formulario = 'forms/form_lista_servicios.php';
            /***************/
            break;
        case "alta_servicio":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            $sql = "UPDATE servicio SET estado='A' WHERE id_servicio='" . $_REQUEST['servicioID'] . "'";
            mysqli_query($sql);
            ?>
            <script>
                alert("El estado de su servicio cambio correctamente");
            </script>
            <?php
            include('header.php');
            include('menu.php');
            $result_servicio = $consultas->getServicios();
            /*********************/
            $formulario = 'forms/form_lista_servicios.php';
            /***************/
            break;
        case "listar_servicios":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result_servicio = $consultas->getServicios();
            /*********************/
            $formulario = 'forms/form_lista_servicios.php';
            /***************/
            break;
        case "listar_poes_sin_examen":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result_poes_sinexamen = $consultas->getPoesSinExamen();
            /*********************/
            $formulario = 'forms/form_lista_poes_sin_examen.php';
            /***************/
            break;
        case "guardarRelacionPersonaEquipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            $result = $consultas->SaveRelacionEquipoPersonas($_REQUEST);
            /***************/
        break;
        case "eliminarRelacionPersonaEquipo":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            $sql = "DELETE FROM equipo_encargados WHERE id_relacion='".$_REQUEST['relacion']."'";
            $conn->execute($sql);
            /***************/
        break;
        case "listar_usuarios":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result_usuarios = $consultas->getUsuarios();
            /*********************/
            $formulario = 'forms/form_lista_usuarios.php';
            /***************/
        break;
        case "listar_guardia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->getGuardias();
            /*********************/
            $formulario = 'forms/form_lista_guardias.php';
            /***************/
            break;
        case "carga_guardia":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $formulario = 'forms/form_carga_guardia.php';
            break;
        case "edita_guardia":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getGuardiasByID($_REQUEST['id_guardia']);
            $formulario = 'forms/form_carga_guardia.php';
            break;
        case "edita_lugar_guardia":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getLugarGuardiaByID($_REQUEST['id_lugar_guardia']);
            $formulario = 'forms/form_lugar_guardia.php';
            break;
        case "guardar_guardia":
            include('lib/DB_Conectar.php');
            //include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');

            $result = $consultas->save_guardias($_REQUEST);
            //$result_hemo = $consultas->save_persona_hemotrans($_REQUEST);
            include('header.php');
            include('menu.php');

            $result= $consultas->getGuardias();
            /*********************/
            $formulario = 'forms/form_lista_guardias.php';
            //exit;
            break;
        case "listar_lugar_guardias":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result_lugar_guardia = $consultas->getLugarGuardia();
            /*********************/
            $formulario = 'forms/form_lista_lugar_guardia.php';
            /***************/
            break;
        case "guardar_lugar_guardia":
            include('lib/DB_Conectar.php');
            //include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');

            $result = $consultas->save_lugar_guardia($_REQUEST);
            //$result_hemo = $consultas->save_persona_hemotrans($_REQUEST);
            include('header.php');
            include('menu.php');

            $result_lugar_guardia = $consultas->getLugarGuardia();
            /*********************/
            $formulario = 'forms/form_lista_lugar_guardia.php';
            //exit;
            break;
        case "carga_lugar_guardia":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $formulario = 'forms/form_lugar_guardia.php';
            break;
        case "listar_mantenimientos_por_sector":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            /***************/
            include('header.php');
            include('menu.php');
            //$result = $consultas->getNoConformidadByFiltro();
            $tipo_equipo = $consultas->getTipoEquipo();
            /*********************/
            $formulario = 'forms/form_mantenimientos_por_sector.php';
            /***************/
            break;

        case "carga_pre_capacitacion":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $formulario = 'forms/form_pre_capacitacion.php';
            break;
        case "lista_pre_capacitacion":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->getPreCapacitaciones();
            /*********************/
            $formulario = 'forms/form_lista_pre_capacitaciones.php';
            break;
        case "guardar_pre_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_pre_capacitacion = $consultas->save_pre_capacitacion($_REQUEST);

            if ($_REQUEST['id_pre_capacitacion']) {
                $sql = "DELETE FROM pre_capacitacion_detalle WHERE id_pre_capacitacion='" . $_REQUEST['id_pre_capacitacion'] . "'";
                $conn->execute($sql);
            }
            ///print_r($_REQUEST);
            foreach ($_REQUEST['integrantes'] as $aver) {
                //echo "interante ".$aver;
                $id_detalle_capacitacion = $consultas->save_pre_detalle_capacitacion($id_pre_capacitacion, $aver);
            }

            $mensaje = "Su Aviso de capacitacion se ha cargado correctamente. Gracias<br>Aviso Capacitacion Numero: '" . $id_pre_capacitacion . "'";
            $url='controlador.php?action=lista_pre_capacitacion';
            $formulario = 'forms/form_mensaje.php';
            break;
        case "edita_pre_capacitacion":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');

            $result = $consultas->getPreCapacitacionByID($_REQUEST['id_pre_capacitacion']);
            $formulario = 'forms/form_pre_capacitacion.php';
            break;
        case "asigna_proceso_persona":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $formulario = 'forms/form_asigna_proceso.php';
            break;
        case "guardar_proceso_persona":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->save_proceso_persona($_REQUEST);
            //$result = $consultas->save_proceso_persona($_REQUEST);

            $_REQUEST['persona'] = $consultas->getPersonaNombre($_REQUEST['personaID']);

            $formulario = 'forms/form_asigna_proceso.php';
            break;
        case "eliminar_proceso_persona":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $sql = "DELETE FROM persona_area WHERE id_registro='" . $_REQUEST['id_registro'] . "'";
            $conn->execute($sql);
            $_REQUEST['persona'] = $consultas->getPersonaNombre($_REQUEST['personaID']);
            $formulario = 'forms/form_asigna_proceso.php';
            break;
        case "listado_solicitudes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudesManteniemientos();
            /*********************/
            $formulario = 'forms/form_lista_solicitudes.php';
            break;
        case "derivar_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            /*********************/
            $formulario = 'forms/form_deriva_solicitud.php';
            break;
        case "editar_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            $formulario = 'forms/form_solicitud.php';
            break;
        case "solicitud_mantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $cont_sol = $consultas->getCountSolicitudByIDEquipo($_REQUEST['id_equipo']);
            if($cont_sol==0) {
                $historial_equipo = $consultas->getSolicitudByIDEquipo($_REQUEST['id_equipo']);
                $result = $consultas->getEquipoByID($_REQUEST['id_equipo']);
                $formulario = 'forms/form_solicitud.php';
            }else{
                $mensaje = "El equipo seleccionado ya contiene en el sistema informatico una solicitud de mantenimiento correctivo. <br> 
                El mismo se encuentra fuera de funcionamiento, de NO ser asi comuniquese con el area de calidad a la brevedad. Gracias  ";
                $url='controlador.php?action=listado_solicitudes';
                $formulario = 'forms/form_mensaje.php';
            }
            break;
        case "mis_solicitudes":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $result = $consultas->getSolicitudesByUsuario();
            //$result_lugares = $consultas->getLugares();
            $formulario = 'forms/form_mis_solicitudes.php';
            break;
        case "guardar_solicitud":
        include('lib/DB_Conectar.php');
        include('classes/consultas.php');
        include('header.php');
        include('menu.php');
        /************************************************/
        $cont_sol = $consultas->getCountSolicitudByIDEquipo($_REQUEST['id_equipo']);
        if($cont_sol==0) {
            $id_solicitud = $consultas->save_solicitud_mantenimiento($_REQUEST, $_FILES["archivo"]["name"]);
            $carpeta = 'archivos_solicitudes/'.$id_solicitud;
            //echo $carpeta;
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            if (isset($_FILES["archivo"])) {

                if ($_FILES["archivo"]["error"] > 0) {
                    echo $_FILES["archivo"]["error"] . "";
                } else {
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_solicitudes/" . $id_solicitud . '_' . $_FILES["archivo"]["name"]);
                }

            }
            $mensaje = "Su Solicitud se ha cargado correctamente. Gracias<br>Solicitud Numero: '" . $id_solicitud . "'";
            $formulario = 'forms/form_mensaje.php';
        }else{
            $mensaje = "El equipo seleccionado ya contiene en el sistema informatico una solicitud de mantenimiento correctivo. <br> 
                El mismo se encuentra fuera de funcionamiento, de NO ser asi comuniquese con el area de calidad a la brevedad. Gracias  ";
            $url='controlador.php?action=listado_solicitudes';
            $formulario = 'forms/form_mensaje.php';
        }
        break;
        case "guardar_edicion_solicitud":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            
                $id_solicitud = $consultas->save_solicitud_mantenimiento($_REQUEST, $_FILES["archivo"]["name"]);
                $carpeta = 'archivos_solicitudes/'.$id_solicitud;
                //echo $carpeta;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                if (isset($_FILES["archivo"])) {

                    if ($_FILES["archivo"]["error"] > 0) {
                        echo $_FILES["archivo"]["error"] . "";
                    } else {
                        move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_solicitudes/" . $id_solicitud . '_' . $_FILES["archivo"]["name"]);
                    }

                }
                $mensaje = "Su Solicitud se ha editado correctamente. Gracias<br>Solicitud Numero: '" . $id_solicitud . "'";
                $formulario = 'forms/form_mensaje.php';
            
            break;
        case "guardar_deriva_solicitud":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            $id_nota_solicitud = $consultas->save_nota_solicitud($_REQUEST, $_FILES["archivo"]["name"],'Tratado');
            
            $sql = "UPDATE solicitud_mantenimiento SET proveedor_derivado='".$_REQUEST['proveedor_derivadoID']."', estado_solicitud='TRAT', fecha_derivado=NOW(), obs_derivado='".$_REQUEST['observacion']."' WHERE id_solicitud='" . $_REQUEST['id_solicitud'] . "'";
            //echo $sql;
            mysql_query($sql);

            $mensaje = "Su solicitud fue derivada correctamente. Gracias";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=listado_solicitudes';
            break;
        case "nota_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            /*********************/
            $formulario = 'forms/form_nota_solicitud.php';
            break;
        case "cierra_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            /*********************/
            $formulario = 'forms/form_cierra_solicitud.php';
            break;
        case "guardar_nota_solicitud":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_nota_solicitud = $consultas->save_nota_solicitud($_REQUEST, $_FILES["archivo"]["name"],'Tratado');
            $carpeta = 'archivos_solicitudes/'.$_REQUEST['id_solicitud'];
            //echo $carpeta;
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            if (isset($_FILES["archivo"])) {

                if ($_FILES["archivo"]["error"] > 0) {
                    echo $_FILES["archivo"]["error"] . "";
                } else {
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_solicitudes/".$_REQUEST['id_solicitud']."/" . $id_nota_solicitud . '_' . $_FILES["archivo"]["name"]);
                }

            }

            $mensaje = "Su Nota se ha agregado a la solicitud del mantenimiento correctivo correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=listado_solicitudes';
            break;
        case "guardar_cierra_solicitud":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_nota_solicitud = $consultas->save_nota_solicitud($_REQUEST, $_FILES["archivo"]["name"],'Cerrado');
            $carpeta = 'archivos_solicitudes/'.$_REQUEST['id_solicitud'];
            //echo $carpeta;
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            if (isset($_FILES["archivo"])) {

                if ($_FILES["archivo"]["error"] > 0) {
                    echo $_FILES["archivo"]["error"] . "";
                } else {
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_solicitudes/".$_REQUEST['id_solicitud']."/" . $id_nota_solicitud . '_' . $_FILES["archivo"]["name"]);
                }

            }
            $sql = "UPDATE solicitud_mantenimiento SET  estado_solicitud='CERR', fecha_cerrado=NOW(), obs_cerrado='".$_REQUEST['observaciones']."' WHERE id_solicitud='" . $_REQUEST['id_solicitud'] . "'";
            //echo $sql;
            mysql_query($sql);
            $mensaje = "Su solicitud de mantenimiento se ha cerrado correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=listado_solicitudes';
            break;
        case "listado_mis_solicitudes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudesByUsuario();
            /*********************/
            $formulario = 'forms/form_lista_mis_solicitudes.php';
            break;
        case "validar_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            /*********************/
            $formulario = 'forms/form_validar_solicitud.php';
            break;
        case "valida_sol":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $id_nota_solicitud = $consultas->save_nota_solicitud($_REQUEST, $_FILES["archivo"]["name"],'Validado');
            $sql = "UPDATE solicitud_mantenimiento SET  estado_solicitud='VAL', fecha_validado=NOW(), obs_validado='".$_REQUEST['observacion']."' WHERE id_solicitud='" . $_REQUEST['id_solicitud'] . "'";

            //echo $sql;
            mysql_query($sql);
            $mensaje = "Su solicitud de mantenimiento se ha validado correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=listado_mis_solicitudes';
        break;
        case "no_valida_sol":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /************************************************/
            $sql = "UPDATE solicitud_mantenimiento SET estado_solicitud='TRAT',  obs_validado='Ver Motivo en Notas' WHERE id_solicitud='" . $_REQUEST['id_solicitud'] . "'";
            mysql_query($sql);
            $id_nota_solicitud = $consultas->save_nota_solicitud($_REQUEST, $_FILES["archivo"]["name"],'Cerrado');
            $mensaje = "Su solicitud de mantenimiento NO se ha validado correctamente. Gracias<br>";
            $formulario = 'forms/form_mensaje.php';
            $url='controlador.php?action=listado_mis_solicitudes';
            break;
        case "eliminar_archivo_solicitud":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/

            unlink("archivos_solicitudes/".$_REQUEST['id_solicitud']."_".$_REQUEST['nombre_solicitud']);
            // $result = $consultas->getPoeById($_REQUEST['id_poe']);
            $sql = "UPDATE solicitud_mantenimiento SET archivo='' WHERE id_solicitud='".$_REQUEST['id_solicitud']."'";
            mysql_query($sql);

            $result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            $formulario = 'forms/form_solicitud.php';
            break;
        case "realizar_mantenimiento":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/

            //$result = $consultas->getSolicitudByID($_REQUEST['id_solicitud']);
            $formulario = 'forms/form_solicitud.php';
            break;
        case "guardarMantenimiento":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
           
            $id_cabecera = $consultas->save_mantenimiento_cabecera($_REQUEST);
            $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $_REQUEST['item'], $_REQUEST['obs']);
            
//            $mensaje = "Su Mantenimiento se ha cargado correctamente. Gracias";
//            //$formulario = 'forms/form_mensaje.php';
//            echo $mensaje;
            break;
        case "importar_horarios":
        include('lib/DB_Conectar.php');
        include('classes/consultas.php');
        include('header.php');
        include('menu.php');
        //echo "bueno hatsa llego";
        $formulario = 'forms/form_importar_xls.php';
        break;

        case "lista_horarios":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_lista_horarios.php';
            break;
        case "guardarHorarioPersona":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            if($_REQUEST['altaHoraEnt']!='00' || $_REQUEST['altaMinEnt']!='00' ){
                $hora1=$_REQUEST['altaHoraEnt'].":".$_REQUEST['altaMinEnt'];
                $consultas->save_horario_persona_unico($_REQUEST['id_reloj'],$_REQUEST['fecha'],$hora1);

            }
            if($_REQUEST['altaHoraSal']!='00' || $_REQUEST['altaHoraSal']!='00' ){
                $hora1=$_REQUEST['altaHoraSal'].":".$_REQUEST['altaMinSal'];
                $consultas->save_horario_persona_unico($_REQUEST['id_reloj'],$_REQUEST['fecha'],$hora1);

            }
            break;
        case "reporte_estadistico":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_reporte_estadistico.php';
            break;
        case "reporte_competencia":
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            //echo "bueno hatsa llego";
            $formulario = 'forms/form_reporte_competencia.php';
            break;
        case "listado_solicitudes":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $result = $consultas->getEquiposMantenimiento();
            /*********************/
            $formulario = 'forms/form_reporte_mantenimiento.php';
            break;
        /********************************************/
        case "listado_mantenimiento_realizados":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $tipo_equipo = $consultas->getTipoEquipo();
            $result_marcas = $consultas->getMarcas();
            $result_lugares = $consultas->getLugares();
            $result = $consultas->getEquiposFiltrosReporte($_REQUEST);
            /*********************/
            $formulario = 'forms/form_reporte_mantenimiento.php';
            break;
        case "listado_calendario_mantenimiento":
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /***************fin includes******************/
            $tipo_equipo = $consultas->getTipoEquipo();
//            $result_marcas = $consultas->getMarcas();
//            $result_lugares = $consultas->getLugares();
            $result = $consultas->getMantenimientosProgramadosPorMes(3);
            $result_fut= $consultas->getMantenimientosProgramadosUltPorMes(3);
            /*********************/
            $formulario = 'forms/form_calendario_mantenimiento.php';
            break;
        case "cargar_solcitud_compra":
            $estado_azul = "none";
            $estado_amarillo = "none";
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $formulario = 'forms/form_solicitud_compra.php';
            break;
         case "listar_solcitud_compra":
            
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getSolicitudCompra();
            $formulario = 'forms/form_lista_solicitud_compra.php';
            break;   
        case "guardar_solicitud_compra":
            include('lib/DB_Conectar.php');
            //include('lib/DB_Conectar_Pg.php');
            include('classes/consultas.php');

            $result = $consultas->save_solicitud_compra($_REQUEST);
            //$result_hemo = $consultas->save_persona_hemotrans($_REQUEST);
            include('header.php');
            include('menu.php');

            //$result_user = $consultas->getPersonas();
            $result = $consultas->getSolicitudCompra();
            /*********************/
            $formulario = 'forms/form_lista_solicitud_compra.php';
            //exit;
            break;
        case "listar_mis_solicitudes_compras":
            
            /***************includes******************/
            include('lib/DB_Conectar.php');
            include('classes/consultas.php');
            include('header.php');
            include('menu.php');
            /*********************/
            $result = $consultas->getMisSolicitudCompra();
            $formulario = 'forms/form_lista_solicitud_compra.php';
        break;      
        /*********carga de poes*********/    
    }

   
if($formulario){    
    include($formulario);
}    

?>   
    