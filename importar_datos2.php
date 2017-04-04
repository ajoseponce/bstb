<?php
error_reporting(E_ALL);
$dbconn = pg_connect("host='10.11.12.50' dbname=HemoTrans_BSTB user=postgres password=pablo");
///echo $dbconn;
//echo "hola3";
// Realizando una consulta SQL
$query = 'SELECT * FROM usuarios';
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>
