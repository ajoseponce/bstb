<body>
<div id="page-content" >
    <div class="clearfix">

        <button onclick="location.href='controlador.php?action=carga_aplicativos'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo Aplicativos</button>

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
                    <th>Nombre en Aplicativo</th>
                    <th>Nombre en Menu</th>
                    <th>Nombre Case</th>
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
                            <td class="span1 text-left"><?php echo (int)$r->id_aplicativo ?></td>
                            <td class="span1 text-left"><?php echo $r->nombre_menu; ?></td>
                            <td class="span1 text-left"><?php echo $r->nombre_menu_agrupador; ?></td>
                            <td class="span1 text-left"><?php echo $r->nombre_action; ?></td>

                            <td class="span2 text-left"><a href="controlador.php?action=edita_aplicativo&id_aplicativo=<?php echo (int)$r->id_aplicativo ?>"><img style="cursor: pointer;" src="img/edit.png"/></td>

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
