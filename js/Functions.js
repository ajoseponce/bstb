
function sendAjax(form, divResults){
	var results = $(divResults).empty().addClass('ajax-loading');
	var miAjax = new Ajax('./lib/ajax.php',	{
		method: 'get',
		data:$(form),
		update: $(results),
		onComplete: function(){
			results.removeClass('ajax-loading');
		}
	});
	miAjax.request();
}

function newSuggestFiltroExamenPractico(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_examenes();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestFiltroCapacitaciones(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_capacitaciones();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestFiltroCompetencia(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_competencia();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestFiltroMante(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_mantenimientos();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestSeleccion(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            $("#descripcion_capa").hide();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}

function newSuggestProceso(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            rellena_poes(obj.id, $("#personaID").val());
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggest(input, inputHidden, flag){
//alert('hola');
	var options = {
		script:"lib/ajax.php?flag=" + flag + "&", 
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; }

	};
        var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestReloj(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&", 
        varname:"search",
        json:true,
        callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
        buscar_horarios();
        }

    };
        var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestListaEquipo(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            filtrar_listado_equipo()
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestListaCorrectivoEquipo(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            filtrar_busqueda_equipo_solicitud()
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}

function newSuggestEditar(input, inputHidden, flag){
//alert('hola');
	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) {
                    document.getElementById(inputHidden).value = obj.id;
                    $("#box_editar").show();
                }

	};
        var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestalumnno(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
                rellena_notas(obj.id);}
	};
        
	var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestPoe(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
                rellena_registros(obj.id, obj.value);}
	};
        
	var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestPersApli(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
                rellena_aplicaciones(obj.id, obj.value);}
	};
        
	var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestMenuApli(input, inputHidden, flag){

    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) { document.getElementById(inputHidden).value = obj.id;
            rellena_aplicaciones_menu(obj.id, obj.value);}
    };

    var as_json = new bsn.AutoSuggest(input, options);
}
function busca_datos_proveedor(value){
    $.ajax({
            type: "post",
            url: "trae_datos_proveedor.php",
            data: "id_proveedor="+value,
            dataType: "json",
            success: function(data){
                $("#direccion").val(data.direccion);
                $("#telefono").val(data.telefono);
                $("#contacto").val(data.contacto);
                $("#mail").val(data.mail);
                
            }
    });
}        
function recomendar(){
    var value=$("#tipo_equipo").val();
    if(value==0){
        alert('Seleccione un tipo de equipo.Gracias');
        return false;
    }
    $.ajax({
            type: "post",
            url: "trae_ultimo_equipo.php",
            data: "tipo_equipo="+value,
            success: function(data){
                $("#num_interno").val(data);
            }
    });
}        
function newSuggestPoeExamen(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
                //rellena_registros(obj.id);
                $("#examen_poe").show(1000);
                $("#poe").attr("readonly", "readonly");
                }
	};
        var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestReporte(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id; 
                rellena_reporte($("#personaID").val(), $("#examenID").val());
                
                }
	};
        var as_json = new bsn.AutoSuggest(input, options);
}
function agregar_pregunta(){
  //  alert('hola');
    var num_pregunta=$("#cantidad_preguntas").val();
    num_pregunta=parseInt(num_pregunta)+1;
    $("#preguntas").append("<div class='control-group' id='pregunta_num_"+num_pregunta+"'><label class='control-label' for='general-text'>Pregunta</label><div class='controls'> <textarea style='width:100%;' name='pregunta"+num_pregunta+"'/><input type='hidden' name='cant_respuestas_preg_"+num_pregunta+"' value='1' id='cant_respuestas_preg_"+num_pregunta+"'/></div><div class='clearfix'><button onclick='agregar_respuesta("+num_pregunta+")' id='ddRow' class='btn btn-success'  type='button' ><i class='icon-plus'></i> Agregar Respuesta</button></div></div>");
    //num_pregunta=parseInt(num_pregunta)+1;
    $("#cantidad_preguntas").val(num_pregunta);
}
function agregar_respuesta(pregunta){
    var num_resp_pregunta=$("#cant_respuestas_preg_"+pregunta).val();
    $("#preguntas").append("<label class='control-label' for='general-text'></label><div class='controls'><input type=radio name='respuesta_pregunta_"+pregunta+"' value='"+num_resp_pregunta+"'><textarea style='width:100%;'  name='respuesta"+pregunta+"_num"+num_resp_pregunta+"'/></div><div class='clearfix'></div>");
    num_resp_pregunta=parseInt(num_resp_pregunta)+1;
    $("#cant_respuestas_preg_"+pregunta).val(num_resp_pregunta);
    
}


