<?php
  $customerID=$_POST['customerID'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
   
  $query ="DELETE from customer WHERE customerID = :customerID";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('customerID',$customerID);
    $stmt->execute();
    $stmt = null;
  
  header("location:viewA.php");
?>
