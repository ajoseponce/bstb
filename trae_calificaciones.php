<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getCalificaciones($_REQUEST['id_usuario'],$_REQUEST['id_examen']);
?>

<table class="sui-table" style="width: 100%">
        <thead>
        <tr style="background: red; color: white;"  >
            <th>Persona</th>
            <th>Examen</th>
            <th>Calificacikon</th>
        </tr>
        </thead>
        <?php
        if($result){
            foreach ($result as $v) { ?>
             <tr>
                <td><?php echo $v->nombre; ?></td>
                <td><?php echo $v->examen; ?></td>
                <td><?php echo $v->nota; ?></td>
             </tr>
        
            <?php
            }
        }else{
            ?>
             <tr>
                 <td colspan="3">No contiene registros</td>
             </tr>
        <?php     
        }
        ?>
            
 </table>        
<script src="js/funciones.js"></script>