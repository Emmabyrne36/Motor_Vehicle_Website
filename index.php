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
    <h1> Welcome to Classic Models! </h1>
        <p> A summary of our various product lines is shown below.
        To see more detailed information regarding specific products please see our <a style="color:red; text-decoration:none" href="products.php" >products</a> page. </p>
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

$sql = "SELECT productLine, textDescription FROM productlines";
$result = mysqli_query($conn, $sql);
    
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Product Line</th><th>Product Details</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productLine"]."</td><td>".$row["textDescription"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}

mysqli_close($conn);
?>

    <br>
    </div>
<?php include('footer.php') ?>
    </body>
</html>