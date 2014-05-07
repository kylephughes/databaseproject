<?php
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  $UPC = $_POST['UPC'];
  $Pname = $_POST['Pname'];
  $category = $_POST['category'];
  
  
  // was a question and answer entered?
  if ( isset($_POST['UPC'])   &&  !empty($_POST['UPC'])   &&
       isset($_POST['Pname'])   &&  !empty($_POST['Pname'])   &&
       isset($_POST['category'])   &&  !empty($_POST['category'])) {
  
      echo "<h4>Adding Product with UPC  \"" . $_POST['UPC'] . "\" to database.</h4>";
  
      try {

        $query = 'INSERT INTO product (UPC, Pname, category)
			     VALUES (:UPC, :Pname, :category)';
	$stmt = $dbh->prepare($query);

	// Note each parameter must be bound separately
	$stmt->bindParam(':UPC', $UPC);
	$stmt->bindParam(':Pname', $Pname);
	$stmt->bindParam(':category', $category);

	$stmt->execute();
	$stmt = null;
    
      } 
      catch(PDOException $e)
      {
        die ('PDO error inserting(): ' . $e->getMessage() );
      }
  }
  else {
  	echo "<h4>All fields must be filled in</h4>";
       }
 
	include('viewC.php');
?>
