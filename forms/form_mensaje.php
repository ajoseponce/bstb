<body>

<div id="page-content" >

<div class="block block-themed block-last">
    
    <div class="block-content">
       
    <table class="table">
        <thead>
            <tr style="background: #B4B4B4;" >
                <th>Atencion!!!</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="span1 text-left"><?php echo $mensaje; ?></td>
            </tr>
            <?php if($url){ ?>
            <tr>
                <td class="span1 text-left">
                    <button type="reset" onclick="location.href='<?php echo $url; ?>'" class="btn btn-danger"><i class="icon-repeat"></i> Volver al listado</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>    
    </table>                     
    
    </div>     
    </div> 
    </div>
            <!-- END Modal Tabs -->
    </div>
 </body>
</html>
<?php include_once 'footer.php' ?>