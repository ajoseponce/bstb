<?php
session_start();
/**************INCLUDES*****************************/
include('lib/DB_Conectar.php');
include('lib/functions.php');
/******************************************************/
if(isset($_SESSION['id'])){
  header('Location: principal.php');
}
$alerta="none";
if(isset($_POST["btnSubmit"])){
//    echo "entro";
//    exit;
    if(checkLogin($_POST["usuario"], $_POST["password"])){
        //session_start();
        $sql = "SELECT * FROM bstb.usuarios WHERE nombre='".$_POST['usuario']."'";

        //echo $sql;
        $usuario_datos=@mysql_query($sql);
        $_SESSION["_userName"] = $_POST["usuario"];
        $_SESSION["_userPass"] = md5($_POST["password"]);
        $usuario=mysql_fetch_array($usuario_datos);

        $id_user=$usuario[0];
        $_SESSION['id']=$usuario[0];
        $_SESSION['id_persona']=$usuario[3];

        $nombre=@mysql_query("SELECT * FROM bstb.personas WHERE id_persona='".$usuario[3]."'");
        $nombre_comp=mysql_fetch_array($nombre);
        $_SESSION['nombre']=$nombre_comp['nombre'].' '.$nombre_comp['apellido'];
        //header('Location:index_dominio.php');
        header('Location:principal.php');
    }
    else{
        session_start();
        session_destroy(); //hago esto para poder destruir la session y probar si me niega el acceso a una pagina que tenga requireLogin
        //$error->add('',LEVEL_ERROR_WARNING,'Su usuario o contraseña son incorrectos.');
        //$error = "error";
        $alerta="";
    }
}
?>
    <?php include 'header.php'; ?>

    <body class="login">

        <!-- Login Intro -->
        
        <!--<div class="left-door"></div>
        <div class="right-door"></div>
        <!-- END Login Intro -->

        <!-- Login Container -->
        <div id="login-container">
            <div id="rojo" style="display: <?php echo $alerta; ?>;" class="alert alert-error"><i class="icon-remove-sign"> </i>Verifique su usuario y contraseña</div>
            <!-- Login Block -->
            <div class="block-tabs block-themed themed-border-night">
                <ul id="login-tabs" class="nav nav-tabs themed-background-deepsea" data-toggle="tabs">
                    <li class="active text-center">
                        <a href="#login-form-tab">
                            <i class="icon-user"></i> Login
                        </a>
                    </li>
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="login-form-tab">
                        <form action="index.php" method="post" id="login-form" class="form-inline">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-user"></i></span>
                                        <input type="text" id="usuario" name="usuario" placeholder="Usuario..">
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on"><i class="icon-cog"></i></span>
                                        <input type="password" id="password" name="password" placeholder="Password..">
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <div class="pull-right">
                                        <button name="btnSubmit" type="submit" class="btn btn-success remove-margin">Ingresar</button>
                                    </div>
                                    <div class="pull-left login-extra-check">
                                        <label for="login-remember-me">
                                            <input type="checkbox" id="login-remember-me" name="login-remember-me" class="input-themed">
                                            Recordar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Login Form -->
                    </div>
                    
                </div>
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- Jquery library from Google ...
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- ... but if something goes wrong get Jquery from local file 
        <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!--
        Include Google Maps API for global use.
        If you don't want to use the Google Maps API globally, just remove this line and the gmaps.js plugin from js/plugins.js (you can put it in a seperate file)
        Then iclude them both in the pages you would like to use the google maps functionality
        
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

        <!-- Jquery plugins and custom javascript code -->
        

        <!-- Javascript code only for this page -->
        
    </body>
</html>