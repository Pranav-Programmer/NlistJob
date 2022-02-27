<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'sql309.epizy.com');
define('DB_USERNAME', 'epiz_30821912');
define('DB_PASSWORD', 'chARdMV83ANS');
define('DB_NAME', 'epiz_30821912_jobs');

$DATABASE_HOST = 'sql309.epizy.com';
$DATABASE_USER = 'epiz_30821912';
$DATABASE_PASS = 'chARdMV83ANS';
$DATABASE_NAME = 'epiz_30821912_jobs';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>