<body>
<div id="page-content" >

    <div class="block block-themed block-last">

        <div class="block-content">
            <table class="accordion-titulo" >
                <tr >
                    <th width="100%">Colecta Externa</th>
                </tr>
            </table>
            <table class="accordion-content" id="colecta_indicador">
                <thead>
                <tr style="background: red;"  >
                    <th width="5%">Mes</th>
                    <th width="5%">Colectas Programadas</th>
                    <th width="5%">Colectas Realizadas</th>
                    <th width="5%">Promedio Donante</th>
                    <th width="5%">Interior Provincia</th>
                    <th width="5%">Posadas, Garupa y Candelaria</th>
                    <th width="5%">Combutible</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $colectas = $consultas->getColectasExternas($i);
                    ?>
                    <tr style="background: <?php echo $color; ?>; font-size=10px;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $colectas->colectas_programadas; ?></td>
                        <td><?php echo $colectas->colectas_realizadas; ?></td>
                        <td><?php echo $colectas->promedio_donante; ?></td>
                        <td><?php echo $colectas->colectas_realizadas_interior_prov; ?></td>
                        <td><?php echo $colectas->colectas_realizadas_pos_gar_can; ?></td>
                        <td><?php echo $colectas->combustible; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <table class="accordion-titulo">
                <tr  >
                    <th width="100%">Atencion Calificacion</th>
                </tr>
            </table>
            <table class="accordion-content">
                <thead>
                <tr style="background: red;"  >
                    <th width="5%">Mes</th>
                    <th width="5%">Donantes BSCM</th>
                    <th width="5%">Donantes Colectas</th>
                    <th width="5%">Donantes ElDorado</th>
                    <th width="5%">Donantes Obera</th>
                    <th width="5%">Diferidos</th>
                    <th width="5%">Autoexcluidos</th>
                    <th width="5%">Extracion Fallida</th>
                    <th width="5%">Autoexcluidos</th>
                    <th width="5%">Serologia Reactiva</th>
                    <th width="5%">Nro Vencimientos</th>
                    <th width="5%">Descartadas Plasma</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $atencion = $consultas->getProcesoAtencion($i);
                    ?>
                    <tr style="background: <?php echo $color; ?>; font-size=10px; text-align: center;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $atencion->donantes_bscm; ?></td>
                        <td><?php echo $atencion->donantes_colectas; ?></td>
                        <td><?php echo $atencion->donantes_dorado; ?></td>
                        <td><?php echo $atencion->donantes_obera; ?></td>
                        <td><?php echo $atencion->diferidos; ?></td>
                        <td><?php echo $atencion->autoexcluidos; ?></td>
                        <td><?php echo $atencion->extracion_fallida; ?></td>
                        <td><?php echo $atencion->serologia_reactiva; ?></td>
                        <td><?php echo $atencion->n_vencimientos; ?></td>
                        <td><?php echo $atencion->uni_descartadas_prod_plasma; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(".accordion-titulo").click(function(){

        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open
            contenido.slideDown(250);
            $(this).addClass("open");
        }
        else{ //close
            contenido.slideUp(250);
            $(this).removeClass("open");
        }

    });
</script>
<style>
    body{
        background: #ecf0f1;
    }

    #container-main{
        margin:40px auto;
        width:95%;
        min-width:320px;
        max-width:960px;
    }

    .accordion-container {
        width: 100%;
        margin: 0 0 20px;
        clear:both;
    }

    .accordion-titulo {
        position: relative;
        display: block;
        padding: 20px;
        font-size: 24px;
        font-weight: 300;
        background: #2c3e50;
        color: #fff;
        text-decoration: none;
    }
    .accordion-titulo.open {
        background: darkred;
        color: #fff;
    }
    .accordion-titulo:hover {
        background: red;
        cursor: pointer;
    }
    .accordion-content tr:hover {
        background: red;
        cursor: pointer;
    }
    .accordion-titulo span.toggle-icon:before {
        content:"+";
    }

    .accordion-titulo.open span.toggle-icon:before {
        content:"-";
    }

    .accordion-titulo span.toggle-icon {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 38px;
        font-weight:bold;
    }

    .accordion-content {
        display: none;
        padding: 20px;
        overflow: auto;
    }

    .accordion-content p{
        margin:0;
    }

    .accordion-content img {
        display: block;
        float: left;
        margin: 0 15px 10px 0;
        width: 50%;
        height: auto;
    }


    @media (max-width: 767px) {
        .accordion-content {
            padding: 10px 0;
        }
    }
</style>
</body>
<?php include_once 'footer.php' ?>
