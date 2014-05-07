<!DOCTYPE html>
<html>
  <head>
    <title>Supplier Inforation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> Supplier Information </h2>
    <h4> View Supplier Information </h4> 

     <li> <a href= 'viewB.php' >View Suppliers </a> </li>
    <br>

    <h4> Add New Supplier </h4>
    <form name="addSupplier" method="post" action="addB.php">
      Supplier Name<input type="text" name="Sname"><br>
      City<input type="text" name="city"><br>
      Phone<input type="text" name="phone"><br>
      <input type="submit">
    </form>

    <h4> Delete a Supplier </h4>
    <form name = "removeSupplier" method = "post" action ="deleteB.php">
      SupplierID<select name="supplierID">
      <?php 
	require_once('/home/crouch59/public_html/db/Connect.php');
	
	$dbh = ConnectDB();
	$query = "select supplierID from supplier";
	$stmt = $dbh->prepare($query);
	$stmt->execute();
	$categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt = null;
	foreach ( $categoryData as $category ) {
	  echo "<option value=\"$category->supplierID\">$category->supplierID</option>";
	}
      ?>
      </select>
      <input type = "submit">
    </form>
    <br>
    <h4> Modify a Suppliers's City </h4>
  <form name = "modifySupplier" method = "post" action ="modifyB.php">
      SupplierID<select name="supplierID">
      <?php
        require_once('/home/crouch59/public_html/db/Connect.php');

        $dbh = ConnectDB();
        $query = "select supplierID from supplier";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        foreach ( $categoryData as $category ) {
          echo "<option value=\"$category->supplierID\">$category->supplierID</option>";
        }
      ?>
      </select><br>
      City<input type= "text" name="city">
      <input type = "submit">
    </form>




  </body>
</html>
