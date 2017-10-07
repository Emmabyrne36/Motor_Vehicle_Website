<!DOCTYPE html>
<html>
<head>
<title> Assignemnt 3 </title>
<link rel="stylesheet" type= "text/css" href="Style.css"></head>
<body>
<script src="javascript.js"></script>
    
<!--  To read in nav bar from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
<?php include('navigationBar.php') ?>    
   <div class="container">  
    
    <!-- Code for obaining data from a database and placing it in a table adapted from w3schools.com at http://www.w3schools.com/php/php_mysql_select.asp    -->
        

        <div class="center">
        <form method="get" id="products" style="padding:10px;">
            <h1>Select the product(s) you want to see detailed information for! </h1>
                <input name="Cars" onclick="showHideClassicCars()" type="checkbox"> Classic Cars                
                <input name="Motorcycles" onclick="showHideMotorcycles()" type="checkbox"> Motorcycles         
                <input name="day3" onclick="showHidePlanes()" type="checkbox"> Planes              
                <input name="day4" onclick="showHideShips()" type="checkbox"> Ships                 
                <input name="day5" onclick="showHideTrains()" type="checkbox"> Trains 
                <input name="day5" onclick="showHideTrucksBusses()" type="checkbox"> Trucks and Buses  
                <input name="day5" onclick="showHideVintageCars()" type="checkbox"> Vintage Cars
                </form>
            </div>
        <br>
 
 <!-- Code for obaining data from a database and placing it in a table adapted from w3schools.com at http://www.w3schools.com/php/php_mysql_select.asp    -->       
<!--============ Classic Cars PHP ========================-->
        <div id="click" class="hide">
        <h2> Classic Cars </h2>
        <div class="center">
        <img src="Images/classiccar.jpg" alt="Classic car" style="width:350px;height:200px;"> </div>
        <br>
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
            
$cars = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Classic Cars'";

$result = mysqli_query($conn, $cars);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>".$row["productCode"]. "</td><td>" .$row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
            <br><br>
        </div>
        
<!--============ Motorcycles PHP ========================-->
        <div id="click2" class="hide">
        <h2> Motorcycles </h2>
        <div class="center">
        <img src="Images/motorcycle.jpg" alt="Motorcycle" style="width:350px;height:200px;"></div>
        <br>
<?php 
$motorcycles = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Motorcycles'";

$result = mysqli_query($conn, $motorcycles);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>" .$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
            <br><br>
        </div>
        
       
<!--================= Planes PHP ========================-->
        <div id="click3" class="hide">
        <h2> Planes </h2>
        <div class="center">
        <img src="Images/plane.jpg" alt="Plane" style="width:350px;height:200px;"> </div>
        <br>
<?php 
$planes = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Planes'";

$result = mysqli_query($conn, $planes);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>".$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
            <br><br>
        </div>
        
<!--=============== Ships PHP ========================-->
        <div id="click4" class="hide">
        <h2> Ships </h2>
        <div class="center">
        <img src="Images/ship.jpg" alt="Ship" style="width:500px;height:200px;"> </div>
        <br>
            
<?php 
$ships = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Ships'";

$result = mysqli_query($conn, $ships);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>".$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
            <br><br>
        </div>
        
        <!--============ Trains PHP ========================-->
        
            <div id="click5" class="hide">
            <h2> Trains </h2>  <div class="center">
            <img src="Images/train.jpg" alt="Train" style="width:350px;height:200px;"> </div>
            <br>
<?php 
$trains = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Trains'";

$result = mysqli_query($conn, $trains);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>".$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
                <br><br>
        </div>
        
        
<!--============ Trucks and Busses PHP ========================-->
        
            <div id="click6" class="hide">
            <h2> Trucks and Buses </h2>
            <div class="center">
            <img src="Images/truck.jpg" alt="Truck" style="width:350px;height:200px;"> </div>
            <br>
                
<?php 
$trucks_buses = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Trucks and Buses'";

$result = mysqli_query($conn, $trucks_buses);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>" .$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}
?>
                <br><br>
        </div>
        
<!--============ Vintage Cars PHP ========================-->
        
            <div id="click7" class="hide">
            <h2> Vintage Cars </h2>
            <div class="center">
            <img src="Images/vintagecar.jpg" alt="Vintage Car" style="width:350px;height:200px;"> </div>
            <br>
            
<?php 
$vin_cars = "SELECT productName, productCode, productLine, productVendor, productDescription, quantityInStock, buyPrice, MSRP FROM products WHERE productLine='Vintage Cars'";

$result = mysqli_query($conn, $vin_cars);

  if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th> Product Name </th><th> Product Code </th><th> Product Line </th><th> Vendor </th><th> Description </th><th> Quantity in Stock </th><th> Price </th><th> Recommended Retail Price </th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["productName"]. "</td><td>" .$row["productCode"]. "</td><td>". $row["productLine"]. "</td><td>" .$row["productVendor"]. "</td><td>" .$row["productDescription"]. " </td><td>" .$row["quantityInStock"]. "</td><td>".$row["buyPrice"]. "</td><td>". $row["MSRP"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}

mysqli_close($conn);
?>
        </div>
         
    </div>
        
    <br>
    <!--  To read in footer from another php file adapted from http://stackoverflow.com/questions/1983185/calling-a-file-inside-another-file-in-php  -->
    <?php include('footer.php') ?>
    </body>
</html>