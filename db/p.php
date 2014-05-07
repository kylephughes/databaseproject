<!DOCTYPE html>
<html>
  <head>
    <title>Highly Rated Supplier</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> List of highly rated suppliers </h2>
  
 <style>
      table, td, th {
        border: 1px solid black;
      }
    </style>


<?php>
require_once('/home/crouch59/public_html/db/Connect.php');

     $dbh = ConnectDB();
     $query = "select Sname,supplierID from supplier where supplierID in (select supplierID from rates group by supplierID having avg(rating) > (select avg(rating)*1.1 from rates))";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt = null;

    echo" <table><tr> <th> supplierID </th>";
   echo"<th> Supplier Name </th></tr>";
   foreach ($categoryData as $category){
         echo" <tr><td> $category->supplierID</td>";
         echo" <td> $category->Sname</td></tr>";

}
echo "</table>";
?>

  </body>
</html>
