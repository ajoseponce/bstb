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
            <tr style="background: black;" >
                <th><?php echo $a->descripcion; ?></th>
            </tr>
        </thead>
    </table> 
        
    <table class="table">
        <thead>
            <tr style="background: red;" >
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
                <td class="span1 text-left"><input type="radio" name="pregunta<?php echo $a->id_pregunta; ?>" value="<?php echo $r->id_respuesta; ?>"/></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                
            </tr>
        <?php  }} ?>
        </tbody>    
    </table>                     
    <?php }} ?>
    </div>
        <div class="clearfix">
        <input id="id_examen" type="hidden" name="id_examen" value="<?php echo $_REQUEST['id_examen']; ?>"/>
        <input id="action" type="hidden" name="action" value="calificar_alumno"/>
        
        <button onclick="calificar_alumno()" type="button" class="btn btn-success"><i class="icon-plus"></i> Calificar Examen</button>
        </div>
    </form>    
    </div>     
    </div> 
</div>
</div>
</body>
</html>
<?php include_once 'footer.php' ?>