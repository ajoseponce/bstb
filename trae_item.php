    <?php
    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    
    $result = $consultas->getItemsMantenimeinto($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);    
    ?>    
    <table class="sui-table">
        <thead>
        <tr style="background: red; color: white;"  >
            <th width="15%">Titulo</th>
            <th width="50%">Descripcion</th>
            <th width="5%">&nbsp;</th>
            <th width="25%">Condicion</th>
            <th width="25%">Frecuencia</th>
        </tr>
        </thead>
        <?php
        if($result){
            foreach ($result as $v) {
                switch ($v->frecuencia) {
                    case "7": $frecuencia="Semanal"; break;
                    case "1": $frecuencia="Diario"; break;
                    case "15": $frecuencia="Quincena"; break;
                    case "30": $frecuencia="Mensual"; break;
                    case "90": $frecuencia="Trimestral"; break;
                    case "180": $frecuencia="Semestral"; break;
                    case "365": $frecuencia="Anual"; break;
                    case "88": $frecuencia="Previo Uso"; break;
                    case "99": $frecuencia="Posterior Uso"; break;
                }
                ?>
             <tr>
                 <td><?php echo $v->titulo; ?></td>
                <td><?php echo nl2br($v->descripcion); ?></td>
                <td><?php 
                switch ($v->tipo) {
                    case "checkbox":
                        echo "<input type='checkbox' name='item_".$v->id_registro."' value='S'>";
                    break;    
                    case "textarea":
                        echo "<textarea name='item_".$v->id_registro."'></textarea>";
                    break;    
                }
                ?></td>
                 <td><?php echo $v->cond; ?></td>
                 <td class="span1 text-left"><?php echo $frecuencia; ?></td>
             </tr>
             <?php
        }?>
        <tr>
            <td colspan="3">
                <input id="action" type="hidden" name="action" value="guardar_mantenimiento">
                <button  type="button" onclick="save_datos_equipo()" class="btn btn-success"><i class="icon-ok"></i> Guardar Mantenimiento</button>
                
            </td>
        </tr>
        <?php }else{?>
             <tr>
                 <td colspan="3">No contiene item</td>
             </tr>
        <?php     
        }
        ?>
        
    </table> 
  
