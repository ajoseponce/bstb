<body>
<div id="page-content" >
<div class="clearfix">
   
    <button onclick="location.href='controlador.php?action=carga_area'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo Proceso</button>
   
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>PROCESOS</h4>
    </div>
    
    <div class="block-content">
        
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th>ID</th>
                <th>Descripcion</th>
                <th>Editar</th>

            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
        ?>
            <tr>
                <td class="span1 text-left"><?php echo (int)$r->id_area ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span2 text-left"><a href="controlador.php?action=edita_area&id_area=<?php echo (int)$r->id_area ?>"><img style="cursor: pointer;" src="img/edit.png"/></td>
                
            </tr>
        <?php  }} ?>
        </tbody>    
    </table>     
   
    </div> 
    </div>
            <!-- END Modal Tabs -->
    </div>
            <!-- END Modal Tabs -->
    </div>

</body>
</html>
<?php include_once 'footer.php' ?>
