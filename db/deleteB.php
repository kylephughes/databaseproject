<?php
  $supplierID=$_POST['supplierID'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
   
  $query ="DELETE from supplier WHERE supplierID = :supplierID";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('supplierID',$supplierID);
    $stmt->execute();
    $stmt = null;
  
  header("location:viewB.php");
?>
