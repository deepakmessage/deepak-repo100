<?php

$db = mysqli_connect("db-eus-prd.mysql.database.azure.com","mysql","India@1234567","mydb");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
