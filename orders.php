<!DOCTYPE html>
<html>
<head>
<title> Assignemnt 3 </title>
<link rel="stylesheet" type= "text/css" href="Style.css"></head>
<body>


<!--  To read in nav bar from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
<?php include('navigationBar.php') ?>
    
    <div class="container2">
    <h1 class="center"> Click on the order number of any order to find out more details! </h1>

    <div class="left">

<!--===================================================== Orders in Process =======================================================-->
<h2> Orders in Process </h2>
<?php    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    //Code to get special characters to appear adapted from http://www.w3schools.com/php/func_mysqli_set_charset.asp
    mysqli_set_charset($conn,"utf8");

//Orders In Process
$sql = "SELECT orderNumber, orderDate, status FROM orders WHERE status='In Process'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Order Number </th><th> Order Date </th><th> Status </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //Linking back to the same page using 'a href' adapted from http://stackoverflow.com/questions/18916966/add-php-variable-inside-echo-statement-as-href-link-address
        //Ideas for using GET adapted from https://www.tutorialspoint.com/php/php_get_post.htm
        $ordernum = $row["orderNumber"];
        echo "<tr><td><a href= 'orders.php?ordernum=".$ordernum."' method = 'GET'>".$row["orderNumber"]."</a></td><td>".$row["orderDate"]."</td><td>" .$row["status"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>

<!--=========================================================== Cancelled Orders ===========================================-->
         <h2> Cancelled Orders </h2>
<?php

$sql = "SELECT orderNumber, orderDate, status FROM orders WHERE status='Cancelled'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Order Number </th><th> Order Date </th><th> Status </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $ordernum = $row["orderNumber"];
        echo "<tr><td><a href= 'orders.php?ordernum=".$ordernum."' method = 'GET'>".$row["orderNumber"]."</a></td><td>".$row["orderDate"]."</td><td>" .$row["status"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
    
<!--=================================================== 20 Most Recent Orders ===============================================-->
<h2> 20 Most Recent Orders </h2>
<!--Code to get the 20 most recent orders adahttp://stackoverflow.com/questions/7735419/sql-select-n-most-recent-rows-in-ascending-order and http://www.w3schools.com/php/php_mysql_select_limit.asp-->
<?php
$sql = "SELECT orderNumber, orderDate, status FROM orders GROUP BY orderDate DESC LIMIT 20";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Order Number </th><th> Order Date </th><th> Status </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $ordernum = $row["orderNumber"]; 
        echo "<tr><td><a href= 'orders.php?ordernum=".$ordernum."' method = 'GET'>".$row["orderNumber"]."</a></td><td>".$row["orderDate"]."</td><td>" .$row["status"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
 ?> 

     </div> 
        
        <div class="right">
<?php        
//Use of if(isset($GET)) adapted from http://www.w3resource.com/php/function-reference/isset.php and http://stackoverflow.com/questions/12126420/isset-php-isset-getsomething-getsomething
//This code checks whether the variable "ordernum" (which is the order number) exists and if it is it links it to the database and prints out the detailed information for the order in a table
$ordernum = $row["orderNumber"];
if (isset($_GET["ordernum"])) {
    $ordernum = htmlspecialchars($_GET["ordernum"]);
    $sqlForOrder = "SELECT orders.orderNumber, orderdetails.productCode, products.productName, products.productLine, orders.comments FROM orders, orderdetails, products WHERE orders.orderNumber = orderdetails.orderNumber and orderdetails.productCode = products.productCode and orders.orderNumber=".$ordernum.";";
    $orderDetails = mysqli_query($conn, $sqlForOrder);
    if (mysqli_num_rows($orderDetails) > 0) {
    echo "<table><h2> Order Number ".$ordernum. " Details </h2><th>Product code</th><th>Product Name</th><th> Product Line </th><th> Comments (Where applicable) </th>";
    while ($row = mysqli_fetch_assoc($orderDetails)) {
        echo "<tr><td>".$row["productCode"]."</td><td>".$row["productName"]."</td><td>".$row["productLine"]."</td><td>" .$row["comments"]. "</td></tr>";
     }
    echo "</table>";
} else {
    echo "0 results found";
}
}
mysqli_close($conn);
?>
        </div>
        </div>
     <br><br>
   
    <!--  To read in footer from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
     <?php include('footer.php') ?>
    </body>
</html>