<?php
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();
  $customerID = $_POST['customerID'];
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  
  
  // was a question and answer entered?
  if ( isset($_POST['customerID'])   &&  !empty($_POST['customerID'])   &&
       isset($_POST['Fname'])   &&  !empty($_POST['Fname'])   &&
       isset($_POST['Lname'])   &&  !empty($_POST['Lname'])   &&
       isset($_POST['city'])   &&  !empty($_POST['city'])   &&
       isset($_POST['phone'])  && !empty($_POST['phone'])) {
  
      echo "<h4>Adding customer with ID  \"" . $_POST['customerID'] . "\" to database.</h4>";
  
      try {

        $query = 'INSERT INTO customer (customerID, Fname, Lname, city, phone)
			     VALUES (:customerID, :Fname, :Lname, :city, :phone)';
	$stmt = $dbh->prepare($query);

	// Note each parameter must be bound separately
	$stmt->bindParam(':customerID', $customerID);
	$stmt->bindParam(':Fname', $Fname);
	$stmt->bindParam(':Lname', $Lname);
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
 
	include('viewA.php');
?>
