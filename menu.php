<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php include_once 'header.php'; ?>

<body>

<div id="page-container" class="full-width">

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
                        <!-- END Desktop Button -->

                        <!-- Tablet Button -->
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

                        <a href="index.php" class="brand">
                            <img src="img/header.png" alt="logo">
                        </a>

                    <div id="loading" class="hide"><i class="icon-spinner icon-spin"></i></div>
                </div>
                <!-- END Brand and Search Section -->

                <!-- Header Nav Section -->
                <div id="header-nav-section" class="span4 clearfix">
                    <!-- Header Nav -->
                    <ul class="nav pull-right">
                        <?php if($_SESSION['id']==24){ ?>
                        <li class="dropdown dropdown-notifications">
                            <?php $nc_modificadas = $consultas->getNC_modificadas();

                            $contador_nc_modificadas = $consultas->getNC_modificadasCount(); ?>
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <strong><?php echo $contador_nc_modificadas; ?></strong>
                                <img src="img/caution.png" title="Menu Opciones">
                            </a>
                            <?php if($nc_modificadas){
                                ?>
                                <ul class="dropdown-menu"><?php
                                    foreach ($nc_modificadas as $nc){
                                        ?>
                                            <li>
                                                <div style="cursor: pointer;" class="alert" onclick="location.href='controlador.php?action=respuesta_no_conformidades&id_no_conformidad=<?php echo $nc->id_no_conformidad; ?>'">
                                                    <img src="img/no_conformidad.png" title="Cargar Mantenimiento">NC: <?php echo $nc->id_no_conformidad; ?> Se modifico
                                                </div>
                                            </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                        <!-- Theme Options, functionality initialized at main.js - templateOptions() -->
                        <?php $ve_mantenieminto = $consultas->getAplicativoSolicitudes();
                        if($ve_mantenieminto){
                        $contador_solicitudes_pend = $consultas->getSolicitudesByUsuario_estadoSOL('SOL'); ?>
                        <li onclick="location.href='controlador.php?action=listado_solicitudes'" class="dropdown dropdown-theme-options">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <strong><?php echo $contador_solicitudes_pend; ?></strong>
                                <img src="img/solicitudes.png" title="Solictudes Pendientes">
                            </a>
                        </li>
                        <?php }
                        $contador_solicitudes = $consultas->getSolicitudesByUsuario_estado('CERR'); ?>
                        <li onclick="location.href='controlador.php?action=listado_mis_solicitudes'" class="dropdown dropdown-theme-options">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <strong><?php echo $contador_solicitudes; ?></strong>
                                <img src="img/campana.png" title="Mis Solictudes">
                            </a>
                        </li>
                        <li onclick="location.href='controlador.php?action=organigrama'" class="dropdown dropdown-theme-options">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/organigrama.png" title="Organigrama Institucional">
                            </a>
                        </li>
                        <li class="dropdown dropdown-notifications">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/menu_opciones.png" title="Menu Opciones">
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div style="cursor: pointer;" class="alert" onclick="location.href='controlador.php?action=busca_equipo'">
                                        <img src="img/mantenimiento_menu.png" title="Cargar Mantenimiento"> Cargar Mantenimiento
                                    </div>
                                </li>
                                <li>
                                    <div style="cursor: pointer;" class="alert" onclick="location.href='controlador.php?action=listar_ver_no_conformidad'">
                                        <img src="img/no_conformidad.png" title="Cargar Hallazgo">Cargar Hallazgo
                                    </div>
                                </li>
                                <li>
                                    <div style="cursor: pointer;" class="alert" onclick="location.href='controlador.php?action=lista_examenes'">
                                        <img src="img/asignar.png" title="Examenes">Examenes
                                    </div>
                                </li>
                                <li>
                                    <div style="cursor: pointer;" class="alert" onclick="location.href='controlador.php?action=buscar_equipo_correctivo'">
                                        <img src="img/correctivo.png" title="Solicitud Correctivo">Solicitud Correctivo
                                    </div>
                                </li>
                            </ul>
                        </li>
<!--                        <li onclick="location.href='controlador.php?action=lista_poes'">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">POES</a>-->
<!--                        </li>-->
                        <li onclick="location.href='controlador.php?action=lista_poes'" class="dropdown dropdown-theme-options">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/documentacion.png" title="POE's"></a>
                        </li>
                        <li class="dropdown dropdown-theme-options">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/usuario.png" title="<?php echo $_SESSION['nombre']; ?>"></a>
                        </li>
                        <li class="dropdown dropdown-theme-options" onclick="location.href='controlador.php?action=logout'">
                            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown"><img src="img/exit.png"/></a>

                        </li>

                        <!-- END Notifications -->

                        <!-- Messages -->

                        <!-- END Messages -->
                    </ul>
                    <!-- END Header Nav -->

                    <!-- Mobile Navigation, Shows up on mobile -->
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
        <!--
        Wrapper for scrolling functionality
        Used only if the .sticky class added above. You can remove it and you will have a sticky sidebar
        without scrolling enabled when you set the sidebar to be sticky
        -->
        <div class="side-scrollable">
            <!-- Mini Profile -->

            <!-- END Mini Profile -->

            <!-- Sidebar Tabs -->
            <div class="sidebar-tabs-con">
                <ul class="sidebar-tabs" data-toggle="tabs">
                    <li class="active">
                        <a href="#side-tab-menu"><i class="glyphicon-list"></i></a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="side-tab-menu">
                        <!-- Primary Navigation -->
                        <nav id="primary-nav">
                            <ul>
                                <?php
                                //$result_menu = $consultas->getMenu();
                                $result_agrupador = $consultas->getMenuAgrupador();
                                if($result_agrupador){
                                foreach ($result_agrupador as $ra) {
                                    ?>
                                    <li>
                                        <a href="#" class="menu-link"><i class="glyphicon-table"></i><?php echo $ra->descripcion ; ?></a>
                                        <ul>
                                            <?php
                                            $result_menu = $consultas->getMenuAplicativos($ra->id_menu);
                                            if($result_menu){
                                            foreach ($result_menu as $m) {
                                            ?>
                                            <li>
                                                <a href="controlador.php?action=<?php echo $m->nombre_action ?>"><i class="glyphicon-more_windows"></i><?php echo $m->nombre_menu ?></a>
                                            </li>
                                                <?php
                                            }}
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                    }}
                                ?>
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
