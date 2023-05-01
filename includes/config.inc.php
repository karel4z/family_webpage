<?php

$host = "localhost"; /* Jméno hostitele */
$user = "root"; /* Uživatel */
$password = ""; /* Heslo */
$dbname = "doma"; /* Jméno databáze */

$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}