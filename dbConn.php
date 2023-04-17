<?php
$host = 'db-eus-prd.mysql.database.azure.com';
$username = 'mysql';
$password = 'India@1234567';
$db_name =  'mydb';

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

if(mysql_connect_errno($conn))
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
