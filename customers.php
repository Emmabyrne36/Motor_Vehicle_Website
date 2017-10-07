<!DOCTYPE html>
<html>
<head>
<title> Assignemnt 3 </title>
<link rel="stylesheet" type= "text/css" href="Style.css"></head>
<body>
    
<!--  To read in nav bar from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
<?php include('navigationBar.php') ?> 
     <div class="container">
    <div class="center">
    <h1> Here is a list of all of our customers </h1>
    </div>
    
<!-- Code for obaining data from a database and placing it in a table adapted from w3schools.com at http://www.w3schools.com/php/php_mysql_select.asp    -->
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
    
    //Idea for grouping the data by country adapted from https://www.tutorialspoint.com/sql/sql-sorting-results.htm
$sql = "SELECT customerName, city, phone, country FROM customers ORDER BY country";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Customer Name </th><th>City</th><th> Phone Number </th><th> Country </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["customerName"]. "</td><td>". $row["city"]. "</td><td>" .$row["phone"]. "</td><td>" .$row["country"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    <br>
    </div>
    <!--  To read in footer from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
    <?php include('footer.php') ?>
    
    </body>
</html>