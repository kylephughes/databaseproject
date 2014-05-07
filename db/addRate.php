<?php


 $supplierID = $_POST['supplierID'];
  $customerID = $_POST['customerID'];
  $rating = $_POST['rating'];
  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');
  $dbh = ConnectDB();

  $query = "INSERT INTO rates (customerID,supplierID,rating) VALUES (:customerID,:supplierID,:rating)";
  $stmt = $dbh->prepare($query);
  $stmt->bindParam(':supplierID',$supplierID);
  $stmt->bindParam(':customerID',$customerID);
  $stmt->bindParam(':rating',$rating);
  $stmt->execute();
  $stmt = null; 

 $query = "select customerID,supplierID,rating from rates";

  $stmt = $dbh->prepare($query);
   $stmt->execute();
  $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
  $stmt = null;
echo'<a href= "/~crouch59/db/start.php">Home</a>';

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



echo" <table><tr><th> customerID</th> <th> supplierID </th> <th> rating </th>
      </tr>";
foreach($categoryData as $category){
echo "<tr><td>$category->customerID </td> ";
    echo" <td>$category->supplierID </td>";
echo" <td> $category->rating </td></tr>";


}
echo "</table>";

?>