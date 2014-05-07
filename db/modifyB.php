<?php
  $supplierID=$_POST['supplierID'];
  $city=$_POST['city'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  
  if(isset($_POST['city']) && $_POST['city'] != null) { 
    $query ="update supplier set city = :city  WHERE supplierID = :supplierID";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('supplierID',$supplierID);
    $stmt->bindParam('city',$city);
    $stmt->execute();
    $stmt = null;
    header("location:viewB.php");
  } else {
      echo "City field was blank";
  }
?>
