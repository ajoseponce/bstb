<body>
<div id="page-content">
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscador Personas</h4>
    </div>
    <div class="block-content">
        
        <form action="controlador.php" id="form_datos" method="post" class="form-horizontal" enctype="multipart/form-data">
         <div class="control-group">
            <label class="control-label" for="general-placeholder">Ingrese DNI de la persona</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input class="span5" value="<?php echo $_REQUEST['dni_filtro'] ?>" type="text"  id="dni_filtro" placeholder="" name="dni_filtro">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        
        
        <div class="form-actions">
            <input id="buscar" type="hidden" name="buscar" value="buscar">
            <input id="action" type="hidden" name="action" value="buscador_sumar">
            <button type="reset" onclick="location.href='controlador.php?action=buscador_sumar'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
            <input  type="submit" class="btn btn-success" value="Buscar"/>
        </div>
        </form>
    </div>
    <?php 
   // error_reporting(E_all);
    if  ($_REQUEST['buscar']=='buscar'){
    $dbconn = pg_connect("host='10.11.12.50' dbname=HemoTrans_BSTB user=postgres password=pablo");
    $query = "SELECT dp.* FROM datos_personales dp WHERE dp.nrodocumento=".$_REQUEST['dni_filtro']." ";
        //echo $query;
        $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "</br>";
            echo "<strong> Apellido y nombre: </strong>".$line['nombre']." ".$line['apellidosoltero'];
            echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";
            echo "<strong> Grupo y Factor: </strong>".$line['grupoabo']." ".$line['factorrh'];
        }
    }    
        fclose($ar);


    ?>
        <!-- END Profile Tab Content -->
    </div>
</div>
            <!-- END Modal Tabs -->
    </div>

</body>
</html>
<?php include_once 'footer.php' ?>