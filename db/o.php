<!DOCTYPE html>
<html>
  <head>
    <title>Overpriced Products</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h3> Products priced a little too high compared to other suppliers </h3>
  
 <style>
      table, td, th {
        border: 1px solid black;
      }
    </style>


<?php>
require_once('/home/crouch59/public_html/db/Connect.php');

     $dbh = ConnectDB();
     $query = "select distinct Pname,UPC,supplierID,price from product join suppliedby using(UPC) where (UPC,supplierID) in (select UPC,supplierID from suppliedby s where (shippingcost+price) >(select avg(price+shippingcost)* 1.75 from suppliedby where s.UPC = suppliedby.UPC))";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt = null;

    echo" <table><tr> <th> Product Name </th>";
   echo"<th> UPC </th> <th>SupplierID </th><th>Price</th></tr>";
   foreach ($categoryData as $category){
         echo" <tr><td> $category->Pname</td>";
         echo" <td> $category->UPC</td>";
         echo" <td> $category->supplierID</td>";
         echo"<td> $category->price</td></tr>";
}
echo "</table>";
?>

  </body>
</html>
