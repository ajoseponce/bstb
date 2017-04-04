<body>
<div id="page-content" >
<div class="clearfix">
   
    <button onclick="location.href='controlador.php?action=carga_relacion_poe_area'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva relacion</button>
   
</div>
<div class="block block-themed block-last">
    
    <div class="block-content">
    <table class="table">
        <thead>
        <tr style="background: red;"  >
            <th width="34%">Proceso</th>
            <th width="40%">&nbsp;POE's</th>
            <th width="5%">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
            if ($k==0){$color="";}else{$color=" #7a8c74";}
            ?>
            <tr style="background: <?php echo $color; ?>; font-size=10px;">
                <td><?php echo $r->area; ?></td>
                <td><?php echo $r->poe; ?></td>
                <td>
                    <a href="controlador.php?action=edita_relacion&id_relacion=<?php echo (int)$r->id_registro ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                </td>
            </tr>
        <?php
        $k = 1 - $k;
        }} ?>
        </tbody>
    </table>
    </div> 
    </div>
    </div>
</body>
</html><?php include_once 'footer.php' ?>