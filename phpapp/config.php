<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = '127.0.0.1';
$databaseName = 'crud_db';
$databaseUsername = 'root';
$databasePassword = 'root';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>
