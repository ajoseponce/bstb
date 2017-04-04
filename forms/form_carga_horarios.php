<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 02/09/2016
 * Time: 10:07 AM
 */?>
<html>
<body>
<div id="page-content" >

    <div class="block block-themed block-last">
        <div class="modal-header">
            <button type="button" onclick="cierraModal()" class="close" data-dismiss="modal">×</button>
            <h4> Carga Horarios</h4>
        </div>

        <form enctype="multipart/form-data" id="formuploadajax" method="post">
            <h3>Detalle</h3>
            <p><textarea id="observaciones"  name="observaciones" style="width: 1253px; height: 197px;"></textarea></p>
            <input  type="file" id="archivo" name="archivo"/>

            <br /><br /><br />

            <input type="submit" class="btn btn-success" value="Guardar"/>
        </form>
        <div id="mensaje"></div>
    </div>
</div>
</body>
</html>

<script>
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                    url: "carga_horarios.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res){
                    cierraModal();
                    buscar_item_matenimiento();
                    //$("#mensaje").html("Respuesta: " + res);
                });
        });
    });
</script>
<?php include_once 'footer.php' ?>

