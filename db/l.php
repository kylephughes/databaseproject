<!DOCTYPE html>
<html>
  <head>
    <title>Reorder Level</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> List of products at reorder level </h2>
 <style>
      table, td, th {
        border: 1px solid black;
      }
    </style>
  




<?php>
require_once('/home/crouch59/public_html/db/Connect.php');

     $dbh = ConnectDB();
     $query = "select supplierID,UPC,Pname from product join suppliedby using(UPC) where amount <= reorderlevel";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt = null;




    echo" <table><tr> <th> UPC </th>";
   echo"<th> Product Name </th></tr>";
   foreach ($categoryData as $category){
         echo" <tr><td> $category->UPC</td>";
         echo" <td> $category->Pname</td></tr>";

}
echo "</table>";
?>

  </body>
</html>