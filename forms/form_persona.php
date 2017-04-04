<body>
<plugin name="com.phonegap.plugins.barcodescanner" spec="1.1.0" source="pgb" />
<!--/********jquery.validity******************/-->
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery-1.9.0.min.js"></script>
<script src="validate/jquery.validity.js"></script>
<script>
        $(function() {
            $("#form_datos").validity(function() {
                $("#nombre").require();
                $("#apellido").require();
                $("#dni").require();
                $("#fecha_nacimiento").require();
            });    
        });    
    </script>
<!--/**************************/-->
<div id="page-content">
    
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Datos Personas</h4>
    </div>
    <div class="block-content">
        <?php echo "sexoo".$result->sexo; ?>
        <form id="form_datos" method="post" class="form-horizontal" >
            <!-- Default Inputs -->
<!--            <div class="control-group">-->
<!--                <label class="control-label" id="label_codigo" for="general-text">Codigo DNI </label>-->
<!--                <div class="controls">-->
<!--                    <input value="" id="codigo"  name="codigo"   class="span5" type="text" onchange="cargar_datos(this.value)">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label" id="label_codigo" for="general-text">Codigo 2 </label>-->
<!--                <div class="controls">-->
<!--                    <input type="file" accept="image/*;capture=camera">-->
<!--                </div>-->
<!--            </div>-->
        <div class="control-group">
            <label class="control-label" for="general-text">Nombre </label>
            <div class="controls">
                <input value="<?php echo (isset($result->nombre))?$result->nombre:""; ?>" id="nombre"  name="nombre"   class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Apellido</label>
            <div class="controls">
                <input value="<?php echo (isset($result->apellido))?$result->apellido:""; ?>" id="apellido"  name="apellido" class="span5" type="text">
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="general-text">DNI</label>
            <div class="controls">
                <input value="<?php echo (isset($result->dni))?$result->dni:""; ?>" id="dni"  name="dni" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Fecha de Nacimiento</label>
            <div class="controls">
                <input onKeyUp = "this.value=formateafecha(this.value);" value="<?php echo (isset($result->fecha_nacimiento))?$result->fecha_nacimiento:""; ?>" id="fecha_nacimiento"  name="fecha_nacimiento" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Sexo</label>
            <div class="controls">
                <select name="sexo" id="sexo">
                    <option value="" >Seleccione Sexo</option>
                    <option value="F" <?php echo ($result->sexo=='F')?"selected":""; ?>>Femenino</option>
                    <option value="M" <?php echo ($result->sexo=='M')?"selected":""; ?>>Masculino</option>
          </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Domicilio</label>
            <div class="controls">
                <input value="<?php echo (isset($result->domicilio))?$result->domicilio:""; ?>" id="domicilio"  name="domicilio" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Telefono Particular</label>
            <div class="controls">
                <input value="<?php echo (isset($result->telefono_particular))?$result->telefono_particular:""; ?>" id="telefono_particular"  name="telefono_particular" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Telefono Celular</label>
            <div class="controls">
                <input value="<?php echo (isset($result->telefono_celular))?$result->telefono_celular:""; ?>" id="telefono_celular"  name="telefono_celular" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Fecha de Ingreso</label>
            <div class="controls">
                <input onKeyUp = "this.value=formateafecha(this.value);" value="<?php echo (isset($result->fecha_ingreso))?$result->fecha_ingreso:""; ?>" id="fecha_ingreso"  name="fecha_ingreso" class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Dependencia</label>
            <div class="controls">
                <select name="dependencia" id="dependencia">
                    <option value="" >Seleccione Dependencia</option>
                    <option value="P" <?php echo ($result->dependencia=='P')?"selected":""; ?>>Parque de la Salud</option>
                    <option value="M" <?php echo ($result->dependencia=='M')?"selected":""; ?>>Ministerio Salud Publica</option>
                    <option value="C" <?php echo ($result->dependencia=='C')?"selected":""; ?>>Banco de Sangre</option>
                    <option value="PS" <?php echo ($result->dependencia=='PS')?"selected":""; ?>>Promotores de Salud</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Carga Horaria</label>
            <div class="controls">
                <select name="carga_horaria" id="carga_horaria">
                    <option value="" >Seleccione Carga Horariaa</option>
                    <option value="4" <?php echo (isset($result->carga_horaria)=='4')?"selected":""; ?>>4 Hs</option>
                    <option value="6" <?php echo (isset($result->carga_horaria)=='6')?"selected":""; ?>>6 Hs</option>
                    <option value="8" <?php echo (isset($result->carga_horaria)=='8')?"selected":""; ?>>8 Hs</option>

                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="general-text">Rol</label>
            <div class="controls">
                <select name="rol" id="rol">
                    <option value="" >Seleccione rol</option>
                    <option value="Tecnico" <?php echo (($result->rol)=='Tecnico')?"selected":""; ?>>Tecnico</option>
                    <option value="Administrativo" <?php echo (($result->rol)=='Administrativo')?"selected":""; ?>>Administrativo</option>
                    <option value="Bioquimico" <?php echo (($result->rol)=='Bioquimico')?"selected":""; ?>>Bioquimico</option>
                    <option value="Medico" <?php echo (($result->rol)=='Medico')?"selected":""; ?>>Medico/a</option>
                    <option value="Contador" <?php echo (($result->rol)=='Contador')?"selected":""; ?>>Contador/a</option>
                    <option value="Chofer" <?php echo (($result->rol)=='Chofer')?"selected":""; ?>>Chofer</option>
                </select>
            </div>
        </div>
            <div class="control-group">
                <label class="control-label" for="general-text">ID reloj</label>
                <div class="controls">
                    <input value="<?php echo (isset($result->id_reloj))?$result->id_reloj:""; ?>" id="id_reloj"  name="id_reloj" class="span5" type="text">
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input id="id_persona" type="hidden" name="id_persona" value="<?php echo (isset($result->id_persona))?$result->id_persona:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_persona">
            <button type="reset" onclick="location.href='controlador.php?action=listar_personas'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="save_datos_personas()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar Persona</button>
        </div>
        </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>
