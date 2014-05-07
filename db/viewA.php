<?php
  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "SELECT customerID,Fname,Lname,city,phone FROM customer";
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
     echo "<table><tr><th>CustomerID </th>";
     echo " <th> First Name </th>";
     echo "<th> Last Name </th>";
     echo "<th> City </th>";
     echo "<th> Phone </th></tr>";
  foreach ( $categoryData as $category ) {
    echo "<tr><td> $category->customerID</td>";
    echo "<td>$category->Fname</td>";
    echo "<td>$category->Lname</td>";
    echo "<td>$category->city</td>";
    echo "<td>$category->phone</td></tr>";
  }

 echo "</table>";
?>
