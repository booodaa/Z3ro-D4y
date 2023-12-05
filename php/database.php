<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db_server='p:localhost';
$db_use="root";
$db_pass='';
$db_name='wallet';

try {
   $conn = mysqli_connect($db_server,$db_use,$db_pass,$db_name);
   //echo "Connected";
} catch (mysqli_sql_exception $e) {
   echo "Failed to connect to MySQL: " . $e->getMessage();
} catch (Exception $e) {
   echo "An error occurred: " . $e->getMessage();
}
?>