function newSuggestalumnnoNotas(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id;
                rellena_notas_ifei(obj.id);}
	};

	var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestAlumnoConducta(input, inputHidden, flag){

	var options = {
		script:"lib/ajax.php?flag=" + flag + "&",
		varname:"search",
		json:true,
		callback: function (obj) { document.getElementById(inputHidden).value = obj.id;
                rellena_comportamiento();}
	};
        
	var as_json = new bsn.AutoSuggest(input, options);
}

function rellena_reporte(persona, examen){
    //alert('personas de '+persona+' examen'+examen);
    $("#reporte").load('trae_calificaciones.php?id_usuario='+persona+'&id_examen='+examen);
}

function filtrar_listado_equipo(){
    //alert('llega');
    var lugar_filtro=$("#lugar_filtro").val();
    if($("#lugar").val()==""){
        lugar_filtro="";
        $("#lugar_filtro").val("");
    }
    var sector_filtroID=$("#sector_filtroID").val();
    if($("#sector_filtro").val()==""){
        sector_filtroID="";
        $("#sector_filtroID").val("");
    }
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var num_serie=$("#num_serie").val();
    var marca_filtro=$("#marca_filtro").val();
    $("#tabla_listado").load('trae_equipos.php?lugar_filtro='+lugar_filtro+'&sector_filtroID='+sector_filtroID+'&marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&num_serie='+num_serie);
}
function newSuggestCalendarioMant(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            filtrar_calendario_equipo();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function filtrar_calendario_equipo(){
    //alert('llega');
    var lugar_filtro=$("#lugar_filtro").val();
    if($("#lugar").val()==""){
        lugar_filtro="";
        $("#lugar_filtro").val("");
    }
    var sector_filtroID=$("#sector_filtroID").val();
    if($("#sector_filtro").val()==""){
        sector_filtroID="";
        $("#sector_filtroID").val("");
    }
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var desde=$("#periodo_desde").val();
    var hasta=$("#periodo_hasta").val();

    $("#tabla_listado").load('trae_calendario_mantenimiento.php?lugar_filtro='+lugar_filtro+'&sector_filtroID='+sector_filtroID+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&desde='+desde+'&hasta='+hasta);
}
function filtrar_busqueda_equipo(){
    //alert('llega');
    var descripcion=$("#descripcion").val();
    var tipo_equipo=$("#tipo_equipo").val();
    var num_serie=$("#num_serie").val();
    var marca=$("#marca").val();
    var lugar=$("#lugar").val();
    $("#tabla_listado").load('trae_busqueda_equipo.php?marca='+marca+'&tipo_equipo='+tipo_equipo+'&lugar_filtro='+lugar);
}
function filtrar_busqueda_equipo_hist(){

    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var marca_filtro=$("#marca_filtro").val();

    $("#tabla_listado").load('trae_busqueda_equipo_historial.php?marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro);
}

function buscar_item_matenimiento(){
    var tipo_mantenimiento=$("#tipo_mantenimiento").val();
    var tipo_equipo=$("#tipo_equipo").val();
    var id_equipo=$("#id_equipo").val();
    if(tipo_mantenimiento==3){
        $("#cartel_mantenimiento").hide();
        $("#cartel_calibracion").show();
    }else{
        $("#cartel_mantenimiento").show();
        $("#cartel_calibracion").hide();
    }
    if (tipo_mantenimiento==1){
        $("#item_mantenimiento").load('trae_mantenimientos_realizar.php?tipo_equipo='+tipo_equipo+'&tipo_mantenimiento='+tipo_mantenimiento+'&id_equipo='+id_equipo);
    }else{
        if(tipo_mantenimiento==2){
            $("#item_mantenimiento").load('trae_mantenimientos_preventivo.php?tipo_equipo='+tipo_equipo+'&tipo_mantenimiento='+tipo_mantenimiento+'&id_equipo='+id_equipo);
        }else{
            $("#item_mantenimiento").load('trae_mantenimientos_calibracion.php?tipo_equipo='+tipo_equipo+'&tipo_mantenimiento='+tipo_mantenimiento+'&id_equipo='+id_equipo);
        }

    }
    
}
function valor_caja(nombre){
    if($("#"+nombre).val()==""){
        $("#"+nombre+"ID").attr("value" , "");
        rellena_reporte($("#personaID").val(), $("#examenID").val());
    }
}


function rellena_registros(id_poe){
    //alert(poe);
    $("#registros_poe").load('trae_registros.php?id_poe='+id_poe);
    $("#registros_poe").show(1000);
}
function rellena_poes(id_proceso, persona){
    $("#poe_proceso").load('trae_poes_proceso.php?id_proceso='+id_proceso+'&persona='+persona);
    $("#poe_proceso").show();
}
function rellena_aplicaciones(id_persona, nombre){
    //alert(poe);
    $("#aplicaciones_persona").load('trae_aplicaciones.php?id_persona='+id_persona);
    $("#aplicaciones_persona").show(1000);
}
function rellena_aplicaciones_menu(id_menu, nombre){
    //alert(poe);
    $("#aplicaciones_persona").load('trae_aplicativo_menu.php?id_menu='+id_menu);
    $("#aplicaciones_persona").show(1000);
}
function rellena_proceso(id_persona){
    //alert(poe);
    $("#proceso_persona").load('trae_proceso_persona.php?id_persona='+id_persona);
    $("#proceso_persona").show(1000);
}

function guardar_relacion(){
    $("#form_datos").submit();
}
function trae_examenes(){
    var id_poe=$("#poeID").val()
    var persona=$("#personaID").val()
    $("#listado").load('trae_examenes_practicos.php?id_poe='+id_poe+'&id_persona='+persona);
    //$("#poe_proceso").show();
}
function trae_competencia(){
    var id_proceso=$("#procesoID").val()
    var persona=$("#personaID").val()
    $("#listado").load('trae_competencia.php?id_proceso='+id_proceso+'&id_persona='+persona);
    //$("#poe_proceso").show();
}
function trae_capacitaciones(){
    var id_poe=$("#poeID").val()
    var persona=$("#personaID").val()
    $("#listado").load('trae_capacitaciones.php?id_poe='+id_poe+'&id_persona='+persona);
    //$("#poe_proceso").show();
}
function newSuggestProcesoNC(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            $("#sector_capa").hide();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestSectorNC(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            $("#proceso_capa").hide();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function newSuggestFiltroNC(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_nc();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function trae_nc(){
    var id_proceso=$("#procesoID").val();
    var id_sector=$("#sectorID").val();
    var estado=$("#estado").val();
    var tipo=$("#tipo").val();
    var fecha_desde=$("#fecha_desde").val();
    var fecha_hasta=$("#fecha_hasta").val();
    var origen=$("#origen").val();
    var numero=$("#numero").val();
    var nivel_riesgo=$("#nivel_riesgo").val();
    $("#listado").load('trae_no_conformidades.php?id_sector='+id_sector+'&tipo='+tipo+'&numero='+numero+'&id_proceso='+id_proceso+'&fecha_desde='+fecha_desde+'&fecha_hasta='+fecha_hasta+'&origen='+origen+'&nivel_riesgo='+nivel_riesgo,function() {
        $('[data-toggle="popover"]').popover();
    });
}
function guardarRelacionEquipoPersona() {
    var persona=$("#personasID").val();
    var equipo=$("#equipoID").val();
    var tipo=$("#tipo_mantenimiento").val();
    if(persona) {
        $.ajax({
            type: "post",
            url: "controlador.php",
            data: "action=guardarRelacionPersonaEquipo&persona=" + persona + "&equipo=" + equipo + "&tipo=" + tipo,
            success: function (data) {
                alert("La persona se relaciono al equipo correctamente");
                $("#personasID").val('')
                $("#personas").val('')
                verPopoupModal(equipo)
                filtrar_listado_equipo();
            }
        });
    }else{
        alert("Debe seleccionar una persona");
    }
}
function eliminarRelacionEquipoPersona(relacion) {
    var equipo=$("#equipoID").val();
    $.ajax({
        type: "post",
        url: "controlador.php",
        data: "action=eliminarRelacionPersonaEquipo&relacion="+relacion,
        success: function (data) {
            alert("La relacion se elimino correctamente");
            verPopoupModal(equipo)

        }
    });
}
function exporta_equipos(){
        var lugar_filtro=$("#lugar_filtro").val();
        if($("#lugar").val()==""){
            lugar_filtro="";
            $("#lugar_filtro").val("");
        }
        var sector_filtroID=$("#sector_filtroID").val();
        if($("#sector_filtro").val()==""){
            sector_filtroID="";
            $("#sector_filtroID").val("");
        }
        var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
        var num_serie=$("#num_serie").val();
        var marca_filtro=$("#marca_filtro").val();

        var url = 'exporta_equipos.php?lugar_filtro='+lugar_filtro+'&marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&num_serie='+num_serie+'&sector_filtroID='+sector_filtroID+'&lugar_filtro='+lugar_filtro;
        window.open(url , '_blank');


}
function exporta_horarios(){
    
    var value=$("#periodo").val();
    var anio=$("#anio").val();
    var persona=$("#personaID").val();
    var url = 'exporta_horarios.php?periodo='+value+'&anio='+anio+'&persona='+persona;
    
    window.open(url , '_blank');


}
function verPopoupModal(value){
    $("#equipoID").val(value);
    $("#personas_equipo").load('trae_personas_x_equipo.php?id_equipo='+value);
}
function buscar_lugares(sector){
   $("#lugar").load('trae_lugares.php?idsector='+sector);
}
function buscar_proveedores(descrip){
    $("#listado").load('trae_proveedores.php?descrip='+descrip);
}
function trae_mantenimientos(){
    var id_sector=$("#sectorID").val();
    var tipo=$("#tipo").val();
    var tipo_equipo=$("#tipo_equipo").val();
    $("#listado").load('trae_mantenimientos.php?id_sector='+id_sector+'&tipo='+tipo+'&tipo_equipo='+tipo_equipo);
}
function exporta_pdf_nc() {
    var id_proceso=$("#procesoID").val();
    var id_sector=$("#sectorID").val();
    var estado=$("#estado").val();
    var tipo=$("#tipo").val();
    var fecha_desde=$("#fecha_desde").val();
    var fecha_hasta=$("#fecha_hasta").val();
    var origen=$("#origen").val();
    var data= 'id_proceso='+id_proceso+'&id_sector='+id_sector+'&estado='+estado+'&tipo='+tipo+'&fecha_desde='+fecha_desde+'&fecha_hasta='+fecha_hasta+'&origen='+origen;
    window.open('imprimir_nc.php?'+data, '_blanck');
}

function newSuggestPersProceso(input, inputHidden, flag){

    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) { document.getElementById(inputHidden).value = obj.id;
            rellena_proceso(obj.id, obj.value);}
    };

    var as_json = new bsn.AutoSuggest(input, options);
}

function EditaEquipo(equipo) {
    var sector_filtro=$("#sector_filtro").val();
    var sector_filtroID=$("#sector_filtroID").val();
    var lugar_filtro=$("#lugar_filtro").val();
    var lugar_filtro_texto=$("#lugar").val();
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var num_serie=$("#num_serie").val();
    var marca_filtro=$("#marca_filtro").val();
    window.location.assign('controlador.php?action=edita_equipo&id_equipo='+equipo+'&lugar_filtro='+lugar_filtro+'&lugar_filtro_texto='+lugar_filtro_texto+'&sector_filtro='+sector_filtro+'&sector_filtroID='+sector_filtroID+'&marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&num_serie='+num_serie)
}
function EliminaEquipo(equipo) {
    var sector_filtro=$("#sector_filtro").val();
    var sector_filtroID=$("#sector_filtroID").val();
    var lugar_filtro=$("#lugar_filtro").val();
    var lugar_filtro_texto=$("#lugar").val();
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var num_serie=$("#num_serie").val();
    var marca_filtro=$("#marca_filtro").val();
    if(confirm('Usted esta por eliminar el equipo.Desea Continuar?')){
        window.location.assign('controlador.php?action=eliminar_equipo&id_equipo='+equipo+'&lugar_filtro='+lugar_filtro+'&lugar_filtro_texto='+lugar_filtro_texto+'&sector_filtro='+sector_filtro+'&sector_filtroID='+sector_filtroID+'&marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&num_serie='+num_serie);
    }
}
function VolverListaEquipo() {
    var sector_filtro=$("#sector_filtro").val();
    var sector_filtroID=$("#sector_filtroID").val();
    var lugar_filtro=$("#lugar_filtro").val();
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var lugar_filtro_texto=$("#lugar_filtro_texto").val();
    var num_serie=$("#num_serie").val();
    var marca_filtro=$("#marca_filtro").val();
    window.location.assign('controlador.php?action=lista_equipo&lugar_filtro='+lugar_filtro+'&lugar_filtro_texto='+lugar_filtro_texto+'&sector_filtro='+sector_filtro+'&sector_filtroID='+sector_filtroID+'&marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&num_serie='+num_serie)
}
function limpia_filtro_lugar() {

    $("#lugar").val("");
    $("#lugar_filtro").val("");

    filtrar_listado_equipo()
}
function limpia_filtro_calendar_lugar() {

    $("#lugar").val("");
    $("#lugar_filtro").val("");

    filtrar_calendario_equipo()
}
function limpia_filtro_lugar_correc() {

    $("#lugar").val("");
    $("#lugar_filtro").val("");

    filtrar_busqueda_equipo_solicitud()
}
function limpia_filtro_sector_correc() {

    $("#sector_filtro").val("");
    $("#sector_filtroID").val("");

    filtrar_busqueda_equipo_solicitud()
}
function limpia_filtro_sector() {

    $("#sector_filtro").val("");
    $("#sector_filtroID").val("");

    filtrar_listado_equipo()
}
function filtrar_busqueda_equipo_solicitud(){
    //alert('llega');
    // var descripcion=$("#descripcion").val();
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var lugar_filtro=$("#lugar_filtro").val();
    var sector_filtroID=$("#sector_filtroID").val();
    // var num_serie=$("#num_serie").val();
    var marca_filtro=$("#marca_filtro").val();
    $("#tabla_listado").load('trae_busqueda_equipo_solicitud.php?marca_filtro='+marca_filtro+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&lugar_filtro='+lugar_filtro+'&sector_filtroID='+sector_filtroID);
}
function exporta_pdf_mantenimientos() {
    var id_sector=$("#sectorID").val();
    var tipo=$("#tipo").val();
    var tipo_equipo=$("#tipo_equipo").val();
    var data= 'id_sector='+id_sector+'&tipo='+tipo+'&tipo_equipo='+tipo_equipo;
    window.open('imprimir_mantenimientos.php?'+data, '_blanck');
}
function guardarMantenimiento() {

    //var persona=$("#personasID").val();
    var equipo=$("#id_equipo").val();
    var tipo=$("#tipo_mantenimiento").val();
    var tipo_equipo=$("#tipo_equipo").val();
    var estado_mant=$("#estado_mant").val();
    var fecha_deberia=$("#fecha_deberia").val();
    var fecha_debe=$("#fecha_debe").val();
    var obs=$("#observaciones").val();
    if(estado_mant=='RF'){
        //alert(obs);
        if(obs==''){
            alert('Registre su motivo de retraso.Gracias')
            return false;
        }
    }

    var item=$("#item").val();
        $.ajax({
            type: "post",
            url: "controlador.php",
            data: "action=guardarMantenimiento&id_equipo="+equipo+"&estado_mant="+estado_mant+"&fecha_deberia="+fecha_deberia+"&fecha_debe="+fecha_debe+"&tipo="+tipo+"&obs="+obs+"&tipo_equipo="+tipo_equipo+"&item="+item,
            success: function (data) {
                //alert(data);
                buscar_item_matenimiento();
            }
        });

}
function verModal(value,estado,fecha_deberia,fecha_debe){
    //alert(fecha_deberia);
    $("#item").val(value);
    $("#estado_mant").val(estado);
    $("#fecha_deberia").val(fecha_deberia);
    $("#fecha_debe").val(fecha_debe);

    $("#ventana_carga").show();

    //$("#personas_equipo").load('trae_personas_x_equipo.php?id_equipo='+value);
}
function cierraModal(){
    $("#item").val("");
    $("#ventana_carga").hide();

    //$("#personas_equipo").load('trae_personas_x_equipo.php?id_equipo='+value);
}
function buscar_horarios(){
    var value=$("#periodo").val();
    var anio=$("#anio").val();
    var persona=$("#personaID").val();
    $("#listado").load('trae_horarios_personas.php?periodo='+value+'&anio='+anio+'&persona='+persona);
}
function borrar_filtros_horarios(){
    $("#personaID").val("");
    $("#persona").val("");
    buscar_horarios();
}
function guardarHorarioPersona() {

    //var persona=$("#personasID").val();
    var fecha=$("#fecha_horario").val();
    var id_reloj=$("#id_reloj").val();
    var altaHoraEnt=$("#altaHoraEnt").val();
    var altaMinEnt=$("#altaMinEnt").val();
    var altaHoraSal=$("#altaHoraSal").val();
    var altaMinSal=$("#altaMinSal").val();

    var item=$("#item").val();
    $.ajax({
        type: "post",
        url: "controlador.php",
        data: "action=guardarHorarioPersona&fecha="+fecha+"&id_reloj="+id_reloj+"&altaHoraEnt="+altaHoraEnt+"&altaMinEnt="+altaMinEnt+"&altaHoraSal="+altaHoraSal+"&altaMinSal="+altaMinSal,
        success: function (data) {
            buscar_horarios($("#periodo").val());
        }
    });

}
function trae_nc_reporte(){
    var id_proceso=$("#procesoID").val();
    var id_sector=$("#sectorID").val();
    var fecha_desde=$("#fecha_desde").val();
    var fecha_hasta=$("#fecha_hasta").val();
    $("#listado").load('trae_reporte_grafico.php?id_sector='+id_sector+'&id_proceso='+id_proceso+'&fecha_desde='+fecha_desde+'&fecha_hasta='+fecha_hasta,function() {
        $('[data-toggle="popover"]').popover();
    });
}
function newSuggestFiltroReporte(input, inputHidden, flag){
//alert('hola');
    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            trae_nc_reporte();
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}
function trae_reporte_competencia(){
    var id_proceso=$("#procesoID").val();
    $("#listado").load('trae_reporte_competencia.php?id_proceso='+id_proceso,function() {
        $('[data-toggle="popover"]').popover();
    });
}
function trae_guardias(){
    var fecha_desde=$("#fecha_desde").val();
    var fecha_hasta=$("#fecha_hasta").val();
    $("#listado").load('trae_guardias.php?fecha_desde='+fecha_desde+'&fecha_hasta='+fecha_hasta,function() {
        $('[data-toggle="popover"]').popover();
    });
}
function verDetalleMantenimiento(tipo_equipo, tipo_mantenimiento, nombre){
    $("#nombre_mantenimiento").html("Detalle de "+nombre);
    $("#detalle_mante").load('traer_item_mantenimiento_detalle.php?tipo_equipo='+encodeURIComponent(tipo_equipo)+'&tipo_mantenimiento='+tipo_mantenimiento);
}

function filtrar_listado_solicitudes(){
    //alert('llega');
    var lugar_filtro=$("#lugar_filtro").val();
    if($("#lugar").val()==""){
        lugar_filtro="";
        $("#lugar_filtro").val("");
    }
    var sector_filtroID=$("#sector_filtroID").val();
    if($("#sector_filtro").val()==""){
        sector_filtroID="";
        $("#sector_filtroID").val("");
    }
    var tipo_equipo_filtro=$("#tipo_equipo_filtro").val();
    var estado_filtro=$("#estado_filtro").val();

    $("#tabla_listado").load('trae_solicitudes.php?lugar_filtro='+lugar_filtro+'&sector_filtroID='+sector_filtroID+'&tipo_equipo_filtro='+tipo_equipo_filtro+'&estado_filtro='+estado_filtro);
}

function newSuggestListaSolicitudes(input, inputHidden, flag){

    var options = {
        script:"lib/ajax.php?flag=" + flag + "&",
        varname:"search",
        json:true,
        callback: function (obj) {
            document.getElementById(inputHidden).value = obj.id;
            filtrar_listado_solicitudes()
        }

    };
    var as_json = new bsn.AutoSuggest(input, options);
}