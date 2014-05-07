<?php
  //make a list of the different tools for the case selected
  session_start();

  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query = "SELECT Fname FROM customer";
  $stmt = $dbh->prepare($query);
  $stmt->execute();
  $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
		
  $stmt = null;

  foreach ( $categoryData as $category ) {
    echo "<li>$category->Fname</li>";
  }
?>
