<html>
<head>
<title>Pacientes</title>
</head>
<body>
<?php
error_reporting(E_ALL);
$dbconn = pg_connect("host='10.11.12.50' dbname=HemoTrans_BSTB user=postgres password=pablo");
//echo $dbconn;
//echo "hola3";
// Realizando una consulta SQL
$query = 'SELECT dp.* , d.abreviatura '
        . ' FROM datos_personales dp '
        . ' LEFT JOIN  documentos d ON d.idtipodocum=dp.idtipodocumento ';
        
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$ar=fopen("datos.txt","a") or
  die("Problemas en la creacion");
    //if($line['grupoabo']!=""){
        fputs($ar,$line['nombre']." ".$line['apellidosoltero'].";");
        fputs($ar,$line['abreviatura'].";");
        fputs($ar,$line['nrodocumento'].";");
        fputs($ar,$line['fechanacimiento'].";");
        fputs($ar,$line['sexo'].";");
        fputs($ar,$line['grupoabo'].";");
        fputs($ar,$line['factorrh']);
        fputs($ar,"\n");
    
}
fclose($ar);
?>

</body>
</html>