<script>
    function cargar_datos(str){
        $.ajax({
            url:           "descuartiza_texto.php",
            data:          {cadena: ""+str+""},
            dataType:      'json',
            type: 'get',
            success:       function(data){
                if(data){
                    $('#nombre').val(data.nombre);
                    $('#apellido').val(data.apellido);
                    $('#fecha_nacimiento').val(data.fecha);
                    $('#dni').val(data.dni);
                    if(data.sexo=='M') {
                        $('#sexo option:eq(2)').prop('selected', true);
                    }else{
                        $('#sexo option:eq(1)').prop('selected', true);
                    }
                    $('#codigo').hide();
                    $('#label_codigo').hide();
                }else{
                    alert('Codigo Invalido');
                }

            }
        });
    }
function IsNumeric(valor)
{ 
var log=valor.length; var sw="S"; 
for (x=0; x<log; x++) 
{ v1=valor.substr(x,1); 
v2 = parseInt(v1); 
//Compruebo si es un valor numérico 
if (isNaN(v2)) { sw= "N";} 
} 
if (sw=="S") {return true;} else {return false; } 
} 
var primerslap=false; 
var segundoslap=false; 
function formateafecha(fecha) 
{ 
var long = fecha.length; 
var dia; 
var mes; 
var ano; 
if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
else { fecha=""; primerslap=false;} 
} 
else 
{ dia=fecha.substr(0,1); 
if (IsNumeric(dia)==false) 
{fecha="";} 
if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
} 
if ((long>=5) && (segundoslap==false)) 
{ mes=fecha.substr(3,2); 
if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
else { fecha=fecha.substr(0,3);; segundoslap=false;} 
} 
else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
if (long>=7) 
{ ano=fecha.substr(6,4); 
if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
else { if (long==10){ if ((ano==0) || (ano<1900) || (ano>2100)) { fecha=fecha.substr(0,6); } } } 
} 
if (long>=10) 
{ 
fecha=fecha.substr(0,10); 
dia=fecha.substr(0,2); 
mes=fecha.substr(3,2); 
ano=fecha.substr(6,4); 
// Año no viciesto y es febrero y el dia es mayor a 28 
if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
} 
return (fecha); 
}
</script>
</body>
</html>
<?php include_once 'footer.php' ?>