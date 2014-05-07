<?php
  // access information in directory with no web access
  require_once('/home/crouch59/public_html/db/Connect.php');

  $dbh = ConnectDB();

  $query ="load data local infile '/home/hristescu/public_html/classes/DB/customer.txt' into table customer fields terminated by ','";
  $stmt = $dbh->prepare($query);
  $stmt->execute();
  $stmt = null;

?>
