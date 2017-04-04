<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_responsable_sector'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar Nuevo Responsable</button>

    </div>
    <div class="block block-themed block-last">

        <div class="block-content">
            <table class="table">
                <thead>
                    <tr style="background: red;"  >
                        <th width="34%">&nbsp;Persona</th>
                        <th width="40%">&nbsp;Sector</th>
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
                            <td><?php echo $r->persona; ?></td>
                            <td><?php echo $r->sector; ?></td>
                            <td>
                                <a href="controlador.php?action=edita_responsable_sector&id_relacion=<?php echo (int)$r->id_relacion ?>"><img style="cursor: pointer;" src="img/edit.png"/>
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
</html>
<?php include_once 'footer.php' ?>