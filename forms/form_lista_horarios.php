<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Horarios Personal</h4>
            </div>
            <div class="control-group">
                <label class="control-label" for="general-text">A&ntilde;o</label>
                <div class="controls">
                    <select id="anio" onchange="buscar_horarios()">
                        <option value='2016'>2016</option>
                        <option value='2017'>2017</option>
                        <option value='2018' selected="selected">2017</option>
                    </select>
                </div>
            </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Periodo</label>
                    <div class="controls">
                        <select id="periodo" onchange="buscar_horarios()">
                            <?php for ($i = 1; $i <= 12; $i++) {
                                echo "<option value='";echo ($i<10)?"0".$i:$i; echo "'>";echo saber_mes($i)."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Personal Tecnico</label>
                    <div class="controls">
                        <input  id="persona"  name="persona"  class="input-large" value="" type="text">
                        <input  id="personaID"  name="personaID"  class="input-large" value="" type="hidden">
                        <img src="img/limpiar.png" style="cursor: pointer;" onclick="borrar_filtros_horarios()">    
                    </div>
                </div>
                <div class="control-group" >
                    <!-- <label class="control-label" for="general-text">Exportar listado</label> -->
                    <div class="controls" style="float: right;">
                         <img src="img/exel.png" onclick="exporta_horarios()" style="cursor: pointer;" />
                    </div>
                </div>

            </div>


        </form>


<div id="listado">

</div>

</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form(){
        var error=0
        if($("#fecha_colecta").val() ==""){
            error=1
        }
        if($("#cantidad_intgrantes").val() =="0"){
            error=1
        }
        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }
    function eliminar_inte(persona) {
        $("#persona_identificador_"+persona).remove();
        $("#cantidad_intgrantes").val(parseInt($("#cantidad_intgrantes").val())-1);
    }

    newSuggestReloj('persona', 'personaID', 'P');
</script>
</body>
<?php
function saber_mes($mes) {

    switch ($mes){

        case 1: return "Enero"; break;
        case 2: return "Febrero"; break;
        case 3: return "Marzo"; break;
        case 4: return "Abril"; break;
        case 5: return "Mayo"; break;
        case 6: return "Junio"; break;
        case 7: return "Julio"; break;
        case 8: return "Agosto"; break;
        case 9: return "Septiembre"; break;
        case 10: return "Octubre"; break;
        case 11: return "Noviembre"; break;
        case 12: return "Diciembre"; break;

    }
    //return $frecuencia;
}
?>

</html><?php include_once 'footer.php' ?>
