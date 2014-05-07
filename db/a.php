<!DOCTYPE html>
<html>
  <head>
    <title>Customer Inforation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> Customer Information </h2>
    <h4> View Customer Information </h4> 

     <li> <a href= 'viewA.php' >View Customers </a> </li>
    <br>

    <h4> Add New Customer </h4>
    <form name="addCustomer" method="post" action="addA.php">
      customerID<input type="text" name="customerID"><br>
      First Name<input type="text" name="Fname"><br>
      Last Name<input type="text" name="Lname"><br>
      City<input type="text" name="city"><br>
      Phone<input type="text" name="phone"><br>
      <input type="submit">
    </form>

    <h4> Delete a Customer </h4>
    <form name = "removeCustomer" method = "post" action ="deleteA.php">
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
    <br>
    <h4> Modify a Customer's City </h4>
  <form name = "modifyCustomer" method = "post" action ="modifyA.php">
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
      </select><br>
      City<input type= "text" name="city">
      <input type = "submit">
    </form>




  </body>
</html>
