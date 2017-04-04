<body>

<div id="page-content" >

<div class="block block-themed block-last">
    <form id="form_datos" name="form_datos" >
    <div class="block-content">
    <?php if($preguntas){
    foreach ($preguntas as $a) {  
    ?>    
    <table class="table">
        <thead>
            <tr style="background: #B4B4B4;" >
                <th><?php echo $a->descripcion; ?></th>
            </tr>
        </thead>
    </table> 
        
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th style="width: 95%;" >Opcion</th>
                
            </tr>
        </thead>
        
        <tbody>
        <?php
        $result_user = $consultas->getRespuestas($a->id_pregunta, $_REQUEST['id_examen']);
        $k=0;
        if($result_user){
        foreach ($result_user as $r) {
        ?>
            <tr>
                <td class="span1 text-left">&CircleDot;</td>
                <td class="span1 text-left"><?php echo ($r->correcto=='S')?"(Correcta)":""; ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                
            </tr>
        <?php  }} ?>
        </tbody>    
    </table>                     
    <?php }} ?>
    </div>
        <div class="clearfix">
        <input id="id_examen" type="hidden" name="id_examen" value="<?php echo $_REQUEST['id_examen']; ?>"/>
        <input id="action" type="hidden" name="action" value="validar_examen_entero"/>
        
        <button onclick="validar_examen()" type="button" class="btn btn-success"><i class="icon-plus"></i> Validar Examen</button>
        <button onclick="volver_listado()" type="button" class="btn btn-inverse"><i class="icon-bullhorn"></i> Volver al Listado</button>
        </div>
    </form>    
    </div>     
    </div> 
    </div>
            <!-- END Modal Tabs -->
    </div>
</body>
</html>
<?php include_once 'footer.php' ?>
