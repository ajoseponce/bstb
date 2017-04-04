<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 17/08/2016
 * Time: 10:36 AM
 */
$now = time(); // or your date as well
$your_date = strtotime("2016-08-16");
$datediff = $now - $your_date;
echo floor($datediff/(60*60*24));
phpinfo();
//echo   "<br>".$diT."<br>";
