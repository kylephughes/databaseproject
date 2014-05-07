<?php
  $UPC=$_POST['UPC'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
   
  $query ="DELETE from product WHERE UPC = :UPC";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('UPC',$UPC);
    $stmt->execute();
    $stmt = null;
  
  header("location:viewC.php");
?>
