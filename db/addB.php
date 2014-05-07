<?php
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  $Sname = $_POST['Sname'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  
  
  // was a question and answer entered?
  if ( isset($_POST['Sname'])   &&  !empty($_POST['Sname'])   &&
       isset($_POST['city'])   &&  !empty($_POST['city'])   &&
       isset($_POST['phone'])  && !empty($_POST['phone'])) {
  
      echo "<h4>Adding supplier  \"" . $_POST['Sname'] . "\" to database.</h4>";
  
      try {

        $query = 'INSERT INTO supplier (Sname, city, phone)
			     VALUES (:Sname, :city, :phone)';
	$stmt = $dbh->prepare($query);

	// Note each parameter must be bound separately
	$stmt->bindParam(':Sname', $Sname);
	$stmt->bindParam(':city', $city);
	$stmt->bindParam(':phone', $phone);

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
 
	include('viewB.php');
?>
