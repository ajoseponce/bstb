<body>

<div id="page-content" >
<div class="clearfix">
   
    <button onclick="location.href='controlador.php?action=carga_poe'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar un nuevo POES</button>
   
</div>
<div class="block block-themed block-last">
    
    <div class="block-content">
        
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th>ID</th>
                <th style="width: 25%;" >Descripcion</th>
                <th>Version</th>
                <th>Fecha Version </th>
                <th>Estado </th>
                <th>&nbsp;Documento </th>
                <th style="width: 25%;">Registros </th>
                
                <th style="width: 2%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
        ?>
            <tr>
                <td class="span1 text-left"><?php echo (int)$r->id_poe ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->version; ?></td>
                <td class="span1 text-left"><?php echo $r->fecha_version; ?></td>
                <td class="span1 text-left"><?php echo ($r->estado=='A')?"Alta":"Baja"; ?></td>
                <td class="span1 text-center"><?php 
                    if (file_exists("archivos/poe_".$r->id_poe.".doc")) { 
                    ?> 
                    <img style="cursor: pointer;" src="img/word.png" onclick="ver_doc(<?php echo $r->id_poe; ?>)"/>
                    <?php } ?>  
                </td> 
                <td class="span1 text-left"> <?php
                    $result = $consultas->getRegistros((int)$r->id_poe); ?>
                    <?php
                    if($result){
                        foreach ($result as $v) { ?>
                         
                            <?php echo $v->descripcion; ?>
                            
                            <?php 
                                if ($v->nombre_archivo) { 
                                ?> 
                                <img style="cursor: pointer;" src="img/registro.png" onclick="ver_doc_registro('<?php echo $v->nombre_archivo; ?>')"/>
                                <?php } ?>  
                            
                            
                                </br> 

                        <?php
                        }
                    }else{
                        ?>
                         No contiene registros
                         
                    <?php     
                    }
                    ?>
                </td> 
                
                <td class="span2 text-left"><a href="controlador.php?action=edita_poe&id_poe=<?php echo (int)$r->id_poe ?>"><img style="cursor: pointer;" src="img/edit.png"/></td>
                
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

