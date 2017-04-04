<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("class.postgres.php");

$dbhost = "localhost";
$dbname = "HemoTrans_BSTB";
$dbuser = "root";
$dbpass = "";
$dbport = "5432";
//
//$linkPg = pg_connect("host=".$dbhost." port=".$dbport." dbname=".$dbname." user=".$dbuser." password=".$dbpass);
$dbPg = new PostgreSQL($dbhost, $dbport, $dbuser,$dbpass, $dbname);


?>