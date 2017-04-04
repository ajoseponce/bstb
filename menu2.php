<header class="navbar navbar-inverse">
                <!-- Navbar Inner -->
<div class="navbar-inner">
<!-- div#row-fluid -->
<div class="row-fluid">
    <!-- Sidebar Toggle Buttons (Desktop & Tablet) -->
    <div class="span4 hidden-phone">
        <ul class="nav pull-left">
            <!-- Desktop Button (Visible only on desktop resolutions) -->
            <li class="visible-desktop">
                <a href="javascript:void(0)" id="toggle-side-content">
                    <i class="icon-reorder"></i>
                </a>
            </li>
            <li class="visible-tablet">
                <!-- It is set to open and close the left sidebar on tablets. The class .nav-collapse was added to aside#page-sidebar -->
                <a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-reorder"></i>
                </a>
            </li>
            <!-- END Tablet Button -->

            <!-- Divider -->
            <li class="divider-vertical remove-margin"></li>
        </ul>
    </div>
    <!-- END Sidebar Toggle Buttons -->

    <!-- Brand and Search Section -->
    <div class="span4 text-center">
        <!-- Top search -->
        <form id="top-search" class="pull-left" action="page_ready_search_results.html" method="post">
            <input type="hidden" id="search-term" name="search-term" placeholder="Search..">
        </form>
        <a href="index.php" class="brand">
            <img src="img/header.png" alt="logo">
        </a>
        <!-- END Logo -->

        <!-- Loading Indicator, Used for demostrating how loading of notifications could happen, check main.js - uiDemo() -->
        <div id="loading" class="hide"><i class="icon-spinner icon-spin"></i></div>
    </div>
    <!-- END Brand and Search Section -->

    <!-- Header Nav Section -->
    <div  id="header-nav-section" class="span4 clearfix">
        <!-- Header Nav -->
        <ul class="nav pull-right">
            <!-- Theme Options, functionality initialized at main.js - templateOptions() -->
            <li onclick="location.href='controlador.php?action=buscar_equipo_correctivo'">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/correctivo.png" title="Solicitud Correctivo"></a>
            </li>
            
            <li onclick="location.href='controlador.php?action=busca_equipo'">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/mantenimiento_menu.png" title="Cargar Mantenimiento"></a>
            </li>
            <li onclick="location.href='controlador.php?action=lista_examenes'">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Examenes</a>

            </li>
            <li onclick="location.href='controlador.php?action=lista_poes'">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">POES</a>

            </li>
            <li class="dropdown dropdown-theme-options">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?></a>

            </li>
            <li class="dropdown dropdown-theme-options" onclick="location.href='controlador.php?action=logout'">
                <a href="index.php" class="dropdown-toggle" data-toggle="dropdown"><img src="img/exit.png"/></a>

            </li>
            <li class="divider-vertical remove-margin"></li>
<!--            <li class="dropdown dropdown-notifications">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-warning-sign"></i>
                    <span class="badge badge-neutral">8</span>
                </a>
                <ul class="dropdown-menu">
                    <li style="display: block;">
                        <div class="alert">
                            <i class="icon-bell"></i> <strong>App</strong> attencion!
                        </div>-
                        <?php  $result_aplicativos = $consultas->getAplicativos(); 
                        if($consultas->getAplicativosNotificacion()){
                        if($result_aplicativos){
                            foreach ($result_aplicativos as $a) { 
                            if($a->tabla!=null){
                                $result_estado_apli = $consultas->getControlIndicadores($a->tabla);
                                if($result_estado_apli<7){
                                    ?>
                                    <div class="alert alert-error">
                                        <i class="icon-bell-alt"></i> <strong><?php echo $a->nombre_menu; ?></strong> Incompleto!
                                    </div>
                                <?php 
                                }else{
                                    ?>
                                    <div class="alert alert-success">
                                        <i class="icon-bullhorn"></i> <strong><?php echo $a->nombre_menu; ?></strong> Completo!
                                    </div>
                                <?php 
                                }
                                }
                                }
                            }
                        }    
                        ?>
                        
                        <div class="alert alert-info">
                            <i class="icon-bolt"></i> <strong>App</strong> Informacion gral!
                        </div>
                        <div class="alert alert-success">
                            <i class="icon-bullhorn"></i> <strong>App</strong> ni idea!
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)"><i class="icon-warning-sign pull-right"></i>Centro  de notificaciones</a>
                    </li>
                </ul>
            </li>-->
        </ul>
        <ul class="nav pull-left visible-phone">
            <li>
                <!-- It is set to open and close the main navigation on mobiles. The class .nav-collapse was added to aside#page-sidebar -->
                <a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-reorder"></i>
                </a>
            </li>
            <li class="divider-vertical remove-margin"></li>
        </ul>
        <!-- END Mobile Navigation, Shows up on mobile -->
    </div>
    <!-- END Header Nav Section -->
</div>
<!-- END div#row-fluid -->
</div>
<!-- END Navbar Inner -->
</header>
<aside id="page-sidebar" class="nav-collapse collapse">
                
        <div class="sidebar-tabs-con">
            <ul class="sidebar-tabs" data-toggle="tabs">
                <li class="active">
                    <a href="#side-tab-menu"><i class="glyphicon-list"></i></a>
                </li>
                <!--<li>
                    <a href="#side-tab-extra"><i class="glyphicon-user">hola2</i></a>
                </li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="side-tab-menu">
                    <!-- Primary Navigation -->
                    <nav id="primary-nav">
                        <ul>
                            <li>
                                <a href="index.php"><i class="glyphicon-display"></i>cipal</a>
                            </li>

                            <li>
                                <a href="#" class="menu-link"><i class="glyphicon-list"></i>Datos Estadisticos</a>
                                <ul style="display: block;">
                                    <?php 
                                    $result_menu = $consultas->getMenu();
                                    //$result_xxx = $consultas->getMenuAgrupador();
                                    //exit;
                                    if($result_menu){
                                        foreach ($result_menu as $r) {
                                        ?>
                                        <li>
                                            <a href="controlador.php?action=<?php echo $r->nombre_action ?>"><?php echo $r->nombre_menu ?></a>
                                        </li>
                                    <?php }
                                    }else{
                                        ?>
                                        <li>
                                            <a href="#">No Tiene aplicativos</a>
                                        </li>
                                        <?php
                                    }?>
                                    
                                 </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- END Primary Navigation -->
                </div>

            </div>
        </div>
        <!-- END Sidebar Tabs -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</aside>
