<?php
// Ejemplo aprenderaprogramar.com
// Iremos leyendo línea a línea del fichero.txt hasta llegar al fin (feof($fp))
// fichero.txt tienen que estar en la misma carpeta que el fichero php
// fichero.txt es un archivo de texto normal creado con notepad, por ejemplo.
$fp = fopen("fichero.txt", "r");
while(!feof($fp)) {
    $linea = fgets($fp);
    echo $linea . "<br />";
}
fclose($fp);
?>