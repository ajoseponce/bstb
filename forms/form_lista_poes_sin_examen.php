<body>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>POEs Sin Examen</h4>
        </div>
        <div class="block-content">

            <table class="table">
                <thead>
                <tr style="background: red;" >
                    <th style="width: 5%;" >ID POE</th>
                    <th style="width: 75%;" >Descripcion</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result_poes_sinexamen){
                    foreach ($result_poes_sinexamen as $r) {
                        ?>
                        <tr>
                            <td ><?php echo $r->id_poe; ?></td>
                            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay Poes Sin Examen </td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
<?php include_once 'footer.php' ?>

