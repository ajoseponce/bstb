<?php
class Consultas
{
	function __construct($db,$dbPg){
		$this->db = $db;
        $this->dbPg = $dbPg;
	}
        function getInformeMensual($periodo){
		$query = "SELECT ce.*, pa.*,a.*, ci.*, cia.*, cid.*, ph.*, phe.*, "
                        . "ah.rojos_leucoreducidos rojos_leucoreducidos2, "
                        . "ah.rojos_irradiados rojos_irradiados2, "
                        . "ah.plaquetas_irradiados plaquetas_irradiados2, "
                        . "ah.plaquetas_leucoreducidas plaquetas_leucoreducidas2, "
                        . "ah.plaquetas_aferesis_leucoreducidas plaquetas_aferesis_leucoreducidas2, "
                        . "ah.plaquetas_aferesis_irradiados plaquetas_aferesis_irradiados2, "
                        . "ah.rojos_fraccionados_pediatria rojos_fraccionados_pediatria2, "
                        . " ahd.*, pc.*, pai.*, mam.*  "
                        . "FROM colecta_externa ce, "
                        . "proceso_atencion pa, "
                        . "aferesis a, "
                        . "calif_bio_inmuno ci, "
                        . "calif_bio_inmuno_analiticas cia, "
                        . "calif_bio_inmuno_donantes cid, "
                        . "produccion_hemocomponentes ph, "
                        . "produccion_hemocomponentes_especiales phe, "
                        . "almacenamiento_hemocomponentes ah, "
                        . "almacenamiento_hemoderivados ahd, "
                        . "proceso_citaciones pc, "
                        . "proceso_apoyo_insumos pai, "
                        . "medicion_analisis_mejoras mam "
                        . "WHERE ce.periodo='".$periodo."'"
                        . " AND pa.periodo='".$periodo."' "
                        . " AND pa.periodo='".$periodo."' "
                        . " AND a.periodo='".$periodo."' "
                        . " AND ci.periodo='".$periodo."' "
                        . " AND cia.periodo='".$periodo."' "
                        . " AND cid.periodo='".$periodo."' "
                        . " AND ph.periodo='".$periodo."' "
                        . " AND phe.periodo='".$periodo."' "
                        . " AND ah.periodo='".$periodo."' "
                        . " AND ahd.periodo='".$periodo."' "
                        . " AND pc.periodo='".$periodo."' "
                        . " AND pai.periodo='".$periodo."' "
                        . " AND mam.periodo='".$periodo."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
	function getColectasExternas($periodo){

		$query = "SELECT * FROM colecta_externa ce WHERE ce.periodo='".$periodo."' AND ce.anio='".date('Y')."' ";
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getProcesoAtencion($periodo){
		$query = "SELECT * FROM proceso_atencion pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getAferesis($periodo){
		$query = "SELECT * FROM aferesis pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getApoyoInsumos($periodo){
		$query = "SELECT * FROM proceso_apoyo_insumos pa WHERE pa.periodo='".$periodo."'";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getCalifBioInmuno($periodo){
		$query = "SELECT * FROM calif_bio_inmuno pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getCalifBioInmunoAnaliticos($periodo){
		$query = "SELECT * FROM calif_bio_inmuno_analiticas pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getCalifBioInmunoDonantes($periodo){
		$query = "SELECT * FROM calif_bio_inmuno_donantes pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getProduccionHemocomponentes($periodo){
		$query = "SELECT * FROM produccion_hemocomponentes pa WHERE pa.periodo='".$periodo."' AND pa.anio='2015' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getProduccionHemocomponentesEspeciales($periodo){
		$query = "SELECT * FROM produccion_hemocomponentes_especiales pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getAlmacenamientoHemocomponentes($periodo){
		$query = "SELECT * FROM almacenamiento_hemocomponentes pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getAlmacenamientoHemoderivados($periodo){
		$query = "SELECT * FROM almacenamiento_hemoderivados pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getProcesoTransfusion($periodo){
		$query = "SELECT * FROM proceso_transfusion pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	    }

        function getProcesoCitacion($periodo){
		$query = "SELECT * FROM proceso_citaciones pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	    }
        function getProcesoMedicion($periodo){
		$query = "SELECT * FROM medicion_analisis_mejoras pa WHERE pa.periodo='".$periodo."' AND pa.anio='".date('Y')."' ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	    }
        function getMenu(){
            $query = "SELECT * FROM menu a "
                . " WHERE 1 ";

            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getMenuUsuario(){
		$query = "SELECT * FROM aplicativos a "
                        . " INNER JOIN usuario_aplicativos ua ON ua.id_aplicativo=a.id_aplicativo"
                        . " WHERE ua.id_aplicativo!='16' AND ua.id_usuario='".$_SESSION['id']."'";

		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	    }
        function getMenuAgrupador(){
            $query = "SELECT ma.id_menu, m.descripcion FROM aplicativos a "
                . " INNER JOIN usuario_aplicativos ua ON ua.id_aplicativo=a.id_aplicativo"
                . " INNER JOIN menu_aplicativo ma ON ma.id_aplicativo=a.id_aplicativo"
                . " INNER JOIN menu m ON m.id_menu=ma.id_menu"
                . " WHERE ua.id_aplicativo!='16' AND ua.id_usuario='".$_SESSION['id']."' Group by ma.id_menu";

            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getMenuAplicativos($id_menu){
            $query = "SELECT a.* FROM aplicativos a "
                . " INNER JOIN usuario_aplicativos ua ON ua.id_aplicativo=a.id_aplicativo"
                . " INNER JOIN menu_aplicativo ma ON ma.id_aplicativo=a.id_aplicativo"
                . " INNER JOIN menu m ON m.id_menu=ma.id_menu"
                . " WHERE ua.id_aplicativo!='16' AND ua.id_usuario='".$_SESSION['id']."' AND ma.id_menu='".$id_menu."'";

            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        //////////////////********************/////////////////7
        function save_datos($data){
            $table = new Table($this->db, 'colecta_externa');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->colectas_programadas = $data['colectas_programadas'];
            $table->colectas_realizadas = $data['colectas_realizadas'];
            $table->promedio_donante = $data['promedio_donante'];
            $table->colectas_realizadas_interior_prov = $data['colectas_realizadas_interior_prov'];
            $table->colectas_realizadas_pos_gar_can = $data['colectas_realizadas_pos_gar_can'];
            $table->combustible = $data['combustible'];
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        //////////////////********************/////////////////7
        function save_datos_relacion($data){
            $table = new Table($this->db, 'relacion_area_poe');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }
            $table->id_area = $data['areaID'];
            $table->id_poe = $data['poeID'];
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        //////////////////********************/////////////////7
        function save_datos_poe($data){
            //session_start();
            //print_r();
            if($data['fecha_version']){
                $fecha_version=substr($data['fecha_version'], 6, 4)."-".substr($data['fecha_version'], 3, 2)."-".substr($data['fecha_version'], 0, 2)." 00:00:00";
            }else{
                $fecha_version="";
            }
            //d
            $table = new Table($this->db, 'poe_cabecera');

            if($data['id_poe']){
                $table->find($data['id_poe']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->descripcion = $data['descripcion'];
            $table->version = $data['version'];
            $table->fecha_version = $fecha_version;
            $table->observacion = $data['observacion'];
            $table->estado = $data['estado'];
            $table->fecha_carga = date('Y-m-d H:i:s');
            $table->id_usuario = $_SESSION['id'];
            $table->permite_nc = $data['permite_nc'];
            if($table->save()){
                return $table->id_poe;
            }else{
                return 0;
            }
        }
        function save_registro_poe($data,$nombre_doc_registro){
            //session_start();
            $table = new Table($this->db, 'poe_registros');
            $table->id_poe = $data['id_poe'];
            $table->descripcion = $data['descripcion_registro'];
            $table->nombre_archivo = $nombre_doc_registro;
            $table->estado = 'A';


            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }

         function save_datos_area($data){
            //session_start();
            $table = new Table($this->db, 'areas');

            if($data['id_area']){
                $table->find($data['id_area']);
                //$table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                //$table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->descripcion = $data['descripcion'];

            $table->estado = 'A';
            //$table->fecha_carga = date('Y-m-d H:i:s');
            $table->id_usuario = $_SESSION['id'];

            if($table->save()){
                return $table->id_area;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en atencion*********/////////////
        function save_atencion($data){
            $table = new Table($this->db, 'proceso_atencion');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->donantes_bscm = $data['donantes_bscm'];
            $table->donantes_colectas = $data['donantes_colectas'];
            $table->donantes_dorado = $data['donantes_dorado'];
            $table->donantes_obera = $data['donantes_obera'];
            $table->diferidos = $data['diferidos'];
            $table->autoexcluidos = $data['autoexcluidos'];
            $table->extracion_fallida = $data['extracion_fallida'];
            $table->serologia_reactiva = $data['serologia_reactiva'];
            $table->n_vencimientos = $data['n_vencimientos'];
            $table->uni_descartadas_prod_plasma = $data['uni_descartadas_prod_plasma'];
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }

        ////////////**********insercion en aferesis*********/////////////
        function save_aferesis($data){
            $table = new Table($this->db, 'aferesis');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->aferesis_pacientes = $data['aferesis_pacientes'];
            $table->aferesis_donantes = $data['aferesis_donantes'];
            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en aferesis*********/////////////
        function save_apoyo_insumos($data){
            $table = new Table($this->db, 'proceso_apoyo_insumos');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->ref_verificadas = $data['ref_verificadas'];
            $table->num_ref_faltantes = $data['num_ref_faltantes'];
            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en calificacion bilogica imouno*********/////////////
        function save_inmuno($data){
            $table = new Table($this->db, 'calif_bio_inmuno');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->num_serologia = $data['num_serologia'];
            $table->porcentaje_serologia = $data['porcentaje_serologia'];
            $table->nro_hiv_ac = $data['nro_hiv_ac'];
            $table->nro_hiv_p24 = $data['nro_hiv_p24'];
            $table->nro_hbv_HbsAg = $data['nro_hbv_HbsAg'];
            $table->nro_hbv_ac = $data['nro_hbv_ac'];
            $table->nro_HBV_Ac_HBs = $data['nro_HBV_Ac_HBs'];
            $table->nro_hcv = $data['nro_hcv'];
            $table->nro_chagas_hai = $data['nro_chagas_hai'];
            $table->nro_chagas_elisa = $data['nro_chagas_elisa'];
            $table->nro_sifilis = $data['nro_sifilis'];
            $table->nro_brucelosi = $data['nro_brucelosi'];
            $table->nro_htlv_1_2 = $data['nro_htlv_1_2'];
            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en calificacion bilogica imouno analitics*********/////////////
        function save_inmuno_analiticas($data){
            $table = new Table($this->db, 'calif_bio_inmuno_analiticas');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->nro_abo_rh_analiticas = $data['nro_abo_rh_analiticas'];
            $table->rh_negativos = $data['rh_negativos'];
            $table->nro_fenotipo = $data['nro_fenotipo'];
            $table->nro_cooms_indirecta = $data['nro_cooms_indirecta'];
            $table->nro_cooms_indirecta_mas = $data['nro_cooms_indirecta_mas'];

            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en calificacion bilogica imouno domantes*********/////////////
        function save_inmuno_donantes($data){
            $table = new Table($this->db, 'calif_bio_inmuno_donantes');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->nro_abo_rh_donantes = $data['nro_abo_rh_donantes'];
            $table->rh_reativos = $data['rh_reativos'];
            $table->nro_pruebas = $data['nro_pruebas'];
            $table->nro_fenotipo = $data['nro_fenotipo'];
            $table->nro_cooms_indirecta = $data['nro_cooms_indirecta'];
            $table->nro_cooms_indirecta_mas = $data['nro_cooms_indirecta_mas'];

            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en produccion_hemocomponentes*********/////////////
        function save_produccion_hemocomponentes($data){
            $table = new Table($this->db, 'produccion_hemocomponentes');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->unidades_fraccionadas = $data['unidades_fraccionadas'];
            $table->hemo_obtenidos = $data['hemo_obtenidos'];
            $table->globulos_rojos = $data['globulos_rojos'];
            $table->plasma_fresco_congelado = $data['plasma_fresco_congelado'];
            $table->plasma_modificado = $data['plasma_modificado'];
            $table->concentrado_plaquetas = $data['concentrado_plaquetas'];
            $table->criopresepitados = $data['criopresepitados'];
            $table->plasma_aferesis = $data['plasma_aferesis'];
            $table->plaqueta_aferesis = $data['plaqueta_aferesis'];
            /******/
            $table->estado = 'A';
           // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en produccion_hemocomponentes*  especiales********/////////////
        function save_produccion_hemocomponentes_especiales($data){
            $table = new Table($this->db, 'produccion_hemocomponentes_especiales');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->rojos_leucoreducidos = $data['rojos_leucoreducidos'];
            $table->rojos_irradiados = $data['rojos_irradiados'];
            $table->plaquetas_irradiados = $data['plaquetas_irradiados'];
            $table->plaquetas_leucoreducidas = $data['plaquetas_leucoreducidas'];
            $table->plaquetas_aferesis_leucoreducidas = $data['plaquetas_aferesis_leucoreducidas'];
            $table->plaquetas_aferesis_irradiados = $data['plaquetas_aferesis_irradiados'];
            $table->rojos_fraccionados_pediatria = $data['rojos_fraccionados_pediatria'];
            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en almacenamoento  hemocomponentes********/////////////
        function save_almacenamiento_hemocomponentes($data){
            $table = new Table($this->db, 'almacenamiento_hemocomponentes');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->rojos_leucoreducidos = $data['rojos_leucoreducidos'];
            $table->rojos_irradiados = $data['rojos_irradiados'];
            $table->plaquetas_irradiados = $data['plaquetas_irradiados'];
            $table->plaquetas_leucoreducidas = $data['plaquetas_leucoreducidas'];
            $table->plaquetas_aferesis_leucoreducidas = $data['plaquetas_aferesis_leucoreducidas'];
            $table->plaquetas_aferesis_irradiados = $data['plaquetas_aferesis_irradiados'];
            $table->rojos_fraccionados_pediatria = $data['rojos_fraccionados_pediatria'];
            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en almacenamoento  hemoderivados********/////////////
        function save_almacenamiento_hemoderivados($data){
            $table = new Table($this->db, 'almacenamiento_hemoderivados');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->albumina_serica_humana = $data['albumina_serica_humana'];
            $table->gamaglobulina_2_5 = $data['gamaglobulina_2_5'];
            $table->gamaglobulina_5 = $data['gamaglobulina_5'];
            $table->gamaglobulina_10 = $data['gamaglobulina_10'];
            $table->gama_antitetanica = $data['gama_antitetanica'];
            $table->gama_anti_rh = $data['gama_anti_rh'];
            $table->factor_vIII = $data['factor_vIII'];
            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en transfusion********/////////////
        function save_transfusion($data){
            $table = new Table($this->db, 'proceso_transfusion');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->globulos_rojos = $data['globulos_rojos'];
            $table->plasma_fresco = $data['plasma_fresco'];
            $table->plaquetas_aferesis = $data['plaquetas_aferesis'];
            $table->plaquetas = $data['plaquetas'];
            $table->criopresipitados = $data['criopresipitados'];
            $table->descartes_plasma = $data['descartes_plasma'];
            $table->descartes_plaquetas = $data['descartes_plaquetas'];
            $table->descartes_globulos_rojos = $data['descartes_globulos_rojos'];
            $table->descartes_criopresipitados = $data['descartes_criopresipitados'];
            $table->descartes_plaquetas_aferesis = $data['descartes_plaquetas_aferesis'];
            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en citaciones********/////////////
        function save_citaciones($data){
            $table = new Table($this->db, 'proceso_citaciones');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->pendiente_informar = $data['pendiente_informar'];
            $table->pendiente_resultados = $data['pendiente_resultados'];
            $table->realizadas = $data['realizadas'];

            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        ////////////**********insercion en medicion********/////////////
        function save_medicion($data){
            $table = new Table($this->db, 'medicion_analisis_mejoras');

            if($data['id_registro']){
                $table->find($data['id_registro']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->periodo = $data['periodo'];
            $table->anio = date('Y');
            $table->inst_convenio = $data['inst_convenio'];
            $table->inst_servicios_hemoterapia = $data['inst_servicios_hemoterapia'];
            $table->centro_hemoterapia_privado = $data['centro_hemoterapia_privado'];
            $table->centro_hemoterapia_publico = $data['centro_hemoterapia_publico'];
            $table->bs_extrahospitalario_privado = $data['bs_extrahospitalario_privado'];
            $table->bs_extrahospitalario_publico = $data['bs_extrahospitalario_publico'];
            $table->bs_intrahospitalario_privado = $data['bs_intrahospitalario_privado'];
            $table->bs_intrahospitalario_publico = $data['bs_intrahospitalario_publico'];
            $table->servicio_transfusion_privado = $data['servicio_transfusion_privado'];
            $table->servicio_transfusion_publico = $data['servicio_transfusion_publico'];
            /******/
            $table->estado = 'A';
            // $table->fecha_carga = date('Y-m-d H:i:s');
            $table->usuario = 1;
            //$table->usuario = 1;fcase
            if($table->save()){
                return $table->id_registro;
            }else{
                return 0;
            }
        }
        function getAplicativos(){

		$query = "SELECT a.*, m.descripcion nombre_menu_agrupador FROM aplicativos a
                  LEFT JOIN menu_aplicativo ma ON ma.id_aplicativo=a.id_aplicativo
                  LEFT JOIN menu m ON m.id_menu=ma.id_menu
                  WHERE 1 ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	    }
        function getPoes($id_area=null){
            //session_start();
		$query = "SELECT *, date_format(fecha_version, '%d/%m/%Y') as fecha_version  "
                        . "FROM poe_cabecera a ";
                        if($id_area){
                           $query .= "INNER JOIN  relacion_area_poe pa ON pa.id_poe=a.id_poe";
                        }
                        $query .=  " WHERE a.estado='A' ";
                        if($id_area){
                        $query .=  " AND pa.id_area='".$id_area."'";
                        }
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getPoesbyUsuario(){
            //session_start();
		$query = "SELECT * FROM poe_cabecera a "
                        . "INNER JOIN relacion_area_poe rap ON rap.id_poe=a.id_poe "
                        . "INNER JOIN persona_area pa ON pa.id_area=rap.id_area "
                        . "INNER JOIN usuarios u ON u.id_persona=pa.id_persona "
                        . "WHERE u.id_usuario='".$_SESSION['id']."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getAplicativosNotificacion(){

		$query = "SELECT COUNT(id_registro) total FROM usuario_aplicativos a WHERE id_aplicativo='16' AND id_usuario='".$_SESSION['id']."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->total;
		else
			return false;
	}
        function getControlIndicadores($tabla){

		$query = "SELECT COUNT(id_registro) AS total FROM $tabla ";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->total;
		else
			return false;
	}
        function getContador(){
		$query = "SELECT * FROM contador pa";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getUltimoNumero(){
		$query = "SELECT * FROM contador pa";
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->turno;
		else
			return false;
	}
        function getPoeById($ide){
		$query = "SELECT *, date_format(fecha_version, '%d/%m/%Y') as fecha_version FROM poe_cabecera pc WHERE pc.id_poe='".$ide."'" ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getAreaById($ide){
		$query = "SELECT * FROM areas a WHERE a.id_area='".$ide."'" ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
        }
        function getAplicativosById($ide){
            $query = "SELECT * FROM aplicativos a WHERE a.id_aplicativo='".$ide."'" ;
            //echo $query;
            $result = $this->db->loadObjectList($query);
            if($result)
                return $result[0];
            else
                return false;
        }
        /*********************/
        function save_aplicativo($data){
        global $error;

        $table = new Table($this->db, 'aplicativos');
        if($data['id_aplicativo']){
            $table->find($data['id_aplicativo']);
        }
        $table->nombre_menu = $data['nombre_menu'];
        $table->nombre_action = $data['nombre_action'];

        if($table->save()){
            return $table->id_aplicativo;
        }
        else

            return false;
        }
        function save_aplicativo_persona($data){
        global $error;

        $table = new Table($this->db, 'usuario_aplicativos');
        
        $table->id_usuario = $data['personaID'];
        $table->id_aplicativo = $data['aplicativoID'];

        if($table->save()){
            return $table->id_registro;
        }
        else

            return false;
        }
        function save_aplicativo_menu($data){
            global $error;

            $table = new Table($this->db, 'menu_aplicativo');
            
            $table->id_menu = $data['id_menu'];
            $table->id_aplicativo = $data['aplicativoID'];

            if($table->save()){
                return $table->id_registro;
            }
            else

            return false;
        }
        function getAreas(){

		$query = "SELECT * FROM areas a WHERE estado='A' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getPersonaById($ide){
		$query = "SELECT a.*,date_format(fecha_nacimiento, '%d/%m/%Y')as fecha_nacimiento
		 ,date_format(fecha_ingreso, '%d/%m/%Y')as fecha_ingreso FROM personas a WHERE a.id_persona='".$ide."'" ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getpersonas(){
		$query = "SELECT a.*,date_format(a.fecha_nacimiento, '%d/%m/%Y')as fecha_nacimiento FROM personas a " ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
        }
        function getPaises(){
            $query = "SELECT p.* FROM paises p " ;
            //echo $query;
            $result = $this->dbPg->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getProvincias($idpais){
            $query = "SELECT p.* FROM provincias p WHERE p.idpais='".$idpais."' ORDER BY provincia
             ASC" ;
            //echo $query;
            $result = $this->dbPg->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getLocalidad($idprovincia){
            $query = "SELECT p.* FROM localidades p WHERE p.idprovincia='".$idprovincia."' ORDER BY localidad
                 ASC" ;
            //echo $query;
            $result = $this->dbPg->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        /*********************/
        function save_persona($data){
            global $error;

            $table = new Table($this->db, 'personas');
            if($data['id_persona']){
		    $table->find($data['id_persona']);
            }
            $fecha_nac=substr($data['fecha_nacimiento'], 6, 4)."-".substr($data['fecha_nacimiento'], 3, 2)."-".substr($data['fecha_nacimiento'], 0, 2);
            $fecha_ing=substr($data['fecha_ingreso'], 6, 4)."-".substr($data['fecha_ingreso'], 3, 2)."-".substr($data['fecha_ingreso'], 0, 2);
            $table->nombre = ucwords($data['nombre']);
            $table->apellido = ucwords($data['apellido']);
            $table->dni = $data['dni'];
            $table->fecha_nacimiento =  $fecha_nac;
            $table->sexo = $data['sexo'];
            $table->rol = $data['rol'];
            $table->dependencia = $data['dependencia'];
            $table->domicilio = $data['domicilio'];
            $table->telefono_particular = $data['telefono_particular'];
            $table->telefono_celular = $data['telefono_celular'];
            $table->carga_horaria = $data['carga_horaria'];
            $table->id_reloj = $data['id_reloj'];
            $table->fecha_ingreso = $fecha_ing;
            $table->cod_estado = 'A';
            $table->fecha_ultima_modificacion = date('Y-m-d H:i:s');
            $table->fecha_alta = date('Y-m-d H:i:s');
            $table->usuario = $_SESSION['id'];
            $table->id_dominio = 1;
            if($table->save()){
                return $table->id_persona;
            }
		else

			return false;
        }
        function getRelaciones(){

		$query = "SELECT r.id_registro, pc.descripcion poe, a.descripcion area "
                        . " FROM relacion_area_poe r"
                        . " INNER JOIN poe_cabecera pc ON pc.id_poe=r.id_poe"
                        . " INNER JOIN areas a ON a.id_area=r.id_area"
                        . " WHERE r.estado='A' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getRelacionesbyID($id_registro){

		$query = "SELECT r.id_registro, pc.descripcion poe, pc.id_poe poeID, a.descripcion area , a.id_area areaID "
                        . " FROM relacion_area_poe r"
                        . " INNER JOIN poe_cabecera pc ON pc.id_poe=r.id_poe"
                        . " INNER JOIN areas a ON a.id_area=r.id_area"
                        . " WHERE r.id_registro='".$id_registro."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getRegistros($_poe){

		$query = "SELECT p.*, pc.descripcion poe"
                        . " FROM poe_registros p "
                        . " inner join poe_cabecera pc on pc.id_poe=p.id_poe"
                        . " WHERE p.estado='A' AND p.id_poe='".$_poe."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getNombrePoes($id_poe){

		$query = "SELECT pc.descripcion poe"
                        . " FROM poe_cabecera pc "

                        . " WHERE pc.id_poe='".$id_poe."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->poe;
		else
			return false;
	}
        function save_examen($data){
            $table = new Table($this->db, 'examen');
            $table->id_poe = $data['poeID'];
            $table->descripcion = $data['nombre_examen'];
            $table->estado = 'XV';
            if($table->save()){
                return $table->id_examen;
            }else{
                return 0;
            }
        }
        function save_examen_preguntas($id_examen, $pregunta, $pregunta_descripcion){
            $table = new Table($this->db, 'examen_preguntas');
            $table->id_examen = $id_examen;
            $table->id_pregunta = $pregunta;
            $table->descripcion = $pregunta_descripcion;
            if($table->save()){
                return $table->id_examen;
            }else{
                return 0;
            }
        }
        function save_examen_respuestas($id_examen, $id_pregunta, $id_respuesta, $respuesta_descripcion, $correcto){
            $table = new Table($this->db, 'examen_preguntas_respuestas');
            $table->id_examen = $id_examen;
            $table->id_pregunta = $id_pregunta;
            $table->id_respuesta = $id_respuesta;
            $table->descripcion = $respuesta_descripcion;
            $table->correcto = $correcto;
            if($table->save()){
                //return $table->id_examen;
            }else{
                return 0;
            }
        }
        function getExamenes(){

		$query = "SELECT e.*, p.descripcion poe"
                        . " FROM examen e "
                        . " INNER JOIN  poe_cabecera p ON p.id_poe=e.id_poe "
                        . " WHERE e.estado='A' ";

                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getExamenesPorValidad(){

		$query = "SELECT e.*, p.descripcion poe"
                        . " FROM examen e "
                        . " INNER JOIN  poe_cabecera p ON p.id_poe=e.id_poe "
                        . " WHERE e.estado!='A' ";

                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
         function getExamen($id_examen){

		$query = "SELECT e.* "
                        . " FROM examen_preguntas e "

                        . " WHERE e.id_examen='".$id_examen."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getRespuestas($id_pregunta, $id_examen){

		$query = "SELECT e.* "
                        . " FROM examen_preguntas_respuestas e "

                        . " WHERE e.id_pregunta='".$id_pregunta."' AND e.id_examen='".$id_examen."'";

                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getRespuestasCorrectas($id_examen, $id_pregunta){

		$query = "SELECT e.id_respuesta "
                        . " FROM examen_preguntas_respuestas e "

                        . " WHERE e.correcto='S' AND e.id_examen='".$id_examen."' AND e.id_pregunta='".$id_pregunta."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->id_respuesta;
		else
			return false;
	}
        function save_respuestas_examen($data, $i, $tipo){
            $table = new Table($this->db, 'examen_respuestas_usuarios');
            $table->id_examen = $data['id_examen'];
            $table->id_usuario = $_SESSION['id'];
            $table->id_pregunta = $i;
            $table->respuesta = $data['pregunta'.$i];
            $table->tipo_respuesta = $tipo;
            if($table->save()){
                //return $table->id_examen;
            }else{
                return 0;
            }
        }
        function save_calificacion_examen($data, $calificacion){
            $table = new Table($this->db, 'examen_calificacion_usuario');
            $table->id_examen = $data['id_examen'];
            $table->id_usuario = $_SESSION['id'];
            $table->calificacion = $calificacion;

            if($table->save()){
               // return $table->id_examen;
            }else{
                return 0;
            }
        }
        function getRindioExamen($id_examen){

		$query = "SELECT e.calificacion "
                        . " FROM examen_calificacion_usuario e "
                        . " WHERE e.id_examen='".$id_examen."' AND e.id_usuario='".$_SESSION['id']."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->calificacion;
		else
			return 0;
	}
        function getCalificaciones($id_usuario=null, $id_examen=null){

		$query = "SELECT CONCAT(p.nombre,' ',p.apellido) nombre, e.descripcion examen,ec.calificacion nota "
                        . " FROM examen_calificacion_usuario ec "
                        . " INNER JOIN examen e ON e.id_examen=ec.id_examen "
                        . " INNER JOIN usuarios u ON u.id_usuario=ec.id_usuario "
                        . " INNER JOIN personas p ON p.id_persona=u.id_persona "
                        . " WHERE 1 ";
                        if ($id_examen){
                            $query.= " AND ec.id_examen='".$id_examen."'";
                        }
                        if ($id_usuario){
                            $query.= " AND ec.id_usuario='".$id_usuario."'";
                        }
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return 0;
	}
        function getEquipos(){

		$query = "SELECT e.*, m.descripcion nombre_marca, te.armado,te.descripcion descripcion_tipo, "
                        . "l.descripcion lugar_nombre,s.descripcion sector_nombre, p.descripcion proveedor_nombre,
                        te.descripcion equipo,date_format(e.fecha_ingreso, '%d/%m/%Y') as fecha_ingreso  "
                        . " FROM equipos e "
                        . " LEFT JOIN marcas m ON m.id_marca=e.marca"
                        . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo"
                        . " LEFT JOIN lugar l ON l.id_lugar=e.lugar"
                        . " LEFT JOIN sector s ON s.id_sector=e.id_sector"
                        . " LEFT JOIN proveedor p ON p.id_proveedor=e.representante"
                        . " WHERE 1 ORDER BY te.armado, e.num_interno";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return 0;
	}
        function getEquiposFiltros($data){

		$query = "SELECT e.*, m.descripcion nombre_marca,date_format(e.fecha_ingreso, '%d/%m/%Y') as fecha_ingreso , te.armado, "
                        . "l.descripcion lugar_nombre,s.descripcion sector_nombre,te.descripcion descripcion_tipo, p.descripcion proveedor_nombre,te.descripcion equipo  "
                        . " FROM equipos e "
                        . " LEFT JOIN marcas m ON m.id_marca=e.marca"
                        . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo"
                        . " LEFT JOIN lugar l ON l.id_lugar=e.lugar"
                        . " LEFT JOIN sector s ON s.id_sector=e.id_sector"
                        . " LEFT JOIN proveedor p ON p.id_proveedor=e.representante"
                        . " WHERE 1 ";
                if($data['lugar_filtro']){
                    $query.=" AND  l.id_lugar = '".$data['lugar_filtro']."'";
                }
                if($data['sector_filtroID']){
                    $query.=" AND  e.id_sector = '".$data['sector_filtroID']."'";
                }
                if($data['tipo_equipo_filtro']){
                    $query.=" AND e.tipo_equipo='".$data['tipo_equipo_filtro']."' ";
                }
                if($data['num_serie']){
                    $query.=" AND  e.nro_serie='".$data['num_serie']."'";
                }
                if($data['marca_filtro']){
                    $query.=" AND  e.marca='".$data['marca_filtro']."'";
                }
            $query.="  ORDER BY te.armado, e.num_interno";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return 0;
	}
	function getEquiposFiltrosReporte($data){

		$query = "SELECT e.*, m.descripcion nombre_marca,date_format(e.fecha_ingreso, '%d/%m/%Y') as fecha_ingreso , te.armado, "
                        . "l.descripcion lugar_nombre,s.descripcion sector_nombre,te.descripcion descripcion_tipo, p.descripcion proveedor_nombre,te.descripcion equipo  "
                        . " FROM equipos e "
                        . " LEFT JOIN marcas m ON m.id_marca=e.marca"
                        . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo"
                        . " LEFT JOIN lugar l ON l.id_lugar=e.lugar"
                        . " LEFT JOIN sector s ON s.id_sector=e.id_sector"
                        . " LEFT JOIN proveedor p ON p.id_proveedor=e.representante"
            . " INNER JOIN mantenimiento_cabecera mc ON mc.id_equipo=e.id_equipo "
            . " WHERE 1 ";
                if($data['lugar_filtro']){
                    $query.=" AND  l.id_lugar = '".$data['lugar_filtro']."'";
                }
                if($data['sector_filtroID']){
                    $query.=" AND  e.id_sector = '".$data['sector_filtroID']."'";
                }
                if($data['tipo_equipo_filtro']){
                    $query.=" AND e.tipo_equipo='".$data['tipo_equipo_filtro']."' ";
                }
                if($data['num_serie']){
                    $query.=" AND  e.nro_serie='".$data['num_serie']."'";
                }
                if($data['marca_filtro']){
                    $query.=" AND  e.marca='".$data['marca_filtro']."'";
                }
            $query.=" GROUP BY id_equipo ORDER BY te.armado, e.num_interno";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return 0;
	}
        function getEquipoByID($idequipo){

		$query = "SELECT e.*, date_format(e.fecha_ingreso, '%d/%m/%Y') as fecha_ingreso ,te.armado "
                        . " FROM equipos e "
                        . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo"
                        . " WHERE 1 AND e.id_equipo='".$idequipo."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return 0;
	    }
        function getEquipoByUsuario($data){
            session_start();
            $query = "SELECT e.*, m.descripcion nombre_marca, te.armado, "
                . "l.descripcion lugar_nombre,te.descripcion descripcion_tipo, p.descripcion proveedor_nombre,te.descripcion equipo "
                . " FROM equipos e "
                . " LEFT JOIN equipo_encargados ee ON ee.id_equipo=e.id_equipo"
                . " LEFT JOIN marcas m ON m.id_marca=e.marca"
                . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo"
                . " LEFT JOIN lugar l ON l.id_lugar=e.lugar"
                . " LEFT JOIN proveedor p ON p.id_proveedor=e.representante"
                . " WHERE ee.id_persona='".$_SESSION['id_persona']."' ";
            if($data['lugar_filtro']){
                $query.=" AND  l.id_lugar = '".$data['lugar_filtro']."'";
            }
            if($data['tipo_equipo']){
                $query.=" AND e.tipo_equipo='".$data['tipo_equipo']."' ";
            }

            if($data['marca']){
                $query.=" AND  e.marca='".$data['marca']."' ";
            }
           // echo $query;
            $query.="  GROUP BY e.id_equipo";
            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return 0;
        }

        function getMarca(){
        	$query = "SELECT e.* "
                        . " FROM marcas e "
                        . " WHERE 1  ORDER BY descripcion ASC";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	    }
        function getTipoEquipo(){
        	$query = "SELECT e.* "
                        . " FROM tipo_equipo e "
                        . " WHERE 1  ORDER BY descripcion ASC";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	}
        function getCondicion(){
        	$query = "SELECT e.* "
                        . " FROM condicion e "
                        . " WHERE 1 ";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	}
        function getTipoEquipoByID($ideq){
        	$query = "SELECT e.* "
                        . " FROM tipo_equipo e "
                        . " WHERE id_tipo_equipo='".$ideq."' ";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result[0];
		else return 0;
	}
        function getLugares(){
        	$query = "SELECT e.*,s.descripcion sector "
                        . " FROM lugar e
                            LEFT JOIN sector s ON s.id_sector=e.id_sector "
                        . " WHERE 1 ORDER BY descripcion ASC";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	}
    function getLugarByID($idlugar){
        	$query = "SELECT e.* "
                        . " FROM lugar e "
                        . " WHERE  1 AND e.id_lugar='".$idlugar."'";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result[0];
		else return 0;
	}
    function getLugarBySector($idsector){
        $query = "SELECT e.* "
            . " FROM lugar e "
            . " WHERE  1 AND e.id_sector='".$idsector."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
        function getProveedores($descrip=null){
        	$query = "SELECT e.* "
                        . " FROM proveedor e "
                        . " WHERE 1 ";
            if($descrip){
                $query .= " AND e.descripcion LIKE '%".$descrip."%'";
            }
            $query .= " ORDER BY descripcion";

	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	}
        function getProveedorByID($id_proveedor){
        	$query = "SELECT e.* "
                        . " FROM proveedor e "
                        . " WHERE  1 AND e.id_proveedor='".$id_proveedor."'";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result[0];
		else return 0;
	}
        function getRepresentante(){
        	$query = "SELECT e.* "
                        . " FROM marcas e "
                        . " WHERE 1 ";
	        $result = $this->db->loadObjectList($query);
		if($result)return $result;
		else return 0;
	}
        function save_datos_equipo($data, $manual=null, $ficha=null){
            //print_r($data);
            $table = new Table($this->db, 'equipos');
            $fecha_ingreso=substr($data['fecha_ingreso'], 6, 4)."-".substr($data['fecha_ingreso'], 3, 2)."-".substr($data['fecha_ingreso'], 0, 2)." 00:00:00";
            if($data['id_equipo']){
                $table->find($data['id_equipo']);
                $table->fecha_modificacion = date('Y-m-d H:i:s');
            }else{
                $table->fecha_carga = date('Y-m-d H:i:s');
            }
            $table->tipo_equipo = $data['tipo_equipo'];
            $table->num_interno = $data['num_interno'];
            $table->num_patrimonio = $data['num_patrimonio'];
            if($ficha){
            $table->ficha_tecnica = $ficha;
            }
            $table->marca = $data['marca'];
            $table->lugar = $data['lugar'];
            $table->id_sector = $data['sector'];
            $table->modelo = $data['modelo'];
            $table->nro_serie = $data['nro_serie'];
            $table->preventivo_diario = $data['preventivo_diario'];
            $table->preventivo_semanal = $data['preventivo_semanal'];
            $table->preventivo_mensual = $data['preventivo_mensual'];
            $table->preventivo_anual = $data['preventivo_anual'];
            $table->clasificacion = $data['clasificacion'];
            $table->estado = $data['estado'];
            $table->representante = $data['representante'];
            $table->direccion = $data['direccion'];
            $table->telefono = $data['telefono'];
            $table->contacto = $data['contacto'];
            $table->consumo = $data['consumo'];
            $table->responsable = $data['responsable'];
            $table->mail = $data['mail'];
            $table->manual = $data['manual'];
            if($manual){
            $table->manual_nombre = $manual;
            }
            $table->fecha_ingreso = $fecha_ingreso;
            $table->estado_registro = 'A';
            $table->observaciones=$data['observaciones'];
            $table->usuario = $_SESSION['id'];

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_equipo;
            }else{
                return 0;
            }
        }
        function getAplicacionesPersona($id_pers){

		$query = "SELECT  a.nombre_menu aplicacion, ua.id_registro relacion"
                        . " FROM usuario_aplicativos ua "
                        ." INNER JOIN usuarios u ON u.id_usuario=ua.id_usuario "
                        ." INNER JOIN aplicativos a ON a.id_aplicativo=ua.id_aplicativo "
                        ." WHERE u.id_usuario='".$id_pers."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return 0;
	    }
    function getAplicacionesMenu($id_menu){

        $query = "SELECT  a.nombre_menu aplicacion, ma.id_relacion relacion"
            . " FROM menu_aplicativo ma "
            ." INNER JOIN aplicativos a ON a.id_aplicativo=ma.id_aplicativo "
            ." WHERE ma.id_menu='".$id_menu."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return 0;
    }


        function getPersonaNombre($id_pers){
            $query = "SELECT CONCAT_WS(' ', p.nombre, p.apellido) nombre"
                        . " FROM personas p"
                        ." INNER JOIN usuarios u ON u.id_persona=p.id_persona "
                        ." WHERE u.id_usuario='".$id_pers."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->nombre;
		else
			return 0;
        }
        function getUltimoEquipo($tipo_equipo){
            $query = "SELECT e.num_interno "
                        . " FROM equipos e"
                        ." WHERE e.tipo_equipo='".$tipo_equipo."' "
                    . "ORDER BY e.fecha_carga DESC";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->num_interno;
		else
			return 0;
        }
        /************************abm marcas************/////////
        function getMarcaById($ide){
		$query = "SELECT a.* FROM marcas a WHERE a.id_marca='".$ide."'" ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0];
		else
			return false;
	}
        function getmarcas(){
		$query = "SELECT a.* FROM marcas a WHERE estado='A' ORDER BY descripcion ASC" ;
                //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}

        /*********************/
        function save_marca($data){
            global $error;

            $table = new Table($this->db, 'marcas');
            if($data['id_marca']){
		$table->find($data['id_marca']);
            }

            $table->descripcion = ucwords($data['descripcion']);

            $table->estado = 'A';

            if($table->save()){
                return $table->id_marca;
            }
		else

			return false;
        }
        /**********************************************************/
        function save_proveedor($data){
            global $error;

            $table = new Table($this->db, 'proveedor');
            if($data['id_proveedor']){
		$table->find($data['id_proveedor']);
            }

            $table->descripcion = ucwords($data['descripcion']);
            $table->direccion = $data['direccion'];
            $table->telefonos = $data['telefonos'];
            $table->contacto = $data['contacto'];
            $table->mail = $data['mail'];
            $table->estado = 'A';

            if($table->save()){
                return $table->id_proveedor;
            }
		else

			return false;
        }
         /**********************************************************/
        function save_lugar($data){
            global $error;

            $table = new Table($this->db, 'lugar');
            if($data['id_lugar']){
		$table->find($data['id_lugar']);
            }
            $table->descripcion = ucwords($data['descripcion']);
            $table->id_sector = $data['id_sector'];

            $table->estado = 'A';

            if($table->save()){
                return $table->id_lugar;
            }
		else

			return false;
        }
         /**********************************************************/
        function save_tipo_equipo($data){
            global $error;

            $table = new Table($this->db, 'tipo_equipo');
            if($data['id_tipo_equipo']){
		$table->find($data['id_tipo_equipo']);
            }

            $table->descripcion = ucwords($data['descripcion']);
            $table->armado = ucwords($data['armado']);

            $table->estado = 'A';

            if($table->save()){
                return $table->id_tipo_equipo;
            }
		else

			return false;
        }
        /***************************mantenimiento*******************************/

        function save_item_observaciones($data){
            global $error;
            $table = new Table($this->db, 'mantenimiento_item_tipo_equipo');
            $table->descripcion = Observaciones;
            $table->tipo = 'textarea';
            $table->obligatorio = 'S';
            ///////////////////******************************///////////////////
            $table->id_tipo_equipo = $data['tipo_equipo'];
            $table->tipo_mantenimiento = $data['tipo_mantenimiento'];
            $table->estado = 'A';
            if($table->save()){
                return $table->id_registro;
            }
		else
                    return false;
        }
        function save_item_mantenimiento($data){
            global $error;

            $table = new Table($this->db, 'mantenimiento_item_tipo_equipo');
            if($data['id_registro']){
                $table->find($data['id_registro']);
            }
            $table->titulo = $data['titulo'];
            $table->descripcion = $data['item'];
            $table->tipo = 'checkbox';
            $table->obligatorio = 'N';
            $table->costo = $data['costo'];
            $table->tiempo = $data['tiempo'];
            $table->frecuencia = $data['frecuencia'];
            $table->condicion = $data['condicion'];
            $table->id_tipo_equipo = $data['tipo_equipo'];
            $table->tipo_mantenimiento = $data['tipo_mantenimiento'];
            $table->estado = 'A';
            if($table->save()){
                return $table->id_registro;
            }
		else
                    return false;
        }
        function getItems($equipo, $mantenimiento){
            if($equipo!=0 && $mantenimiento!=0){
		$query = "SELECT a.* FROM mantenimiento_item_tipo_equipo a WHERE 1 ";

                $query .= " AND a.id_tipo_equipo='".$equipo."' AND a.tipo_mantenimiento='".$mantenimiento."'" ;
                }
               //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
        }
        function getDatosItemByID($item){

                $query = "SELECT a.* FROM mantenimiento_item_tipo_equipo a WHERE 1 ";

                $query .= " AND a.id_registro='".$item."'" ;

            $result = $this->db->loadObjectList($query);
            if($result)
                return $result[0];
            else
                return false;
        }
        function getItemsMantenimeinto($tipoequipo, $mantenimiento,$item=null){
                if($tipoequipo!=0 && $mantenimiento!=0){
		$query = "SELECT a.* ,c.descripcion cond "
                        . "FROM mantenimiento_item_tipo_equipo a "
                        . "LEFT JOIN condicion c ON c.letra=a.condicion "
                        . "WHERE 1 ";
                $query .= " AND a.id_tipo_equipo='".$tipoequipo."' AND a.tipo_mantenimiento='".$mantenimiento."' " ;
                }
                if($item) {
                    $query .= " AND a.id_registro='" . $item . "' ";
                }
            $query .= "  ORDER BY tipo ASC" ;
               // echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getVerificaExistencia($tipo_equipo, $tipo_mantenimiento){

		$query = "SELECT COUNT(id_registro) total FROM mantenimiento_item_tipo_equipo a WHERE 1 ";
                $query .= " AND a.id_tipo_equipo='".$tipo_equipo."' AND a.tipo_mantenimiento='".$tipo_mantenimiento."'" ;

		$result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->total;
		else
			return false;
	}
        function  save_mantenimiento_cabecera($data){
            session_start();
            global $error;

            $table = new Table($this->db, 'mantenimiento_cabecera');

            $table->id_equipo = $data['id_equipo'];
            $table->tipo_equipo = $data['tipo_equipo'];
            $table->tipo_mantenimiento = $data['tipo'];
            $table->en_termino = $data['estado_mant'];
            if($data['fecha_deberia']!='undefined'){
                $table->fecha_deberia = $data['fecha_deberia'];
            }
            if($data['fecha_debe']!='undefined'){
                $table->fecha_debe = $data['fecha_debe'];
            }
            $table->id_usuario = $_SESSION['id'];
            $table->fecha = date('Y-m-d H:i:s');
            if($table->save()){
                return $table->id_mantenimiento;
            }
		else
                    return false;

        }
        function save_mantenimiento_detalle($id_cabecera, $item, $valor){
            global $error;
            $table = new Table($this->db, 'mantenimiento_detalle');
            $table->id_mantenimiento_cabecera = $id_cabecera;
            $table->id_item = $item;
            $table->valor = $valor;
            if($table->save()){
                return $table->id_mantenimiento_detalle;
            }
		else
                    return false;
        }
        function getMantenimientosByEquipo($id_equipo, $tipo_mantenimiento=null){

		$query = "SELECT m.*,date_format(fecha, '%d/%m/%Y') as fecha, CONCAT(p.nombre,' ',p.apellido) nombre_usuario "
                        . " FROM mantenimiento_cabecera m "
                        . " INNER JOIN  usuarios u ON u.id_usuario=m.id_usuario"
                        . " INNER JOIN  personas p ON p.id_persona=u.id_persona"
                        . " WHERE 1 ";
                $query .= " AND m.id_equipo='".$id_equipo."' ORDER BY  fecha DESC" ;

		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        function getDetalleMantenimientos($id_mantenieminto){

		$query = "SELECT m.*, mte.titulo item "
                        . " FROM mantenimiento_detalle m "
                        . " LEFT JOIN  mantenimiento_item_tipo_equipo mte ON mte.id_registro=m.id_item"

                        . " WHERE 1 ";
                $query .= " AND m.id_mantenimiento_cabecera='".$id_mantenieminto."' ORDER BY tipo ASC" ;
            //echo $query;
		$result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	}
        /***************************************************************************/
        function chequear_existencia($descri, $tabla){

		$query = "SELECT COUNT(t.id_".$tabla.") total FROM ".$tabla." t WHERE t.descripcion='".$descri."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->total;
		else
			return false;
	    }
        function chequear_existencia_equipo($data){
            $query = "SELECT COUNT(t.id_equipo) total FROM equipos t WHERE t.tipo_equipo='".$data['tipo_equipo']."' and  t.num_interno='".$data['num_interno']."'";
            //echo $query;
            $result = $this->db->loadObjectList($query);
            if($result)
                return $result[0]->total;
            else
                return false;
        }
         /***************************************************************************/
        function chequear_existencia_marcas($descri, $tabla){

		$query = "SELECT COUNT(t.id_marca) total FROM ".$tabla." t WHERE t.descripcion='".$descri."'";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result[0]->total;
		else
			return false;
	}

        /**********************************capacitacion**********************************************/
        function save_capacitacion($data){
            //////************formateo de fecha********////////////
            $fecha_capacitacion=substr($data['fecha_capacitacion'], 6, 4)."-".substr($data['fecha_capacitacion'], 3, 2)."-".substr($data['fecha_capacitacion'], 0, 2);
            //////*******************///////////
            global $error;

                $table = new Table($this->db, 'capacitacion');
            if($data['id_capacitacion']){
                $table->find($data['id_capacitacion']);

            }
            $table->id_poe = $data['poeID'];
            $table->fecha_creacion = date('Y-m-d H:i:s');
            $table->descripcion = $data['descripcion'];
            $table->capacitador = $data['capacitador'];
            $table->duracion = $data['duracion'];
            $table->fecha_capacitacion = $fecha_capacitacion;
            $table->usuario = $_SESSION['id'];
            if($table->save()){
                return $table->id_capacitacion;
            }
		else
                    return false;
        }
        function save_pre_capacitacion($data){
            //////************formateo de fecha********////////////
            $fecha_capacitacion=substr($data['fecha_pre_capacitacion'], 6, 4)."-".substr($data['fecha_pre_capacitacion'], 3, 2)."-".substr($data['fecha_pre_capacitacion'], 0, 2)."-".$data['hora_pre_capacitacion'].":00";
            //////*******************///////////
            global $error;

            $table = new Table($this->db, 'pre_capacitacion');
            if($data['id_pre_capacitacion']){
                $table->find($data['id_pre_capacitacion']);

            }

            $table->fecha_creacion = date('Y-m-d H:i:s');
            $table->descripcion = $data['descripcion'];
            $table->capacitador = $data['capacitador'];
            $table->fecha_pre_capacitacion = $fecha_capacitacion;
            $table->usuario = $_SESSION['id'];
            if($table->save()){
                return $table->id_pre_capacitacion;
            }
            else
                return false;
        }
        function save_colecta($data){
            //////************formateo de fecha********////////////
            $fecha_colecta=substr($data['fecha_colecta'], 6, 4)."-".substr($data['fecha_colecta'], 3, 2)."-".substr($data['fecha_colecta'], 0, 2);
            //////*******************///////////
            global $error;

            $table = new Table($this->db, 'colecta');
            if($data['id_colecta']){
                $table->find($data['id_colecta']);

            }
            $table->localidad = $data['localidad'];
            $table->lugar = $data['lugar'];
            $table->hora_salida = $data['hora_salida'];
            $table->chofer = $data['chofer'];
            $table->movil = $data['movil'];
            $table->hora_inicio = $data['hora_inicio'];
            $table->hora_fin = $data['hora_fin'];
            $table->donantes_estimados = $data['donantes_estimados'];
            $table->contacto = $data['contacto'];
            $table->fecha_creacion = date('Y-m-d H:i:s');
            $table->fecha_colecta = $fecha_colecta;
            $table->usuario = $_SESSION['id'];
            if($table->save()){
                return $table->id_colecta;
            }
            else
                return false;
        }
        function save_resultado_colecta($data){

            global $error;

            $table = new Table($this->db, 'colecta_resultado');
            if($data['id_colecta']){
                $table->find($data['id_colecta']);
            }
            $table->preparacion = $data['preparacion'];
            $table->obs_preparacion = $data['obs_preparacion'];
            $table->material = $data['material'];
            $table->obs_materiales = $data['obs_materiales'];
            $table->limpieza_movil = $data['limpieza_movil'];
            $table->don_asistidos = $data['don_asistidos'];
            $table->don_diferidos = $data['don_diferidos'];
            $table->extracciones = $data['extracciones'];
            $table->don_reactivos = $data['don_reactivos'];
            $table->don_informados = $data['don_informados'];
            $table->unidades_bajo_vol = $data['unidades_bajo_vol'];
            $table->muestras_analiticas = $data['muestras_analiticas'];
            $table->efectos_adversos = $data['efectos_adversos'];
            $table->condicion_lugar = $data['condicion_lugar'];
            $table->ventilacion = $data['ventilacion'];
            $table->iluminacion = $data['iluminacion'];
            $table->observaciones = $data['observaciones'];
            $table->fecha_alta = date('Y-m-d H:i:s');
            $table->usuario = $_SESSION['id'];
            if($table->save()){
                return $table->id_colecta;
            }
            else
                return false;
        }
        function save_resultado_hemovigilancia($data){

        global $error;

        $table = new Table($this->db, 'colecta_resultado');
        if($data['id_colecta']){
            $table->find($data['id_colecta']);
        }

        $table->don_reactivos = $data['don_reactivos'];
        $table->don_informados = $data['don_informados'];

        if($table->save()){
            return $table->id_colecta;
        }
        else
            return false;
    }
        function save_detalle_capacitacion($id_capacitacion, $id_persona){
            global $error;
            $table = new Table($this->db, 'capacitacion_detalle');
            $table->id_capacitacion = $id_capacitacion;
            $table->id_persona = $id_persona;

            if($table->save()){
                return $table->id_detalle_capacitacion;
            }
		else
                    return false;
        }
        function save_pre_detalle_capacitacion($id_pre_capacitacion, $id_persona){
            global $error;
            $table = new Table($this->db, 'pre_capacitacion_detalle');
            $table->id_pre_capacitacion = $id_pre_capacitacion;
            $table->id_persona = $id_persona;

            if($table->save()){
                return $table->id_pre_detalle_capacitacion;
            }
            else
                return false;
        }
        function save_detalle_colecta($id_colecta, $id_persona){
            global $error;
            $table = new Table($this->db, 'colecta_detalle');
            $table->id_colecta = $id_colecta;
            $table->id_persona = $id_persona;

            if($table->save()){
                return $table->id_detalle_colecta;
            }
            else
                return false;
        }
        function getCapacitaciones(){

		$query = "SELECT c.*, date_format(c.fecha_creacion, '%d/%m/%Y %H:%i') as fecha_creacion, date_format(c.fecha_capacitacion, '%d/%m/%Y') as fecha_capacitacion, p.descripcion poe,CONCAT_WS(' ', pr.apellido, pr.nombre) nombre_capacitador "
                        . " FROM capacitacion c  "
                        . " LEFT JOIN poe_cabecera p ON p.id_poe=c.id_poe "
                        . " LEFT JOIN usuarios u ON u.id_usuario=c.usuario "
                        . " LEFT JOIN personas pr ON pr.id_persona=u.id_persona "
                        . " WHERE 1 ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	    }
        function getPreCapacitaciones(){

            $query = "SELECT c.*, date_format(c.fecha_creacion, '%d/%m/%Y %H:%i') as fecha_creacion, date_format(c.fecha_pre_capacitacion, '%d/%m/%Y %H:%i') as fecha_pre_capacitacion,CONCAT_WS(' ', pr.apellido, pr.nombre) nombre_capacitador "
                . " FROM pre_capacitacion c  "
                . " LEFT JOIN usuarios u ON u.id_usuario=c.usuario "
                . " LEFT JOIN personas pr ON pr.id_persona=u.id_persona "
                . " WHERE 1 ";
            //echo $query;
            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getColectas(){

            $query = "SELECT c.*, date_format(c.fecha_creacion, '%d/%m/%Y %H:%i') as fecha_creacion,c.fecha_colecta fecha_sf,
             date_format(c.fecha_colecta, '%d/%m/%Y') as fecha_colecta,CONCAT_WS(' ',p.apellido,p.nombre )  responsable "
                . " FROM colecta c
                 INNER JOIN usuarios u ON u.id_usuario=c.usuario
                 INNER JOIN personas p ON p.id_persona=u.id_persona"
                . " WHERE 1 ORDER BY fecha_sf DESC";
            //echo $query;
            $result = $this->db->loadObjectList($query);
            if($result)
                return $result;
            else
                return false;
        }
        function getIntegrantesCapacitaciones($capacitacion){

		$query = "SELECT CONCAT_WS(' ',p.apellido,p.nombre) integrante, c.id_persona"
                        . " FROM capacitacion_detalle c  "
                        . " LEFT JOIN personas p ON p.id_persona=c.id_persona "
                        . " WHERE c.id_capacitacion='".$capacitacion."' ";
		//echo $query;
                $result = $this->db->loadObjectList($query);
		if($result)
			return $result;
		else
			return false;
	    }
    function getIntegrantesPreCapacitaciones($pre_capacitacion){

        $query = "SELECT CONCAT_WS(' ',p.apellido,p.nombre) integrante, c.id_persona"
            . " FROM pre_capacitacion_detalle c  "
            . " LEFT JOIN personas p ON p.id_persona=c.id_persona "
            . " WHERE c.id_pre_capacitacion='".$pre_capacitacion."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getIntegrantescolecta($colecta){

        $query = "SELECT CONCAT_WS(' ',p.apellido,p.nombre) integrante, c.id_persona"
            . " FROM colecta_detalle c  "
            . " LEFT JOIN personas p ON p.id_persona=c.id_persona "
            . " WHERE c.id_colecta='".$colecta."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getCapacitacionByID($capacitacion){

        $query = "SELECT c.* ,date_format(c.fecha_capacitacion, '%d/%m/%Y') as fecha_capacitacion,p.descripcion poe "
            . " FROM capacitacion c  "
            . " LEFT JOIN poe_cabecera p ON p.id_poe=c.id_poe "
            . " WHERE c.id_capacitacion='".$capacitacion."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getPreCapacitacionByID($precapacitacion){

        $query = "SELECT c.* ,date_format(c.fecha_pre_capacitacion, '%d/%m/%Y') as fecha_pre_capacitacion,date_format(c.fecha_pre_capacitacion, '%H:%i') as hora_pre_capacitacion "
            . " FROM pre_capacitacion c "
            . " WHERE c.id_pre_capacitacion='".$precapacitacion."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getColectaByID($colecta){

        $query = "SELECT c.* ,date_format(c.fecha_colecta, '%d/%m/%Y') as fecha_colecta "
            . " FROM colecta c  "
            . " WHERE c.id_colecta='".$colecta."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getResultadoColectaByID($colecta){

        $query = "SELECT rc.* "
            . " FROM bstb.colecta_resultado rc  "
            . " WHERE rc.id_colecta='".$colecta."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getUsuarioHemovigilancia(){

        $query = "SELECT COUNT(rc.id_registro) total "
            . " FROM bstb.usuario_hemovigilancia rc  "
            . " WHERE rc.id_usuario='".$_SESSION['id']."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function save_examen_practico($data){
        //////************formateo de fecha********////////////
        $fecha_examen=substr($data['fecha_examen_practico'], 6, 4)."-".substr($data['fecha_examen_practico'], 3, 2)."-".substr($data['fecha_examen_practico'], 0, 2);
        //////*******************///////////
        global $error;

        $table = new Table($this->db, 'examen_practico');
        if($data['id_examen_practico']){
            $table->find($data['id_examen_practico']);

        }
        $table->id_poe = $data['poeID'];
        $table->id_persona = $data['personaID'];
        $table->capacitador = $data['evaluador'];
        $table->calificacion = $data['calificacion'];
        $table->observacion = $data['observacion'];
        $table->fecha_creacion = date('Y-m-d');
        $table->fecha_examen = $fecha_examen;
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            return $table->id_examen_practico;
        }
        else
            return false;
    }
    function getExamenPracticoById($ide){
        $query = "SELECT e.*,date_format(e.fecha_examen, '%d/%m/%Y') as fecha_examen, CONCAT_WS(' ',p.apellido,p.nombre) persona,pc.descripcion poe  FROM examen_practico e "
        . " inner join poe_cabecera pc on pc.id_poe=e.id_poe "
        . " inner join personas p on p.id_persona=e.id_persona  WHERE e.id_examen_practico='".$ide."'" ;
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getExamenPractico(){
        $query = "SELECT e.*,date_format(e.fecha_examen, '%d/%m/%Y') as fecha_examen, CONCAT_WS(' ',p.apellido,p.nombre) persona,pc.descripcion poe,CONCAT_WS(' ', pr.apellido, pr.nombre) nombre_capacitador  FROM examen_practico e "
        . " inner join poe_cabecera pc on pc.id_poe=e.id_poe "
        . " LEFT JOIN usuarios u ON u.id_usuario=e.usuario "
        . " LEFT JOIN personas pr ON pr.id_persona=u.id_persona "
        . " inner join personas p on p.id_persona=e.id_persona " ;
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getPoesProceso($id_proceso){
        //session_start();
        $query = "SELECT *, date_format(fecha_version, '%d/%m/%Y') as fecha_version  "
            . "FROM poe_cabecera a "
            ."INNER JOIN  relacion_area_poe pa ON pa.id_poe=a.id_poe";

        $query .=  " WHERE a.estado='A' ";

            $query .=  " AND pa.id_area='".$id_proceso."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function busca_capacitacion_persona($id_poe, $persona){
        //session_start();
        $query = "SELECT COUNT(c.id_capacitacion) total  "
            . "FROM capacitacion c "
            ."INNER JOIN  capacitacion_detalle cd ON cd.id_capacitacion=c.id_capacitacion";

        $query .=  " AND c.id_poe='".$id_poe."' AND cd.id_persona='".$persona."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function busca_id_usuario($persona){
        //session_start();
        $query = "SELECT u.id_usuario  "
            . "FROM usuarios u ";

        $query .=  " WHERE u.id_persona='".$persona."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->id_usuario;
        else
            return false;
    }
    function busca_examen_teorico($id_poe, $usuario){
        //session_start();
        $query = "SELECT calificacion   "
            . "FROM examen e "
            ."INNER JOIN  examen_calificacion_usuario uc ON uc.id_examen=e.id_examen";

        $query .=  " AND e.id_poe='".$id_poe."' AND uc.id_usuario='".$usuario."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->calificacion;
        else
            return false;
    }
    function busca_examen_practico($id_poe, $persona){
        //session_start();
        $query = "SELECT calificacion   "
            . "FROM examen_practico e ";

        $query .=  " WHERE e.id_poe='".$id_poe."' AND e.id_persona='".$persona."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->calificacion;
        else
            return false;
    }
    /*********************/
    function save_competencia($data){
        global $error;

        $table = new Table($this->db, 'competencia');
        if($data['id_competencia']){
            $table->find($data['id_competencia']);
        }
        $table->id_persona = $data['personaID'];
        $table->id_proceso = $data['procesoID'];
        /****************************/
        if($data['educacion']){
            $table->educacion = "Si";
        }else{
            $table->educacion = "No";
        }
        /****************************/
        if($data['habilidades']){
            $table->habilidades = "Si";
        }else{
            $table->habilidades = "No";
        }
        /****************************/
        if($data['experiencia']){
            $table->experiencia = "Si";
        }else{
            $table->experiencia = "No";
        }
        /****************************/

        $table->competencia = $data['competencia'];
        $table->observacion = $data['observacion'];
        $table->fecha_carga = date('Y-m-d');
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            return $table->id_aplicativo;
        }
        else

            return false;
    }
    function getCompetenciaByID($id_competencia){
        //session_start();
        $query = "SELECT c.*,a.descripcion proceso  ,date_format(c.fecha_carga, '%d/%m/%Y') as fecha_carga, CONCAT_WS(' ',p.apellido,p.nombre) persona  "
            . " FROM competencia  c
            INNER JOIN areas a ON a.id_area=c.id_proceso
            INNER JOIN personas p on p.id_persona=c.id_persona";

        $query .=  " WHERE c.id_competencia='".$id_competencia."'";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getCompetencia(){
        //session_start();
        $query = "SELECT c.*,date_format(c.fecha_carga, '%d/%m/%Y') as fecha_carga, CONCAT_WS(' ',p.apellido,p.nombre) persona,a.descripcion proceso   "
            . "FROM competencia  c
            INNER JOIN areas a ON a.id_area=c.id_proceso
             INNER JOIN personas p on p.id_persona=c.id_persona";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getExamenPracticoByFiltro($id_poe=null, $id_persona=null){
        $query = "SELECT e.*,date_format(e.fecha_examen, '%d/%m/%Y') as fecha_examen, CONCAT_WS(' ',p.apellido,p.nombre) persona,pc.descripcion poe,CONCAT_WS(' ', pr.apellido, pr.nombre) nombre_capacitador  FROM examen_practico e "
            . " inner join poe_cabecera pc on pc.id_poe=e.id_poe "
            . " LEFT JOIN usuarios u ON u.id_usuario=e.usuario "
            . " LEFT JOIN personas pr ON pr.id_persona=u.id_persona "
            . " inner join personas p on p.id_persona=e.id_persona
            WHERE 1 " ;
        if($id_poe){
        $query .=  " AND e.id_poe='".$id_poe."'";
        }
        if($id_persona) {
            $query .= " AND e.id_persona='".$id_persona."'";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getCompetenciaByFiltro($id_proceso=null, $id_persona=null){
        $query = "SELECT c.*,date_format(c.fecha_carga, '%d/%m/%Y') as fecha_carga, CONCAT_WS(' ',p.apellido,p.nombre) persona,a.descripcion proceso   "
            . "FROM competencia  c
            INNER JOIN areas a ON a.id_area=c.id_proceso
             INNER JOIN personas p on p.id_persona=c.id_persona
            WHERE 1 " ;
        if($id_proceso){
            $query .=  " AND c.id_proceso='".$id_proceso."'";
        }
        if($id_persona) {
            $query .= " AND c.id_persona='".$id_persona."'";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getCapacitacionesByFiltro($id_poe=null, $id_persona=null){

        $query = "SELECT c.*, date_format(c.fecha_creacion, '%d/%m/%Y %H:%i') as fecha_creacion, date_format(c.fecha_capacitacion, '%d/%m/%Y') as fecha_capacitacion, p.descripcion poe,CONCAT_WS(' ', pr.apellido, pr.nombre) nombre_capacitador "
            . " FROM capacitacion c  "
            . " LEFT JOIN poe_cabecera p ON p.id_poe=c.id_poe "
            . " LEFT JOIN usuarios u ON u.id_usuario=c.usuario "
            . " LEFT JOIN personas pr ON pr.id_persona=u.id_persona ";
        if($id_persona) {
            $query .= "  LEFT JOIN capacitacion_detalle cd ON cd.id_capacitacion=c.id_capacitacion ";
        }
        $query .= "  WHERE 1 ";
        if($id_poe){
            $query .=  " AND c.id_poe='".$id_poe."'";
        }
        if($id_persona) {
            $query .= " AND cd.id_persona='".$id_persona."'";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    /*********************/
    //////////////////********************/////////////////7
    function save_no_conformidad($data,$nombre_archivo=null){
        $table = new Table($this->db, 'no_conformidad');
        //////************formateo de fecha********////////////
        $fecha_no_conformidad=substr($data['fecha_no_conformidad'], 6, 4)."-".substr($data['fecha_no_conformidad'], 3, 2)."-".substr($data['fecha_no_conformidad'], 0, 2);
        //////*******************///////////
        if($data['id_no_conformidad']){
            $table->find($data['id_no_conformidad']);
        }else{
            $table->estado = 'N';
        }
        $table->id_proceso = $data['procesoID'];
        $table->id_sector = $data['sectorID'];
        $table->categoria = $data['categoriaID'];
        $table->tipo = $data['tipo'];
        $table->tema = $data['tema'];

        $table->origen = $data['origen'];
        $table->id_poe = $data['poeID'];
        $table->otro_requisito = $data['otro_requisito'];
        $table->descripcion = $data['descripcion'];

        $table->fecha_no_conformidad = $fecha_no_conformidad." ".$data['hora_deteccion'].":00";
        $table->fecha_creacion = date('Y-m-d');
        $table->archivo = $nombre_archivo;
        $table->usuario = $_SESSION['id'];

        if($table->save()){
            return $table->id_no_conformidad;
        }else{
            return 0;
        }
    }

    function getNoConformidadByFiltro($id_proceso=null, $id_sector=null, $estado=null, $tipo=null, $fecha_desde=null, $fecha_hasta=null, $origen=null, $numero=null, $nivel_riesgo=null){
        $query = "SELECT p.*,date_format(p.fecha_no_conformidad, '%d/%m/%Y') as fecha,
        date_format(p.fecha_no_conformidad, '%H:%i') as hora, s.descripcion sector ,
        sd.descripcion sector_derivado_desc,a.descripcion proceso , ncp.descripcion respuesta,
        ncp.descripcion_analisis,ncp.descripcion_accion,
        date_format(ncp.fecha_accion, '%d/%m/%Y') as fecha_accion ,
        CONCAT_WS(' ', ps.nombre, ps.apellido ) responsable,
        CONCAT_WS(' ', prs.nombre, prs.apellido ) responsable_sector ,
        CONCAT_WS(' ', i.nombre, i.apellido ) informador,CASE when  p.estado='N' then 1
          when p.estado='As' then 2
          when p.estado='R' then 3
          when p.estado='V' then 4
          when p.estado='C' then 5
          when p.estado='A' then 6
            end as nombre_estado "
            . "FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas prs on prs.id_persona=rs.id_persona
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion
            LEFT JOIN usuarios u on u.id_usuario=p.usuario
            LEFT JOIN personas i on i.id_persona=u.id_persona
            WHERE 1 " ;
        if($id_proceso){
            $query .=  " AND p.id_proceso='".$id_proceso."'";
        }
        if($id_sector) {
            $query .= " AND p.id_sector='".$id_sector."'";
        }
        if($estado) {
            $query .= " AND p.estado='".$estado."'";
        }
        if($tipo) {
            $query .= " AND p.tipo='".$tipo."'";
        }
        if($origen) {
            $query .= " AND p.origen='".$origen."'";
        }
        if($numero) {
            $query .= " AND p.id_no_conformidad='".$numero."'";
        }
        if($nivel_riesgo) {
            $query .= " AND p.nivel_riesgo='".$nivel_riesgo."'";
        }
        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND p.fecha_no_conformidad>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND p.fecha_no_conformidad<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (p.fecha_no_conformidad between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
        $query .= " ORDER BY nombre_estado ASC, p.fecha_no_conformidad DESC";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getNoConformidadByUsuario(){
        $query = "SELECT p.*,date_format(p.fecha_no_conformidad, '%d/%m/%Y') as fecha, date_format(p.fecha_no_conformidad, '%H:%i') as hora, s.descripcion sector, sd.descripcion sector_derivado ,a.descripcion proceso , ncp.descripcion respuesta,ncp.descripcion_analisis,ncp.descripcion_accion,date_format(ncp.fecha_accion, '%d/%m/%Y') as fecha_accion ,CONCAT_WS(' ', ps.nombre, ps.apellido ) responsable, CONCAT_WS(' ', rsd.nombre, rsd.apellido ) responsable_sector,CASE when  p.estado='N' then 1
  when p.estado='As' then 2
  when p.estado='R' then 3
  when p.estado='V' then 4
  when p.estado='C' then 5
  when p.estado='A' then 6
    end as nombre_estado "
            . "FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
             LEFT JOIN sector s on s.id_sector=p.id_sector
             LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion

            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
             LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN personas rsd on rsd.id_persona=rs.id_persona
            WHERE p.usuario='".$_SESSION[id]."' GROUP BY p.id_no_conformidad ORDER BY nombre_estado ASC , p.fecha_no_conformidad  DESC " ;

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getNoConformidadByUsuarioNuevas(){
        $query = "SELECT p.*,date_format(p.fecha_no_conformidad, '%d/%m/%Y') as fecha, date_format(p.fecha_no_conformidad, '%H:%i') as hora, s.descripcion sector ,a.descripcion proceso , ncp.descripcion respuesta,ncp.descripcion_analisis,ncp.descripcion_accion,date_format(ncp.fecha_accion, '%d/%m/%Y') as fecha_accion ,CONCAT_WS(' ', ps.nombre, ps.apellido ) responsable, CONCAT_WS(' ', rsd.nombre, rsd.apellido ) responsable_sector "
            . "FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
             LEFT JOIN sector s on s.id_sector=p.id_sector
             LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion

            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas rsd on rsd.id_persona=rs.id_persona
            WHERE p.usuario='".$_SESSION[id]."'  GROUP BY p.id_no_conformidad " ;

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getSectores(){
        $query = "SELECT e.*, s.descripcion servicio "
            . " FROM sector e
            LEFT JOIN servicio s ON s.id_servicio=e.id_servicio"
            . " WHERE 1 ORDER BY e.descripcion ASC";

        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getmenues(){
        $query = "SELECT e.* "
            . " FROM menu e "
            . " WHERE 1 ORDER BY e.descripcion ASC";
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getSectorByID($idSector){
        $query = "SELECT e.* "
            . " FROM sector e "
            . " WHERE  1 AND e.id_sector='".$idSector."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result[0];
        else return 0;
    }
    function getMenuByID($idmenu){
        $query = "SELECT e.* "
            . " FROM menu e "
            . " WHERE  1 AND e.id_menu='".$idmenu."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result[0]->descripcion;
        else return 0;
    }
    function save_sector($data){
        global $error;

        $table = new Table($this->db, 'sector');
        if($data['id_sector']){
            $table->find($data['id_sector']);
        }
        $table->id_servicio = $data['id_servicio'];
        $table->descripcion = ucwords($data['descripcion']);

        $table->estado = 'A';

        if($table->save()){
            return $table->id_lugar;
        }
        else

            return false;
    }
    function save_menu($data){
        global $error;

        $table = new Table($this->db, 'menu');
        if($data['id_menu']){
            $table->find($data['id_menu']);
        }

        $table->descripcion = ucwords($data['descripcion']);

        $table->estado = 'A';

        if($table->save()){
            return $table->id_menu;
        }
        else

            return false;
    }
    function save_responsable_sector($data){
        $table = new Table($this->db, 'responsable_sector');

        if($data['id_relacion']){
            $table->find($data['id_relacion']);
        }
        $table->id_sector = $data['sectorID'];
        $table->id_persona = $data['personaID'];

        if($table->save()){
            return $table->id_relacion;
        }else{
            return 0;
        }
    }

    function getResponsablesByID($id_relacion){
        $query = "SELECT CONCAT_WS(' ', r.apellido, r.nombre) persona, s.descripcion sector, rs.*  "
            . "FROM responsable_sector rs
            LEFT JOIN personas r ON r.id_persona=rs.id_persona
            LEFT JOIN sector s on s.id_sector=rs.id_sector
            WHERE 1 " ;
        if($id_relacion){
            $query .=  " AND rs.id_relacion='".$id_relacion."'";
        }
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getResponsables($id_sector=null, $id_persona=null){
        $query = "SELECT CONCAT_WS(' ', r.apellido, r.nombre) persona, s.descripcion sector ,rs.id_relacion "
            . "FROM responsable_sector rs
            LEFT JOIN personas r ON r.id_persona=rs.id_persona
            LEFT JOIN sector s on s.id_sector=rs.id_sector
            WHERE 1 " ;
        if($id_persona){
            $query .=  " AND rs.id_persona='".$id_persona."'";
        }
        if($id_sector) {
            $query .= " AND rs.id_sector='".$id_sector."'";
        }
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getMisNoConformidades(){
        $query = "SELECT p.*,date_format(p.fecha_no_conformidad, '%d/%m/%Y') as fecha, s.descripcion sector ,a.descripcion proceso, CONCAT_WS(' ', pi.apellido, pi.nombre) usuario_informador "
            . "FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas pr on pr.id_persona=rs.id_persona
            LEFT JOIN usuarios u on u.id_persona=pr.id_persona
            LEFT JOIN usuarios uc on uc.id_usuario=p.usuario
            LEFT JOIN personas pi on pi.id_persona=uc.id_persona
            WHERE 1 AND u.id_usuario='".$_SESSION['id']."' ORDER BY fecha_no_conformidad DESC " ;

        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getNoConformidadById($id_no_conformidad=null){
        $query = "SELECT p.*,date_format(p.fecha_no_conformidad, '%d/%m/%Y') as fecha, date_format(p.fecha_no_conformidad, '%H:%i') as hora, s.descripcion sector, s2.descripcion sector_derivado_nombre ,a.descripcion proceso, ncp.descripcion respuesta,ncp.descripcion_analisis analisis,ncp.descripcion_accion accion,pc.descripcion poe  "
            . "FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector s2 on s2.id_sector=p.sector_derivado
            LEFT JOIN poe_cabecera pc on pc.id_poe=p.id_poe
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad

            WHERE 1 " ;
        if($id_no_conformidad){
            $query .=  " AND p.id_no_conformidad='".$id_no_conformidad."'";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getRespuestaNoConformidad($id_no_conformidad=null){
        $query = "SELECT rnc.*, date_format(rnc.fecha_accion, '%d/%m/%Y') as fecha_accion, date_format(rnc.fecha_control_correcion, '%d/%m/%Y') as fecha_control_correcion ,CONCAT_WS(' ', p.nombre, p.apellido ) responsable "
            . "FROM no_conformidad_respuesta  rnc
            LEFT JOIN personas p ON p.id_persona= rnc.responsable_accion
            WHERE 1 " ;
        if($id_no_conformidad){
            $query .=  " AND rnc.id_no_conformidad='".$id_no_conformidad."'";
        }
        // echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function save_respuesta_nc($data){
        $table = new Table($this->db, 'no_conformidad_respuesta');
        //////////
        $fecha_accion=substr($data['fecha_accion'], 6, 4)."-".substr($data['fecha_accion'], 3, 2)."-".substr($data['fecha_accion'], 0, 2);
        $fecha_control_correcion=substr($data['fecha_control_correcion'], 6, 4)."-".substr($data['fecha_control_correcion'], 3, 2)."-".substr($data['fecha_control_correcion'], 0, 2);

        //////////
        if($data['id_respuesta_nc']){
            $table->find($data['id_respuesta_nc']);
        }else{
            $table->fecha_respuesta = date('Y-m-d H:i:s');
        }
        $table->id_no_conformidad = $data['id_no_conformidad'];
        $table->descripcion = $data['descripcion'];
        $table->descripcion_analisis = $data['descripcion_analisis'];
        $table->descripcion_accion = $data['descripcion_accion'];
        $table->fecha_accion = $fecha_accion;
        $table->fecha_control_correcion = $fecha_control_correcion;
        $table->responsable_accion = $data['personaID'];
        $table->fecha_modificacion= date('Y-m-d H:i:s');
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            return $table->id_respuesta_nc;
        }else{
            return 0;
        }
    }
    function getDatosUnidadByID($numeroUnidad=null){
        $query = "SELECT d.iddonante, d.nrodonante, CONCAT_WS(' ',dp.nombre,dp.apellidosoltero) paciente, dp.domicilio  "
            . "FROM donaciones  d
            INNER JOIN datos_personales dp ON dp.idpersona=d.idpersona
            WHERE d.nro_muestra_diana='".$numeroUnidad."'";
        $result = $this->dbPg->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getDeterminaciones(){
        $query = "SELECT d.*  "
            . "FROM determinaciones  d ";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }/*********************/
    function save_persona_hemotrans($data){
        global $error;

        $table = new Table($this->dbPg, 'datos_personales');
        if($data['idpersona']){
            $table->find($data['idpersona']);
        }
        $fecha_nac=substr($data['fecha_nacimiento'], 6, 4)."-".substr($data['fecha_nacimiento'], 3, 2)."-".substr($data['fecha_nacimiento'], 0, 2);
        $table->nombre = ucwords($data['nombre']);
        $table->apellidosoltero = ucwords($data['apellido']);
        $table->nrodocumento = $data['dni'];
        $table->fechanacimiento =  $fecha_nac;
        $table->sexo = $data['sexo'];
        $table->domicilio = $data['domicilio'];
        $table->idlocalidad = $data['idlocalidad'];
        $table->idprovincia = $data['idprovincia'];
        $table->idpais = $data['idpais'];

        $table->fecha_ultima_modificacion = date('Y-m-d H:i:s');
        $table->fecha_alta = date('Y-m-d H:i:s');
        $table->usuario = $_SESSION['id'];
        $table->id_dominio = 1;
        if($table->save()){
            return $table->id_persona;
        }
        else

            return false;
    }
    function getPoesSinExamen(){
        //session_start();
        $query = "SELECT pc.*
                FROM poe_cabecera pc LEFT JOIN examen e ON e.id_poe=pc.id_poe
                WHERE e.id_poe IS NULL";

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getServicios(){

        $query = "SELECT s.* FROM servicio s
                  WHERE s.estado='A' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getServicioByID($idServicio){
        $query = "SELECT e.* "
            . " FROM servicio e "
            . " WHERE  1 AND e.id_servicio='".$idServicio."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result[0];
        else return 0;
    }
    function save_servicio($data){
        global $error;

        $table = new Table($this->db, 'servicio');
        if($data['id_servicio']){
            $table->find($data['id_servicio']);
        }

        $table->descripcion = ucwords($data['descripcion']);

        $table->estado = 'A';

        if($table->save()){
            return $table->id_lugar;
        }
        else

            return false;
    }
    function getPersonasEquipo($quipo, $persona=null){

        $query = "SELECT s.*, CONCAT_WS(' ', p.nombre, p.apellido ) nombre
                    FROM equipo_encargados s
                    INNER JOIN personas p ON p.id_persona=s.id_persona
                  WHERE id_equipo='".$quipo."' ";
        if($persona){
            $query .= " AND s.id_persona='".$persona."'";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getPersonasRol($rol){

        $query = "SELECT p.id_persona, CONCAT_WS(' ', p.nombre, p.apellido ) nombre
                    FROM  personas p
                  WHERE rol='".$rol."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function SaveRelacionEquipoPersonas($data){
        $table = new Table($this->db, 'equipo_encargados');
        $table->id_persona = $data['persona'];
        $table->tipo_mantenimiento = $data['tipo'];
        $table->id_equipo = $data['equipo'];
        if($table->save()){
            return $table->id_relacion;
        }else{
            return 0;
        }
    }
    function getUsuarios(){
        $query = "SELECT u.*, u.nombre usuario,concat_ws(p.apellido,' ',p.nombre) persona,date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nac 
                FROM usuarios u
                INNER JOIN personas p ON u.id_persona=p.id_persona
                WHERE u.estado='A' ORDER BY p.apellido, p.nombre";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getDatosUsuario(){
        $query = "SELECT u.*,p.*, u.nombre usuario,concat_ws(p.apellido,' ',p.nombre) persona,date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nac,date_format(fecha_ingreso, '%d/%m/%Y') as fecha_ing FROM usuarios u
                INNER JOIN personas p ON u.id_persona=p.id_persona
                WHERE u.id_usuario='".$_SESSION[id]."'";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getGuardias($fecha_desde=null,$fecha_hasta=null){
        $query = "SELECT ug.*, concat_ws(' ',p.apellido,p.nombre) persona,date_format(ug.fecha_guardia, '%d/%m/%Y') as fecha_guardia,l.descripcion lugar
        FROM guardia_tecnicos ug
                INNER JOIN personas p ON p.id_persona=ug.id_persona
                LEFT JOIN lugar_guardia l ON l.id_lugar_guardia=ug.id_lugar
                WHERE 1 ";

        if($fecha_desde==null && $fecha_hasta==null){
            $query .=" AND date_format(ug.fecha_guardia, '%m/%Y')='".date('m/Y')."'";
        }
        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND ug.fecha_guardia>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND ug.fecha_guardia<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (ug.fecha_guardia between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
                //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getGuardiasByID($_dato){
        $query = "SELECT ug.*, concat_ws(' ',p.apellido,p.nombre) persona,date_format(ug.fecha_guardia, '%d/%m/%Y') as fecha_guardia ,l.descripcion lugar
        FROM guardia_tecnicos ug
                INNER JOIN personas p ON p.id_persona=ug.id_persona
                LEFT JOIN lugar_guardia l ON l.id_lugar_guardia=ug.id_lugar
                WHERE ug.id_registro='".$_dato."'";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function save_guardias($data){

        $fecha_guardia=substr($data['fecha_guardia'], 6, 4)."-".substr($data['fecha_guardia'], 3, 2)."-".substr($data['fecha_guardia'], 0, 2);
        $table = new Table($this->db, 'guardia_tecnicos');

        if($data['id_guardia']){
            $table->find($data['id_guardia']);
            $table->fecha_carga = date('Y-m-d H:i:s');
        }else{
            $table->fecha_carga = date('Y-m-d H:i:s');
        }

        $table->id_persona = $data['id_persona'];
        $table->id_lugar = $data['id_lugar'];
        $table->hora_desde = $data['hora_desde'];
        $table->hora_hasta = $data['hora_hasta'];
        $table->tipo_guardia = $data['tipo_guardia'];
        $table->fecha_guardia = $fecha_guardia;
        $table->usuario = $_SESSION['id'];

        if($table->save()){
            return $table->id_registro;
        }else{
            return 0;
        }
    }
    function save_lugar_guardia($data){

        $table = new Table($this->db, 'lugar_guardia');
        if($data['id_lugar_guardia']){
            $table->find($data['id_lugar_guardia']);
        }
        $table->descripcion = $data['descripcion'];
        $table->estado = 'A';
        if($table->save()){
            return $table->id_lugar_guardia;
        }else{
            return 0;
        }
    }//
    function getLugarGuardia(){

        $query = "SELECT s.* FROM lugar_guardia s
                  WHERE s.estado='A' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getLugarGuardiaByID($idlugarguardia){
        $query = "SELECT e.* "
            . " FROM lugar_guardia e "
            . " WHERE  1 AND e.id_lugar_guardia='".$idlugarguardia."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result[0];
        else return 0;
    }
    function getGuardiasUsuario(){
        $query = "SELECT ug.*,date_format(ug.fecha_guardia, '%d/%m/%Y') as fecha_guardia ,l.descripcion lugar
        FROM guardia_tecnicos ug
                LEFT JOIN lugar_guardia l ON l.id_lugar_guardia=ug.id_lugar
                LEFT JOIN usuarios u ON u.id_persona=ug.id_persona
                WHERE u.id_usuario='".$_SESSION['id']."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getMantenimientosBySector($sector=null, $tipo=null, $tipo_equipo=null){
        $query = "SELECT DISTINCT(mi.id_registro), mi.tipo_mantenimiento, te.descripcion tipo_equipo, mi.titulo,mi.descripcion mantenimiento, s.descripcion sector,mi.frecuencia
FROM mantenimiento_item_tipo_equipo mi
INNER JOIN tipo_equipo te ON te.id_tipo_equipo=mi.id_tipo_equipo
INNER JOIN equipos e ON e.tipo_equipo=te.id_tipo_equipo
INNER JOIN sector s ON s.id_sector=e.id_sector WHERE 1";
        if($sector){
            $query .= " AND s.id_sector='".$sector."'";
        }
        if($tipo){
            $query .= " AND mi.tipo_mantenimiento='".$tipo."'";
        }
        if($tipo_equipo){
            $query .= " AND e.tipo_equipo='".$tipo_equipo."'";
        }
        $query .= " ORDER BY tipo_equipo, tipo_mantenimiento, tipo";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getSolicitudesManteniemientos(){

        $query = "SELECT s.*, e.num_interno, t.armado,
        date_format(s.requerido_para, '%d/%m/%Y') as requerido_para,
        date_format(s.fecha_solicitud, '%d/%m/%Y %H:%i') as fecha_solicitud,
         date_format(s.fecha_derivado, '%d/%m/%Y %H:%i') as fecha_derivado,
        t.descripcion tipo_equipo, CONCAT_WS(' ',p.nombre,p.apellido) usuario,se.descripcion sector_des
         ,CASE when s.estado_solicitud='SOL' then 1
  when s.estado_solicitud='TRAT' then 2
  when s.estado_solicitud='CERR' then 3
  when s.estado_solicitud='VAL' then 4
  end as color_estado, pr.descripcion proveedor "
            . " FROM solicitud_mantenimiento s "
            . " LEFT JOIN equipos e ON e.id_equipo=s.id_equipo "
            . " LEFT JOIN tipo_equipo t ON t.id_tipo_equipo=e.tipo_equipo "
            . " LEFT JOIN usuarios u ON u.id_usuario=s.id_usuario "
            . " LEFT JOIN personas p ON p.id_persona=u.id_persona "
            . " LEFT JOIN sector se ON se.id_sector=s.id_sector "
            . " LEFT JOIN proveedor pr ON pr.id_proveedor=s.proveedor_derivado "
            . " WHERE 1 ORDER BY color_estado ASC, s.fecha_solicitud DESC ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getCapacitacionesUsuario(){
        $query = "SELECT c.*, date_format(c.fecha_creacion, '%d/%m/%Y %H:%i') as fecha_creacion, date_format(c.fecha_pre_capacitacion, '%d/%m/%Y') as fecha_pre_capacitacion,CONCAT_WS(' ', upr.apellido, upr.nombre) nombre_capacitador, date_format(c.fecha_pre_capacitacion, '%H:%i') as hora_pre_capacitacion "
            . " FROM pre_capacitacion c  "
            . " LEFT JOIN pre_capacitacion_detalle cd ON cd.id_pre_capacitacion=c.id_pre_capacitacion "
            . " LEFT JOIN usuarios uc ON uc.id_usuario=c.usuario "
            . " LEFT JOIN personas upr ON upr.id_persona=uc.id_persona "
            . " LEFT JOIN personas pr ON pr.id_persona=cd.id_persona "
            . " LEFT JOIN usuarios u ON u.id_persona=pr.id_persona "
            . " WHERE u.id_usuario='".$_SESSION['id']."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getProcesoPersona($id_pers){

        $query = "SELECT  a.descripcion area, pa.id_registro relacion"
            . " FROM persona_area pa "
            ." INNER JOIN areas a ON a.id_area=pa.id_area "
            ." WHERE pa.id_persona='".$id_pers."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return 0;
    }
    function save_proceso_persona($data){
        session_start();
        $table = new Table($this->db, 'persona_area');
        $table->id_persona = $data['personaID'];
        $table->id_area = $data['areaID'];
        $table->estado = 'A';
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            //return $table->id_examen;
        }else{
            return 0;
        }
    }
    function getPrimerNivel($idequipo){

        $query = "SELECT COUNT(m.id_registro) total, m.titulo "
            . " FROM mantenimiento_item_tipo_equipo m "
            . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=m.id_tipo_equipo"
            . " LEFT JOIN equipos e ON e.tipo_equipo=te.id_tipo_equipo"
            . " WHERE m.tipo_mantenimiento=1 AND e.id_equipo='".$idequipo."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return 0;
    }
    function getPreventivo($idequipo){
        $query = "SELECT COUNT(m.id_registro) total, m.titulo "
            . " FROM mantenimiento_item_tipo_equipo m "
            . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=m.id_tipo_equipo"
            . " LEFT JOIN equipos e ON e.tipo_equipo=te.id_tipo_equipo"
            . " WHERE m.tipo_mantenimiento=2 AND e.id_equipo='".$idequipo."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return 0;
    }
    function getCalibracion($idequipo){
        $query = "SELECT COUNT(m.id_registro) total, m.titulo "
            . " FROM mantenimiento_item_tipo_equipo m "
            . " LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=m.id_tipo_equipo"
            . " LEFT JOIN equipos e ON e.tipo_equipo=te.id_tipo_equipo"
            . " WHERE m.tipo_mantenimiento=3 AND e.id_equipo='".$idequipo."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return 0;
    }
    function getContadorPersona($idequipo){
        $query = "SELECT COUNT(m.id_relacion) total "
            . " FROM equipo_encargados m "
            . " WHERE m.id_equipo='".$idequipo."' ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return 0;
    }
    function getSolicitudByID($id_solicitud){

        $query = "SELECT s.*,e.num_interno,date_format(s.requerido_para, '%d-%m-%Y') as requerido_para,
        date_format(s.fecha_solicitud, '%d-%m-%Y') as fecha_solicitud,te.armado,te.descripcion,
         CONCAT_WS(' ',p.apellido,p.nombre) nombre_persona
        FROM solicitud_mantenimiento s

        LEFT JOIN equipos e ON e.id_equipo=s.id_equipo
        LEFT JOIN tipo_equipo te ON te.id_tipo_equipo=e.tipo_equipo
        LEFT JOIN usuarios u ON u.id_usuario=s.id_usuario
        LEFT JOIN personas p ON p.id_persona=u.id_persona
        WHERE s.id_solicitud='".$id_solicitud."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    /**********************************Solicitud Mantenieminto**********************************************/
    function save_solicitud_mantenimiento($data,$nombre_archivo){
        global $error;
        //////************formateo de fecha********////////////
        $requerido_para=substr($data['requerido_para'], 6, 4)."-".substr($data['requerido_para'], 3, 2)."-".substr($data['requerido_para'], 0, 2);
        //////*******************///////////
        $table = new Table($this->db, 'solicitud_mantenimiento');
        if($data['id_solicitud']){
            $table->find($data['id_solicitud']);
        }else{
            $table->fecha_solicitud = date('Y-m-d H:i:s');
            $table->estado_solicitud = 'SOL';
            $table->id_usuario = $_SESSION['id'];
        }
        $table->id_equipo = $data['id_equipo'];
        $table->id_sector = $data['id_sector'];
        $table->estado_equipo = $data['estado_equipo'];
        $table->requerido_para = $requerido_para;
        if($nombre_archivo){
            $table->archivo = $nombre_archivo;
        }
        $table->descripcion_falla = $data['descripcion_falla'];

        if($table->save()){
            return $table->id_solicitud;
        }
        else
            return false;
    }
    function getSolicitudesByUsuario(){

        $query = "SELECT s.*, e.num_interno, t.armado,
        date_format(s.requerido_para, '%d/%m/%Y') as requerido_para,
        date_format(s.fecha_solicitud, '%d/%m/%Y %H:%i') as fecha_solicitud,
        date_format(s.fecha_derivado, '%d/%m/%Y %H:%i') as fecha_derivado,
        t.descripcion tipo_equipo, CONCAT_WS(' ',p.nombre,p.apellido) usuario,se.descripcion sector_des
         ,CASE when s.estado_solicitud='SOL' then 1
  when s.estado_solicitud='TRAT' then 2
  when s.estado_solicitud='CERR' then 3
  when s.estado_solicitud='VAL' then 4
  end as color_estado, pr.descripcion proveedor "
            . " FROM solicitud_mantenimiento s "
            . " LEFT JOIN equipos e ON e.id_equipo=s.id_equipo "
            . " LEFT JOIN tipo_equipo t ON t.id_tipo_equipo=e.tipo_equipo "
            . " LEFT JOIN usuarios u ON u.id_usuario=s.id_usuario "
            . " LEFT JOIN personas p ON p.id_persona=u.id_persona "
            . " LEFT JOIN sector se ON se.id_sector=s.id_sector "
            . " LEFT JOIN proveedor pr ON pr.id_proveedor=s.proveedor_derivado "
            . " WHERE s.id_usuario='".$_SESSION['id']."' ORDER BY color_estado ASC, s.fecha_solicitud DESC ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getSolicitudesByUsuario_estado($estado){

        $query = "SELECT count(s.id_solicitud) total  FROM solicitud_mantenimiento s WHERE s.id_usuario='".$_SESSION['id']."'";
        //echo $query;
        if($estado){
            $query .= " AND s.estado_solicitud='".$estado."'";
        }
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getSolicitudesByUsuario_estadoSOL($estado){

        $query = "SELECT count(s.id_solicitud) total  FROM solicitud_mantenimiento s WHERE 1 ";
        //echo $query;
        if($estado){
            $query .= " AND s.estado_solicitud='".$estado."'";
        }
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }

    function save_nota_solicitud($data, $nombre, $proviene){
        global $error;
        //////************formateo de fecha********////////////
        //////*******************///////////
        $table = new Table($this->db, 'solicitud_mantenimiento_nota');
        $table->id_solicitud = $data['id_solicitud'];
        $table->nota = $data['observacion'];
        $table->archivo = $nombre;
        $table->proviene = $proviene;
        $table->fecha_hora_nota = date('Y-m-d H:i:s');
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            return $table->id_registro;
        }
        else
            return false;
    }
    function getNotasSolicitud($solicitud){
        $query = "SELECT s.*, date_format(fecha_hora_nota, '%d/%m/%Y %H:%i') as fecha_hora FROM solicitud_mantenimiento_nota s WHERE s.id_solicitud='".$solicitud."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getAplicativoSolicitudes(){

        $query = "SELECT count(s.id_registro) total  FROM usuario_aplicativos s WHERE id_aplicativo='64' AND s.id_usuario='".$_SESSION['id']."'";
        //echo $query;

        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getAplicativoSolicitudesCompra(){

        $query = "SELECT count(s.id_registro) total  FROM usuario_aplicativos s WHERE id_aplicativo='64' AND s.id_usuario='".$_SESSION['id']."'";
        //echo $query;

        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getCountSolicitudByIDEquipo($idequipo,$fecha_inicio=null){

        $query = "SELECT COUNT(id_solicitud) total"
            . " FROM solicitud_mantenimiento s "
            . " LEFT JOIN equipos e ON e.id_equipo=s.id_equipo"
            . " WHERE s.estado_solicitud!='VAL' AND s.estado_equipo='S' AND e.id_equipo='".$idequipo."'
            ";
        if($fecha_inicio){
            $query .= " AND (fecha_solicitud<'".$fecha_inicio." 00:00:00' OR fecha_solicitud='".$fecha_inicio."')";
        }

        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return 0;
    }
    function getSolicitudByIDEquipo($id_equipo){

        $query = "SELECT s.*, e.num_interno, t.armado,
        date_format(s.requerido_para, '%d/%m/%Y') as requerido_para,
        date_format(s.fecha_solicitud, '%d/%m/%Y') as fecha_solicitud,
        t.descripcion tipo_equipo, CONCAT_WS(' ',p.nombre,p.apellido) usuario,se.descripcion sector_des
         ,CASE when s.estado_solicitud='SOL' then 1
  when s.estado_solicitud='TRAT' then 2
  when s.estado_solicitud='CERR' then 3
  when s.estado_solicitud='VAL' then 4
  end as color_estado, pr.descripcion proveedor "
            . " FROM solicitud_mantenimiento s "
            . " LEFT JOIN equipos e ON e.id_equipo=s.id_equipo "
            . " LEFT JOIN tipo_equipo t ON t.id_tipo_equipo=e.tipo_equipo "
            . " LEFT JOIN usuarios u ON u.id_usuario=s.id_usuario "
            . " LEFT JOIN personas p ON p.id_persona=u.id_persona "
            . " LEFT JOIN sector se ON se.id_sector=s.id_sector "
            . " LEFT JOIN proveedor pr ON pr.id_proveedor=s.proveedor_derivado "
            . " WHERE s.id_equipo='".$id_equipo."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getMantenimientosByEquipoExistente($item, $mantenimiento, $idequipo){
        //if($tipoequipo!=0 && $mantenimiento!=0){
            $query = "SELECT COUNT(mc.id_mantenimiento) total "
                . " FROM mantenimiento_cabecera mc "
                . " LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento "
                . " WHERE 1 ";
            $query .= " AND mc.id_equipo='".$idequipo."' AND md.id_item='".$item."' AND mc.tipo_mantenimiento='".$mantenimiento."'" ;
        //}
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }

    function getMantenimientoEnDichaFecha($item, $fecha, $equipo){
        $fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        $query = "SELECT mc.id_mantenimiento,date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_debe, '%d-%m-%Y') as fecha_debe, fecha_debe as fecha_debe_sf
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND mc.fecha_deberia between '".$fecha_filtro." 00:00:00' AND '".$fecha_filtro." 23:59:59'";
        //echo $query."<br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoDebeTenerFecha($item, $fecha, $equipo){
        $fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_debe, '%d-%m-%Y') as fecha_debe, fecha_debe as fecha_debe_sf
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND mc.fecha_debe = '".$fecha_filtro."'";
        //echo $query."<br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoDebeTenerFechaPrev($item, $fecha, $equipo){
        $fecha_filtro=substr($fecha, 3, 4)."-".substr($fecha, 0, 2);
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_debe, '%d-%m-%Y') as fecha_debe, fecha_debe as fecha_debe_sf
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND date_format(mc.fecha_debe, '%Y-%m') = '".$fecha_filtro."'";
        //echo $query."<br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoDeberiaTenerFecha($item, $fecha, $equipo){
        $fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        $query = "SELECT mc.id_mantenimiento, date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_debe, '%d-%m-%Y') as fecha_debe, fecha_debe as fecha_debe_sf
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND mc.fecha_deberia = '".$fecha_filtro."'";
        //echo $query."<br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoDeberiaTenerFechaPrev($item, $fecha, $equipo){
        $fecha_filtro=substr($fecha, 3, 4)."-".substr($fecha, 0, 2);
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_debe, '%d-%m-%Y') as fecha_debe, fecha_debe as fecha_debe_sf
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND date_format(mc.fecha_deberia, '%Y-%m') = '".$fecha_filtro."'";
        //echo $query."<br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoEntreFechas($item, $fecha, $equipo, $fecha2){
        //$fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        //$fecha_filtro2=substr($fecha2, 6, 4)."-".substr($fecha2, 3, 2)."-".substr($fecha2, 0, 2);
        $query = "SELECT mc.id_mantenimiento, date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, md.valor ,mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND mc.fecha between '".$fecha." 00:00:00' AND '".$fecha2." 23:59:59'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoEntreFechasPrev($item, $fecha, $equipo, $fecha2){
        $fecha_filtro=substr($fecha, 0, 7);
        $fecha_filtro2=substr($fecha2, 0, 7);
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, md.valor ,mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND date_format(mc.fecha, '%Y-%m') between '".$fecha_filtro."' AND '".$fecha_filtro2."'";
        // echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoUltimo($item, $equipo){
        //$fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        $query = "SELECT  date_format(fecha, '%d-%m-%Y') fecha, date_format(fecha, '%Y-%m-%d  %H:%i:%s') fecha_sin_formato, en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_deberia, '%Y-%m-%d') as fecha_deberia_sf, fecha_debe
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' ORDER BY fecha_sin_formato DESC";
        //echo $query."<br><br><br><br><br><br><br>";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientosByEquipoExistentePreventivo($item, $mantenimiento, $idequipo){
        //if($tipoequipo!=0 && $mantenimiento!=0){
        $query = "SELECT COUNT(mc.id_mantenimiento) total "
            . " FROM mantenimiento_cabecera mc "
            . " LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento "
            . " WHERE 1 ";
        $query .= " AND mc.id_equipo='".$idequipo."' AND md.id_item='".$item."' AND mc.tipo_mantenimiento='".$mantenimiento."'" ;
        //}
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getMantenimientoPrevUltimo($item, $equipo){
        //$fecha_filtro=substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2);
        $query = "SELECT  date_format(fecha, '%d-%m-%Y') fecha, date_format(fecha, '%Y-%m-%d') fecha_sin_formato, en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia, date_format(fecha_deberia, '%Y-%m-%d') as fecha_deberia_sf, fecha_debe
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' ORDER BY fecha_sin_formato DESC";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoEnDichoPeriodo($item, $fecha, $equipo){
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND date_format(mc.fecha, '%m-%Y') = '".$fecha."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getMantenimientoEntrePeriodos($item, $fecha, $equipo, $fecha2){
        $fecha_filtro=substr($fecha, 0, 4)."-".substr($fecha, 5, 2);
        $fecha_filtro2=substr($fecha2, 0, 4)."-".substr($fecha2, 5, 2);
        $query = "SELECT date_format(fecha, '%d-%m-%Y') as fecha, date_format(fecha, '%Y-%m-%d') as fecha_sf, md.valor ,mc.en_termino, date_format(fecha_deberia, '%d-%m-%Y') as fecha_deberia
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_item='".$item."' AND mc.id_equipo='".$equipo."' AND date_format(mc.fecha, '%Y-%m') between '".$fecha_filtro."'  AND '".$fecha_filtro2."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getDetalleMantenimientoRealizado($equipo,$item){

        $query = "SELECT md.id_mantenimiento_cabecera,md.valor detalle, date_format(mc.fecha, '%d-%m-%Y %H:%i') as fecha_realizado, date_format(mc.fecha_deberia, '%d-%m-%Y') as fecha_deberia
        FROM mantenimiento_cabecera mc
        LEFT JOIN mantenimiento_detalle md ON md.id_mantenimiento_cabecera=mc.id_mantenimiento
        WHERE md.id_mantenimiento_cabecera='".$item."' AND mc.id_equipo='".$equipo."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function  save_mantenimiento_cabecera_manual($id_equipo,$tipo_equipo,$item,$fecha_deberia,$fecha_debe){
        session_start();
        global $error;

        $table = new Table($this->db, 'mantenimiento_cabecera');

        $table->id_equipo = $id_equipo;
        $table->tipo_equipo = $tipo_equipo;
        $table->tipo_mantenimiento = $item;
        $table->en_termino = 'NR';
        $table->fecha_deberia = $fecha_deberia;
        $table->fecha_debe = $fecha_debe;
        $table->id_usuario = $_SESSION['id'];
        $table->fecha = date('Y-m-d H:i:s');
        if($table->save()){
            return $table->id_mantenimiento;
        }
        else
            return false;

    }
    function save_horario_cabecera($nombre){
        session_start();
        $table = new Table($this->db, 'horarios_personas_cabecera');
        $table->archivo = $nombre;
        $table->fecha_hora = date('Y-m-d H:i:s');
        $table->usuario = $_SESSION['id'];
        if($table->save()){
            return $table->id_horario;
        }else{
            return 0;
        }
    }
    function save_horario_persona($cabecera,$id_persona_reloj,$horario){
        $tipo_hora=substr($horario, 20, 4);
        //echo $tipo_hora;
        if($tipo_hora=='p.m.'){
            $horario=$this->getHorarioFormateado($horario);
        }
        $fecha_filtro=substr($horario, 6, 4)."-".substr($horario, 3, 2)."-".substr($horario, 0, 2)." ".substr($horario, 11, 8);
        $table = new Table($this->db, 'horarios_personas');
        $table->id_horario_cabecera = $cabecera;
        $table->id_persona_reloj = $id_persona_reloj;
        $table->horario = $fecha_filtro;
        if($table->save()){
            return $table->id_relacion;
        }else{
            return 0;
        }
    }
    function getPersonasReloj($persona=null){
        $query = "SELECT CONCAT_WS(' ', p.apellido, p.nombre) nombre, id_reloj"
            . " FROM personas p"
            ." WHERE p.id_reloj is not null ";
            if($persona){
               $query .= " AND p.id_persona='".$persona."' "; 
            }
            $query .= "  ORDER BY nombre ASC";
            
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return 0;
    }
    function getHorariosFecha($idpersona, $fecha){
        $query = "SELECT horario as fecha_dia_hora,date_format(horario, '%d-%m-%Y %H:%i:%s') as fecha "
            . " FROM horarios_personas p"
            . " WHERE p.id_persona_reloj='".$idpersona."' AND horario between '".$fecha." 00:00:00' AND '".$fecha." 23:59:59' ORDER BY fecha_dia_hora ASC  ";
            //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return 0;
    }
    function getHorarioFormateado($horario){
        //secho "horario virgen".$horario."<br><br>";
        $hora_horario=substr($horario, 11, 2);
        switch ($hora_horario) {
            case "01": $retorno="13"; break;
            case "02": $retorno="14"; break;
            case "03": $retorno="15"; break;
            case "04": $retorno="16"; break;
            case "05": $retorno="17"; break;
            case "06": $retorno="18"; break;
            case "07": $retorno="19"; break;
            case "08": $retorno="20"; break;
            case "09": $retorno="21"; break;
            case "10": $retorno="22"; break;
            case "11": $retorno="23"; break;
						case "12": $retorno="12"; break;
        }
        $fecha_filtro=substr($horario, 0, 2)."-".substr($horario, 3, 2)."-".substr($horario, 6, 4)." ".$retorno.":".substr($horario, 14, 2).":".substr($horario, 17, 2);
        //echo $fecha_filtro."<br><br>";
        return $fecha_filtro;
    }
    function save_horario_persona_unico($id_persona_reloj,$fecha,$horario){

        $fecha_filtro=$fecha." ".$horario.":00";

        $table = new Table($this->db, 'horarios_personas');
        $table->id_persona_reloj = $id_persona_reloj;
        $table->horario = $fecha_filtro;
        if($table->save()){
            return $table->id_relacion;
        }else{
            return 0;
        }
    }

    function getNoConformidadByFiltroReporte($id_proceso=null, $id_sector=null, $fecha_desde=null, $fecha_hasta=null,$principal){
        $query = "SELECT COUNT(p.id_no_conformidad) total
            FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas prs on prs.id_persona=rs.id_persona
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion
            LEFT JOIN usuarios u on u.id_usuario=p.usuario
            LEFT JOIN personas i on i.id_persona=u.id_persona
            WHERE p.estado='".$principal."' " ;

        if($id_proceso){
            $query .=  " AND p.id_proceso='".$id_proceso."'";
        }
        if($id_sector) {
            $query .= " AND p.id_sector='".$id_sector."'";
        }

        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND p.fecha_no_conformidad>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND p.fecha_no_conformidad<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (p.fecha_no_conformidad between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
        $query .= "  ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getPersonabyUsuario(){
        $query = "SELECT p.id_persona"
            . " FROM personas p"
            ." INNER JOIN usuarios u ON u.id_persona=p.id_persona "
            ." WHERE u.id_usuario='".$_SESSION['id']."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->id_persona;
        else
            return 0;
    }
    function getNoConformidadByOrigenReporte($id_proceso=null, $id_sector=null, $fecha_desde=null, $fecha_hasta=null,$principal){
        $query = "SELECT COUNT(p.id_no_conformidad) total
            FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas prs on prs.id_persona=rs.id_persona
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion
            LEFT JOIN usuarios u on u.id_usuario=p.usuario
            LEFT JOIN personas i on i.id_persona=u.id_persona
            WHERE p.origen='".$principal."' " ;

        if($id_proceso){
            $query .=  " AND p.id_proceso='".$id_proceso."'";
        }
        if($id_sector) {
            $query .= " AND p.id_sector='".$id_sector."'";
        }

        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND p.fecha_no_conformidad>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND p.fecha_no_conformidad<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (p.fecha_no_conformidad between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
        $query .= "  ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getNoConformidadBySectorReporte($id_proceso=null, $id_sector=null, $fecha_desde=null, $fecha_hasta=null){
        $query = "SELECT COUNT(p.id_no_conformidad) total ,s.descripcion sector
            FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas prs on prs.id_persona=rs.id_persona
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion
            LEFT JOIN usuarios u on u.id_usuario=p.usuario
            LEFT JOIN personas i on i.id_persona=u.id_persona
            WHERE p.id_sector IS NOT NULL " ;

        if($id_proceso){
            $query .=  " AND p.id_proceso='".$id_proceso."'";
        }
        if($id_sector) {
            $query .= " AND p.id_sector='".$id_sector."'";
        }

        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND p.fecha_no_conformidad>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND p.fecha_no_conformidad<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (p.fecha_no_conformidad between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
        $query .= "  group by p.id_sector ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getNoConformidadByProcesoReporte($id_proceso=null, $id_sector=null, $fecha_desde=null, $fecha_hasta=null){
        $query = "SELECT COUNT(p.id_no_conformidad) total ,a.descripcion proceso
            FROM no_conformidad  p
            LEFT JOIN areas a ON a.id_area=p.id_proceso
            LEFT JOIN sector s on s.id_sector=p.id_sector
            LEFT JOIN sector sd on sd.id_sector=p.sector_derivado
            LEFT JOIN responsable_sector rs on rs.id_sector=p.sector_derivado
            LEFT JOIN personas prs on prs.id_persona=rs.id_persona
            LEFT JOIN no_conformidad_respuesta ncp on ncp.id_no_conformidad=p.id_no_conformidad
            LEFT JOIN personas ps on ps.id_persona=ncp.responsable_accion
            LEFT JOIN usuarios u on u.id_usuario=p.usuario
            LEFT JOIN personas i on i.id_persona=u.id_persona
            WHERE p.id_proceso IS NOT NULL " ;

        if($id_proceso){
            $query .=  " AND p.id_proceso='".$id_proceso."'";
        }
        if($id_sector) {
            $query .= " AND p.id_sector='".$id_sector."'";
        }

        if($fecha_desde && $fecha_hasta==null){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $query .=" AND p.fecha_no_conformidad>='".$fecha_desde."'";
        }
        if($fecha_desde==null && $fecha_hasta){
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND p.fecha_no_conformidad<='".$fecha_hasta."'";
        }

        if($fecha_desde && $fecha_hasta){
            $fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
            $fecha_hasta=substr($fecha_hasta, 6, 4)."-".substr($fecha_hasta, 3, 2)."-".substr($fecha_hasta, 0, 2)." 23:59:00";
            $query .=" AND (p.fecha_no_conformidad between '".$fecha_desde."' AND '".$fecha_hasta."')";
        }
        $query .= "  group by p.id_proceso ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getEquiposMantenimeinto(){
        $query = "SELECT p.id_persona"
            . " FROM personas p"
            ." INNER JOIN usuarios u ON u.id_persona=p.id_persona "
            ." WHERE u.id_usuario='".$_SESSION['id']."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->id_persona;
        else
            return 0;
    }
    function getMantenimientoRealizados(){
        $query = "SELECT p.id_persona"
            . " FROM personas p"
            ." INNER JOIN usuarios u ON u.id_persona=p.id_persona "
            ." WHERE u.id_usuario='".$_SESSION['id']."'";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->id_persona;
        else
            return 0;
    }
    function getMantenimientosProgramados($tipo){
        $query = "SELECT COUNT(id_registro) "
            . " FROM mantenimiento_item_tipo_equipo e "
            . " WHERE 1 tipo_matenimiento='".$tipo."'";
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getMantenimientosActualizar($equipo=null){
        $query = "SELECT e.*,d.id_item  "
            . " FROM mantenimiento_cabecera e
            INNER JOIN mantenimiento_detalle d ON d.id_mantenimiento_cabecera =e.id_mantenimiento"
            . " WHERE 1 ";
        if($equipo){
            $query .=" AND e.id_equipo = '".$equipo."' ";
        }
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getDebeActualizar($fecha,$equipo,$tipomante,$item){
        $query = "SELECT count(id_mantenimiento) total "
            . " FROM mantenimiento_cabecera e
            INNER JOIN mantenimiento_detalle d ON d.id_mantenimiento_cabecera =e.id_mantenimiento"
            . " WHERE 1 ";
        $query .=" AND e.fecha_deberia = '".$fecha."' AND  e.id_equipo='".$equipo."' AND  e.tipo_mantenimiento='".$tipomante."' AND  d.id_item='".$item."'";
       // echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)return $result[0]->total;
        else return 0;
    }
    function  save_mantenimiento_cabecera_actualizar($id_equipo, $tipo_equipo,$tipo,$fecha_deberia,$fecha_debe){
        session_start();
        global $error;

        $table = new Table($this->db, 'mantenimiento_cabecera');

        $table->id_equipo = $id_equipo;
        $table->tipo_equipo = $tipo_equipo;
        $table->tipo_mantenimiento = $tipo;
        $table->en_termino = "NR";

        $table->fecha_deberia = $fecha_deberia;

        $table->fecha_debe = $fecha_debe;

        $table->id_usuario = 1;
        $table->fecha = date('Y-m-d H:i:s');
        if($table->save()){
            return $table->id_mantenimiento;
        }
        else
            return false;

    }
    function getMantenimientosProgramadosPorMes($data=null){
        //print_r($data);
        //$fecha_desde=substr($fecha_desde, 6, 4)."-".substr($fecha_desde, 3, 2)."-".substr($fecha_desde, 0, 2)." 00:00:00";
        $query = "SELECT date_format(e.fecha, '%d-%m-%Y') as fecha,d.id_item,e.id_mantenimiento id_cabecera,d.id_mantenimiento_detalle detalle, date_format(e.fecha_debe, '%d-%m-%Y') as debe ,e.fecha_deberia, CONCAT_WS('-',teq.armado,eq.num_interno) equipo ,e.en_termino"
            . " FROM mantenimiento_cabecera e
            INNER JOIN mantenimiento_detalle d ON d.id_mantenimiento_cabecera =e.id_mantenimiento
            INNER JOIN equipos eq ON eq.id_equipo =e.id_equipo
            INNER JOIN tipo_equipo teq ON teq.id_tipo_equipo =eq.tipo_equipo
            INNER JOIN mantenimiento_item_tipo_equipo mte ON mte.id_registro=d.id_item AND mte.tipo_mantenimiento=1 AND mte.id_tipo_equipo=e.tipo_equipo

            "
            . " WHERE 1 ";
//        $query .=" AND e.fecha_deberia = '01-03-2017 00:00:00";
           // $query .=" AND (e.fecha_deberia between '2017-03-01 00:00:00' AND '2017-03-31 23:59:59')";

        if($data['lugar_filtro']){
            $query.=" AND  l.id_lugar = '".$data['lugar_filtro']."'";
        }
        if($data['sector_filtroID']){
            $query.=" AND  eq.id_sector = '".$data['sector_filtroID']."'";
        }
        if($data['tipo_equipo_filtro']){
            $query.=" AND eq.tipo_equipo='".$data['tipo_equipo_filtro']."' ";
        }
        if($data['num_serie']){
            $query.=" AND  eq.nro_serie='".$data['num_serie']."'";
        }
        //if($data['desde']){
            $query .=" AND (e.fecha_deberia between '2017-".$data['desde']."-01 00:00:00' AND '2017-".$data['hasta']."-31 23:59:59')";
            //$query.=" AND  e.marca='".$data['marca_filtro']."'";
        //}
        //$query.=" group by d.id_item ";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getMantenimientosProgramadosUltPorMes($data=null){

        $query = "SELECT  tst.id_equipo ,
                  (SELECT  e.fecha_debe FROM mantenimiento_cabecera e WHERE e.id_equipo=tst.id_equipo order by e.fecha_debe DESC limit 1) fecha_debe,
                  td.id_item, CONCAT_WS('-',teq.armado,eq.num_interno) equipo
                  FROM mantenimiento_cabecera tst
                  INNER JOIN mantenimiento_detalle td ON td.id_mantenimiento_cabecera =tst.id_mantenimiento
                  INNER JOIN equipos eq ON eq.id_equipo =tst.id_equipo
            INNER JOIN tipo_equipo teq ON teq.id_tipo_equipo =eq.tipo_equipo WHERE 1";

        if($data['lugar_filtro']){
            $query.=" AND  l.id_lugar = '".$data['lugar_filtro']."'";
        }
        if($data['sector_filtroID']){
            $query.=" AND  eq.id_sector = '".$data['sector_filtroID']."'";
        }
        if($data['tipo_equipo_filtro']){
            $query.=" AND eq.tipo_equipo='".$data['tipo_equipo_filtro']."' ";
        }
        if($data['num_serie']){
            $query.=" AND  eq.nro_serie='".$data['num_serie']."'";
        }
        if($data['periodo_filtro']){
            //$query.=" AND  e.marca='".$data['marca_filtro']."'";
        }
        $query .= " GROUP BY td.id_item";
//        $query .=" AND e.fecha_deberia = '01-03-2017 00:00:00";
        //$query .=" AND (fecha_debe between '2017-03-01 00:00:00' AND '2017-03-31 23:59:59')";
        //echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)return $result;
        else return 0;
    }
    function getNC_modificadas(){

        $query = "SELECT s.* FROM no_conformidad s WHERE modificado='S'";

            //echo $query;

        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getNC_modificadasCount(){

        $query = "SELECT count(s.id_no_conformidad) total  FROM no_conformidad s WHERE modificado='S'";

        //echo $query;

        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0]->total;
        else
            return false;
    }
    function getSolicitudCompra(){

        $query = "SELECT s.*, date_format(s.fecha_hora, '%d-%m-%Y %H:%i') as fecha_solicitud,
         date_format(s.requerido_para, '%d-%m-%Y') as fecha_requerido,CONCAT_WS(' ', p.apellido, p.nombre) solicitante , sc.descripcion area_solicitante_descripcion
                    FROM solicitud_orden_compra s "
                . " LEFT JOIN usuarios u ON u.id_usuario=s.id_solicitante"
                . " LEFT JOIN personas p ON p.id_persona=u.id_persona"
                . " LEFT JOIN sector sc ON sc.id_sector=s.area_solicitante"
                . " WHERE 1 ";
// echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getMisSolicitudCompra(){

        $query = "SELECT s.*, date_format(s.fecha_hora, '%d-%m-%Y %H:%i') as fecha_solicitud,
         date_format(s.requerido_para, '%d-%m-%Y') as fecha_requerido,CONCAT_WS(' ', p.apellido, p.nombre) solicitante , sc.descripcion area_solicitante_descripcion
                    FROM solicitud_orden_compra s "
                . " LEFT JOIN usuarios u ON u.id_usuario=s.id_solicitante"
                . " LEFT JOIN personas p ON p.id_persona=u.id_persona"
                . " LEFT JOIN sector sc ON sc.id_sector=s.area_solicitante"
                . " WHERE s.id_solicitante='".$_SESSION['id']."' ";
// echo $query;
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function save_solicitud_compra($data){
        if($data['requerido_para']){
                $fecha_requerido=substr($data['requerido_para'], 6, 4)."-".substr($data['requerido_para'], 3, 2)."-".substr($data['requerido_para'], 0, 2);
            }else{
                $fecha_requerido="";
            }
            $table = new Table($this->db, 'solicitud_orden_compra');

            if($data['id_registro']){
                $table->find($data['id_solicitud_compra']);
            }else{
                $table->fecha_hora = date('Y-m-d H:i:s');
            }
            $table->id_solicitante = $data['usuarioID'];
            $table->area_solicitante = $data['sectorID'];
            $table->prioridad = $data['prioridad'];
            $table->correctivo = $data['correctivo'];
            $table->requerido_para = $fecha_requerido;
            $table->preventivo = $data['preventivo'];
            $table->mantenimiento = $data['mantenimiento'];
            $table->observaciones = $data['observaciones'];
            $table->estado = 'N';
           // $table->fecha_carga = date('Y-m-d H:i:s');
           // $table->usuario = 1;

            //$table->usuario = 1;

            if($table->save()){
                return $table->id_solicitud_compra;
            }else{
                return 0;
            }
        }

    function getUsuariosByNombre(){
        $query = "SELECT u.*, u.nombre usuario,concat_ws(p.apellido,' ',p.nombre) persona,date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nac FROM usuarios u
                INNER JOIN personas p ON u.id_persona=p.id_persona
                WHERE 1 ORDER BY p.apellido, p.nombre";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }

    function checkLogin($user, $pass, $count=0){
        global $conn;

//$pass = md5($pass);

        $SQL = "SELECT COUNT(*) AS C FROM bstb.usuarios WHERE nombre='".$user."' AND clave='".$pass."' AND estado='A'";
        $result = $this->db->loadObjectList($SQL);
        if($result[0]->C)
            return true;
        else
            return false;
    }
    function getDatosUsuarioByNombre($nombre){
        $query = "SELECT u.*,p.*, u.nombre usuario,concat_ws(p.apellido,' ',p.nombre) persona,date_format(fecha_nacimiento, '%d/%m/%Y') as fecha_nac,date_format(fecha_ingreso, '%d/%m/%Y') as fecha_ing FROM usuarios u
                INNER JOIN personas p ON u.id_persona=p.id_persona
                WHERE u.nombre='".$nombre."'";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result[0];
        else
            return false;
    }
    function getSolicitudPedidos(){
        $query = "SELECT pm* FROM pedidos_materiales pm
                
                WHERE 1";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
    function getSolicitudPedidosDetalle(){
        $query = "SELECT pm* FROM pedidos_materiales_detalle pm
                
                WHERE 1";
        $result = $this->db->loadObjectList($query);
        if($result)
            return $result;
        else
            return false;
    }
}
$consultas= new Consultas($db, $dbPg);
