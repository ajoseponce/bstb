<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$data[tipo_equipo_filtro]=40;
$result=$consultas->getEquiposFiltros($data);
$data[persona]=66;
$data[tipo]=2;

if($result) {
        foreach ($result as $r) {
                //echo $r->id_equipo."<br>";
                $data[equipo]=$r->id_equipo;
                $result = $consultas->SaveRelacionEquipoPersonas($data);
        }
}
echo "sii";
?>
