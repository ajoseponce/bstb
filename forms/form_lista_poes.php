<body>
<div id="page-content" >
<div class="block block-themed block-last">
    
    <div class="block-content">
    <?php if($result_areas_user){
    foreach ($result_areas_user as $a) {  
    ?>    
    <table  class="accordion-titulo" >
        <thead>
            <tr >
                <th><?php echo $a->descripcion; ?></th>
            </tr>
        </thead>
    </table> 
    <div  class="accordion-content">
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <!--<th>ID</th>-->
                <th style="width: 25%;" >Descripcion</th>
                <th>Version</th>
                <th>Fecha Version </th>
                <th>&nbsp;Documento </th>
                <th style="width: 25%;">Registros </th>
                <!-- <th style="width: 2%;">&nbsp; </th>-->
            </tr>
        </thead>
        
        <tbody>
        <?php
        $result_user = $consultas->getPoes($a->id_area);
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
        ?>
            <tr style="font-size: 12px;">
                <!--<td class="span1 text-left"><?php echo (int)$r->id_poe ?></td>-->
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->version; ?></td>
                <td class="span1 text-left"><?php echo $r->fecha_version; ?></td>
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
                
                <!--<td class="span2 text-left"><a href="controlador.php?action=edita_poe&id_poe=<?php echo (int)$r->id_poe ?>"><img style="cursor: pointer;" src="img/edit.png"/></td>-->
                
            </tr>
        <?php  }}else{ ?>
            <tr>
                <td colspan="5" class="span1 text-left">No Contiene poes cargados</td>
            </tr>
        <?php    
        } ?>
        </tbody>    
    </table>
    </div>
    <?php }} ?>
    </div> 
    </div>
            <!-- END Modal Tabs -->
    </div>
</body>
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
        background: gainsboro;
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
        float: inherit;
        margin: 0 15px 10px 0;
        width: 15%;
        height: auto;
    }


    @media (max-width: 767px) {
        .accordion-content {
            padding: 10px 0;
        }
    }
</style>
</html>
<?php include_once 'footer.php' ?>


