    <?php
    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    
    $result = $consultas->getItems($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);    
    ?>    
    <table class="sui-table">
        <thead>
        <tr style="background: red; color: white;"  >
            <th width="5%">&nbsp;</th>
            <th width="15%">Titulo</th>
            <th width="50%">Descripcion</th>
            <th width="5%">Frecuencia</th>
            <th width="5%">Condicion</th>
            <th width="5%">Costo</th>
            <th width="5%">Tiempo</th>
            <th width="5%">Estado</th>
            <th width="5%">&nbsp;</th>
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
                }?>
             <tr style="border-bottom: 2px solid dimgrey;">
                <td><img src='img/edit.png' onclick='edita_item(<?php echo $v->id_registro ?>)'  title='Editar Item'></td>
                 <td><?php echo $v->titulo; ?></td>
                 <td><?php echo nl2br($v->descripcion); ?></td>
                <td style="text-align: center;"><?php echo $frecuencia; ?></td>
                <td style="text-align: center;"><?php echo $v->condicion; ?></td>
                <td style="text-align: center;"><?php echo $v->costo; ?></td>
                <td style="text-align: center;"><?php echo $v->tiempo; ?></td>
                <td style="text-align: center;"><?php echo ($v->estado=='A')?"Alta":"Baja"; ?></td>
                <td>
                    <?php echo ($v->estado=='A')?"<img src='img/delete.png' onclick='elimina_item(".$v->id_registro.")'  title='Elimina'> ":"<img src='img/cierra_info.png'>"; ?></td>
             </tr>
             <?php
        }}else{?>
             <tr>
                 <td colspan="3">No contiene item</td>
             </tr>
        <?php     
        }
        ?>

    </table> 
  
