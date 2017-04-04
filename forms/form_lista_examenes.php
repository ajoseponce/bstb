<body>
<div id="page-content" >

<div class="block block-themed block-last">
    
    <div class="block-content">
        
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th>ID</th>
                <th style="width: 25%;" >Nombre Examen</th>
                <th>Poe</th>
                <th>Rendir</th>
                                
            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
            
        $estado = $consultas->getRindioExamen((int)$r->id_examen);
        //echo "<br>";
        ?>
            <tr>
                <td class="span1 text-left"><?php echo (int)$r->id_examen ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->poe; ?></td>
                <td class="span1 text-left">
                    <?php if($estado){
                        echo "Su Nota fue un ".$estado;
                        ?>
                    
                    <?php }else{ ?>
                    <a href="controlador.php?action=rendir_poe&id_examen=<?php echo (int)$r->id_examen ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                    <?php    
                    } ?>
                </td>
                
                
            </tr>
        <?php  }} ?>
        </tbody>    
    </table>                     
    
    </div> 
    </div>
            <!-- END Modal Tabs -->
    </div>
</body>
</html>
<?php include_once 'footer.php' ?>