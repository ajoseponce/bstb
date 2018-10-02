<?php //session_start(); ?>
<html class="no-js"> <!--<![endif]-->
<?php
include('lib/functions.php');
requireLogin();
include('lib/DB_Conectar.php');
include('classes/consultas.php');

include 'header.php'; ?>

<!-- Body -->
<!-- In the PHP version you can set the following options from the config file -->
<!-- Add the class .hide-side-content to <body> to hide side content by default -->
<body>
<?php   include 'menu.php';
$datos = $consultas->getDatosUsuario();
$result_guardias = $consultas->getGuardiasUsuario();
$result_capa = $consultas->getCapacitacionesUsuario();
?>
<div id="page-content">
    <?php if($_SESSION[id]==48){

     ?>
    <div class="span12">
            <div class="block-title">
                <h4>
                    Ya ni leer sabe esta gente tan linda!
                </h4>
            </div>
        </div>
    <?php        
    } ?>    
    <div class="row-fluid">
        
        <div class="span6">

            <div class="block block-tabs block-themed">

                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#dashboard-notifications" data-toggle="tooltip"
                                          title="Latest Notifications"><i class="icon-user"></i> Datos Personales</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dashboard-notifications">
                        <div class="scrollable">
                            <!-- App Notifications -->
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Apellido y
                                    Nombre: </strong><?php echo $datos->persona; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>DNI: </strong><?php echo $datos->dni; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Fecha
                                    Nacimiento: </strong><?php echo $datos->fecha_nac; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Funcion: </strong><?php echo $datos->rol; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Domicilio: </strong><?php echo $datos->domicilio; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Fecha Ingreso: </strong><?php echo $datos->fecha_ing; ?>
                            </div>
                            <div style="height: 20px;">
                                <i class="icon-ok"></i><strong>Dependencia: </strong>
                                <?php echo ($datos->dependencia == 'M') ? "Ministerio de Salud" : ""; ?>
                                <?php echo ($datos->dependencia == 'P') ? "Parque de la Salud" : ""; ?>
                                <?php echo ($datos->dependencia == 'Ps') ? "Promotor de Salud" : ""; ?>
                                <?php echo ($datos->dependencia == 'C') ? "Banco de Sangre" : ""; ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="span6">
            <div class="block block-tabs block-themed">

                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#dashboard-notifications" data-toggle="tooltip"
                                          title="Latest Notifications"><i class="glyphicon-table"></i> Mis Guardias</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dashboard-notifications">
                        <div class="scrollable">
                            <!-- App Notifications -->
                            <table class="table">
                                <thead>
                                <tr style="background: red; font-size: 11px;">

                                    <th style="width: 15%;">Fecha</th>
                                    <th style="width: 26%;">Lugar</th>
                                    <th style="width: 20%;">Hora Desde</th>
                                    <th style="width: 20%;">Hora Hasta</th>
                                    <th style="width: 15%;">Tipo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $k = 0;
                                if ($result_guardias) {
                                    foreach ($result_guardias as $r) {
                                        ?>
                                        <tr style="font-size: 11px; background: <?php echo $color; ?>">

                                            <td class="span1 text-left"><?php echo $r->fecha_guardia; ?></td>
                                            <td class="span1 text-left"><?php echo $r->lugar; ?></td>
                                            <td class="span1 text-left"><?php echo $r->hora_desde; ?></td>
                                            <td class="span1 text-left"><?php echo $r->hora_hasta; ?></td>
                                            <td class="span1 text-left">
                                                <?php echo ($r->tipo_guardia == 'A') ? "Activa" : "";
                                                echo ($r->tipo_guardia == 'P') ? "Pasiva" : ""; ?></td>


                                        </tr>


                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--***************************************************-->
        <div class="span6">
            <div class="block block-tabs block-themed">

                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#dashboard-notifications" data-toggle="tooltip"
                                          title="Latest Notifications"><i class="glyphicon-table"></i>Capacitaciones</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dashboard-notifications">
                        <div class="scrollable">
                            <!-- App Notifications -->
                            <table class="table">
                                <thead>
                                <tr style="background: red; font-size: 11px;">

                                    <th style="width: 26%;">Descripcion</th>
                                    <th style="width: 15%;">Fecha</th>
                                    <th style="width: 20%;">Hora</th>
                                    <th style="width: 20%;">Capacitador</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $k = 0;
                                if ($result_capa) {
                                    foreach ($result_capa as $rs) {
                                        ?>
                                        <tr style="font-size: 11px; background: <?php echo $color; ?>">
                                            <td class="span1 text-left"><?php echo $rs->descripcion; ?></td>
                                            <td class="span1 text-left"><?php echo $rs->fecha_pre_capacitacion; ?></td>
                                            <td class="span1 text-left"><?php echo $rs->hora_pre_capacitacion; ?></td>
                                            <td class="span1 text-left"><?php echo ($rs->capacitador)?$rs->capacitador:$rs->nombre_capacitador; ?></td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php include 'footer.php';
//exit;?>

