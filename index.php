 <?php

 $serverName = "tcp:db-eus-prd.mysql.database.azure.com,3306";
 $connectionOptions = array("Database"=>"mydb",
 "Uid"=>"mysql", "PWD"=>"India@1234567");
 //Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);
 //Select Query
 $tsql = "SELECT [CompanyName] FROM SalesLT.Customer";
 //Executes the query
 $getProducts = sqlsrv_query($conn, $tsql);
 //Error handling
 if ($getProducts == FALSE)
 die(FormatErrors(sqlsrv_errors()));
 $productCount = 0;
 $ctr = 0;
 ?> 
 <h1> First 10 results are : </h1>
 <?php
 while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
 { 
 if($ctr>9)
 break; 
 $ctr++;
 echo($row['CompanyName']);
 echo("<br/>");
 $productCount++;
 }
 sqlsrv_free_stmt($getProducts);

 $tsql = "INSERT SalesLT.Product (Name, ProductNumber, StandardCost, ListPrice, SellStartDate) OUTPUT INSERTED.ProductID VALUES ('SQL New 1', 'SQL New 2', 0, 0, getdate())";
 //Insert query
 $insertReview = sqlsrv_query($conn, $tsql);
 if($insertReview == FALSE)
 die(FormatErrors( sqlsrv_errors()));
 ?> 
 <h1> Product Key inserted is :</h1> 
 <?php
 while($row = sqlsrv_fetch_array($insertReview, SQLSRV_FETCH_ASSOC))
 { 
 echo($row['ProductID']);
 }
 sqlsrv_free_stmt($insertReview);
 //Delete Query
 //We are deleting the same record
 $tsql = "DELETE FROM [SalesLT].[Product] WHERE Name=?";
 $params = array("SQL New 1");

 $deleteReview = sqlsrv_prepare($conn, $tsql, $params);
 if($deleteReview == FALSE)
 die(FormatErrors(sqlsrv_errors()));

 if(sqlsrv_execute($deleteReview) == FALSE)
 die(FormatErrors(sqlsrv_errors()));

 ?>
