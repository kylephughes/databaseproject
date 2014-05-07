<?php
  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "SELECT UPC, Pname, category FROM product";
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
     echo "<table><tr><th> UPC </th>";
     echo " <th> Product Name </th>";
     echo "<th> Category </th></tr>";
  foreach ( $categoryData as $category ) {
    echo "<tr><td> $category->UPC</td>";
    echo "<td>$category->Pname</td>";
    echo "<td>$category->category</td>";
  }

 echo "</table>";
?>
