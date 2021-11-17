<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'mysqlcontainer';
$databaseName = 'crud_db';
$databaseUsername = getenv("MYSQLUSER");
$databasePassword = getenv("MYSQLPASS");

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>
