<!--<a href="don2011.txt"></a>-->
<?php 
// archivo txt 
$filas=file('don2011.txt'); 
// iniciamos contador y la fila a cero 
$i=0; 
$numero_fila=0; 
// mientras exista una fila 
//while($filas[$i]!=NULL){ 
//// incremento contador de la fila 
//$row = $filas[$i+1]; 
//// genero array con por medio del separador "," que es el que tiene el archivo txt 
//$sql = explode(" ",$row); 

foreach($filas as $value){
    list($id, $fecha, $codigo, $centro, $espacio1, $nombre, $dni, $espacio2, $telefono, $domicilio, $ciudad, $espacio3, $fecha_nac, $nac, $prov, $tdon, $rh, $serologia, $abo) = explode("   ", $value);
// incrementamos contador 
$i++; 
$numero_fila++; 
// imprimimos datos en pantalla 
echo 'Id: '.$id.'<br/>'; 
echo 'Fecha: '.$fecha.'<br/>'; 
echo 'Codigo: '.$codigo.'<br/>'; 
echo 'Centro: '.$centro.'<br/>'; 
echo 'Nombre: '.$nombre.'<br/>'; 
echo 'Dni: '.$dni.'<br/>'; 
echo 'Telefono: '.$telefono.'<br/>'; 
echo 'Domicilio: '.$domicilio.'<br/>'; 
echo 'Ciudad: '.$ciudad.'<br/><br/>'; 
echo 'Fecha Nac: '.$nac.'<br/><br/>'; 
echo 'Nac: '.$nac.'<br/><br/>'; 
echo 'Prov: '.$prov.'<br/><br/>'; 
echo 'TDon: '.$tdon.'<br/><br/>'; 
echo 'RH: '.$rh.'<br/><br/>'; 
echo 'Serologia: '.$serologia.'<br/><br/>'; 
echo 'ABO: '.$abo.'<br/><br/>'; 
}
?> 