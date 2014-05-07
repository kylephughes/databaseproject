<?php
  $supplierID=$_POST['supplierID'];

  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "SELECT Pname, price, shippingcost From (SELECT * FROM supppliedby WHERE supplierID = :supplierID)as S join product using (UPC)";
  $stmt = $dbh->prepare($query);
  $stmt->bindParam('supplierID',$supplierID);
  $stmt->execute();
  $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
  $stmt = null; 
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
     echo "<table><tr><th> Product Name </th>";
     echo " <th> Price </th>";
     echo "<th> Shipping Cost </th></tr>";
  foreach ( $categoryData as $category ) {
    echo "<tr><td> $category->Pname</td>";
    echo "<td>$category->price</td>";
    echo "<td>$category->shippingcost</td></tr>";
  }

 echo "</table>";
?>
