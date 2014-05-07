<?php
  // NOTE: this file has a password, and so should not be world-readable.
  // Usually it would be mode 600, with a ACL permitting the webserver in.  
  // But it's like this because you have to use it as sample code.

  // YOURS should also have ME listed on the ACL so I can read it without
  // having to use administrative access.

  // ConnectDB() - takes no arguments, returns database handle
  // USAGE: $dbh = ConnectDB();
  function ConnectDB() {
    /*** mysql server info ***/
    $hostname = '127.0.0.1';
    $username = 'crouch59';
    $password = 'chris61192';
    $dbname   = 'crouch59';

    try {
    /* $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",
                       $username, $password); */
    /*
     * If you are on Elvis and using a MySQL5 account, you need this:
     */
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",
                    $username, $password);
 
    /* because the mysql5 server listens on port 3307, not the default.
     */

    }
    catch(PDOException $e) {
      die ('PDO error in "ConnectDB()": ' . $e->getMessage() );
    }
    return $dbh;
  }  
?>

