<!DOCTYPE html>
<html>
  <head>
    <title>Customer Inforation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>

    <h2> Choose a customer to display products from highly rated suppliers  </h2>
    <form name = "viewCustomer" method = "post" action ="viewQ.php">
      CustomerID<select name="customerID">
      <?php 
	require_once('/home/crouch59/public_html/db/Connect.php');
	
	$dbh = ConnectDB();
	$query = "select customerID from customer";
	$stmt = $dbh->prepare($query);
	$stmt->execute();
	$categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt = null;
	foreach ( $categoryData as $category ) {
	  echo "<option value=\"$category->customerID\">$category->customerID</option>";
	}
      ?>
      </select>
      <input type = "submit">
    </form>

  </body>
</html>
