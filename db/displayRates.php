<!DOCTYPE html>
<html>
  <head>
    <title>Inactive customers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="Christopher Crouch">
    <meta name="Author" content="Kyle Hughes">
  </head>
  <body>
    <h2> List of inactive customers </h2>
  
 <style>
      table, td, th {
        border: 1px solid black;
      }
    </style>

<?php>
require_once('/home/crouch59/public_html/db/Connect.php');

     $dbh = ConnectDB();
     $query = "select Fname,Lname from customer where customerID in (select customerID from orders group by customerID,orderdate having (DATEDIFF(CURDATE(),max(orderdate)) > 45))";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $categoryData = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt = null;

    echo" <table><tr> <th> First Name </th>";
   echo"<th> Last Name </th></tr>";
   foreach ($categoryData as $category){
         echo" <tr><td> $category->Fname</td>";
         echo" <td> $category->Lname</td></tr>";

}
echo "</table>";
?>

  </body>
</html>
