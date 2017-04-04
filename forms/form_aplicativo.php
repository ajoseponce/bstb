<body>

<!--/**************************/-->
<div id="page-content">

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Datos Personas</h4>
        </div>
        <div class="block-content">

            <form id="form_datos" method="post" class="form-horizontal" >
                <!-- Default Inputs -->

                <div class="control-group">
                    <label class="control-label" for="general-text">Nombre Menu </label>
                    <div class="controls">
                        <input value="<?php echo (isset($result->nombre_menu))?$result->nombre_menu:""; ?>" id="nombre_menu"  name="nombre_menu"   class="span5" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Nombre Accion </label>
                    <div class="controls">
                        <input value="<?php echo (isset($result->nombre_action))?$result->nombre_action:""; ?>" id="nombre_action"  name="nombre_action"   class="span5" type="text">
                    </div>
                </div>
                <div class="form-actions">
                    <input id="id_aplicativo" type="hidden" name="id_aplicativo" value="<?php echo (isset($result->id_aplicativo))?$result->id_aplicativo:""; ?>">
                    <input id="action" type="hidden" name="action" value="guardar_aplicativo">
                    <button type="reset" onclick="location.href='controlador.php?action=listar_aplicativos'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="save_datos_personas()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar Aplicativo</button>
                </div>
            </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>

<script>

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