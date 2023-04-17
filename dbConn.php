<?php
$conn = mysqli_init();
$db = mysqli_real_connect("db-eus-prd.mysql.database.azure.com","mysql","India@1234567","mydb", "3306");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
