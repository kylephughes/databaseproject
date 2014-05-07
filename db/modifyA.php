<?php
  $customerID=$_POST['customerID'];
  $city=$_POST['city'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  
  if(isset($_POST['city']) && $_POST['city'] != null) { 
    $query ="update customer set city = :city  WHERE customerID = :customerID";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('customerID',$customerID);
    $stmt->bindParam('city',$city);
    $stmt->execute();
    $stmt = null;
    header("location:viewA.php");
  } else {
      echo "City field was blank";
  }
?>
