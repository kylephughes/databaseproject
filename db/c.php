<!DOCTYPE html>
<html>
  <head>
    <title>Product Inforation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> Product Information </h2>
    <h4> View Product Information </h4> 

     <li> <a href= 'viewC.php' >View Products </a> </li>
    <br>

    <h4> Add New Product </h4>
    <form name="addProduct" method="post" action="addC.php">
      UPC<input type="text" name="UPC"><br>
      Product Name<input type="text" name="Pname"><br>
      Category<input type="text" name="category"><br>
      <input type="submit">
    </form>

    <h4> Delete a Product </h4>
    <form name = "removeProduct" method = "post" action ="deleteC.php">
      UPC<select name="UPC">
      <?php 
	require_once('/home/crouch59/public_html/db/Connect.php');
	
	$dbh = ConnectDB();
	$query = "select UPC from product";
	$stmt = $dbh->prepare($query);
	$stmt->execute();
	$categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt = null;
	foreach ( $categoryData as $category ) {
	  echo "<option value=\"$category->UPC\">$category->UPC</option>";
	}
      ?>
      </select>
      <input type = "submit">
    </form>
    <br>
    <h4> Modify a Product's City </h4>
  <form name = "modifyProduct" method = "post" action ="modifyC.php">
      UPC<select name="UPC">
      <?php
        $dbh = ConnectDB();
        $query = "select UPC from product";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        foreach ( $categoryData as $category ) {
          echo "<option value=\"$category->UPC\">$category->UPC</option>";
        }
      ?>
      </select><br>
      category<input type= "text" name="category">
      <input type = "submit">
    </form>




  </body>
</html>
