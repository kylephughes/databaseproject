<?php
  $UPC=$_POST['UPC'];
  $category=$_POST['category'];

  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  
  if(isset($_POST['category']) && $_POST['category'] != null) { 
    $query ="update product set category = :category  WHERE UPC = :UPC";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('UPC',$UPC);
    $stmt->bindParam('category',$category);
    $stmt->execute();
    $stmt = null;
    header("location:viewC.php");
  } else {
      echo "Category field was blank";
  }
?>
