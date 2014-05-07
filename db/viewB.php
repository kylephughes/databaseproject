<?php
  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "SELECT supplierID, Sname, city, phone FROM supplier";
  $stmt = $dbh->prepare($query);
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
     echo "<table><tr><th>SupplierID </th>";
     echo "<th> Supplier Name </th>";
     echo "<th> City </th>";
     echo "<th> Phone </th></tr>";
  foreach ( $categoryData as $category ) {
    echo "<tr><td> $category->supplierID </td>";
    echo "<td>$category->Sname</td>";
    echo "<td>$category->city</td>";
    echo "<td>$category->phone</td></tr>";
  }

 echo "</table>";
?>
