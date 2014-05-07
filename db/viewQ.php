<?php
  $customerID=$_POST['customerID'];

  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "select UPC,Pname from product where UPC in (select UPC from suppliedby where supplierID in (select distinct supplierID UPC from contains join (select supplierID from supplier where Sname in (select Sname from supplier where supplierID in (select supplierID from   rates group by supplierID having avg(rating) > (select avg(rating)*1.1 from rates))))s using(supplierID) where orderID in (select orderID from orders where customerID = :customerID))) and UPC not in (select UPC from contains where orderID in (select orderID from orders where customerID= :customerID)and supplierID in (select supplierID from supplier where Sname in (select Sname from supplier where supplierID in (select supplierID from rates group by supplierID having avg(rating) > (select avg(rating) from rates)))))";
  $stmt = $dbh->prepare($query);
  $stmt->bindParam('customerID',$customerID);
  $stmt->execute();
  $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
  $stmt = null; 

echo '<a href="/~crouch59/db/start.php">Home </a>';
echo '<h3> List of products from highly rated suppliers yet to be ordered </h3>';

     echo "<!DOCTYPE html>
<html>
  <head>
    <style>
      table, td, th {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>";
     echo "<table><tr><th> UPC </th>";
     echo " <th> Product Name </th></tr>";

  foreach ( $categoryData as $category ) {
    echo "<tr><td> $category->UPC</td>";
    echo "<td>$category->Pname</td></tr>";
  }

 echo "</table>";
?>
