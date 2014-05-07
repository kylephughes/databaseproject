<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<?php

 // Connects to your Database

 mysql_connect("127.0.0.1", "hughes72", "fenway25") or die(mysql_error());

 mysql_select_db("hughes72") or die(mysql_error());


 //checks cookies to make sure they are logged in

 if(isset($_COOKIE['ID_my_site']))

 {

   $username = $_COOKIE['ID_my_site'];

   $pass = $_COOKIE['Key_my_site'];

         $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

         while($info = mysql_fetch_array( $check ))

                     {

 //if the cookie has the wrong password, they are taken to the login page

if ($pass != $info['password']) {
      header("Location: login.php");
}



 //otherwise they are shown the admin area

             else

                        { ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>Release</title>
  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>
</head>

<body>

<?php
/*This file removes a movie from the database
 *Kyle Hughes
 */
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();

// was a name and phone entered?
if ( isset($_GET['fname'])   &&  !empty($_GET['fname'])   &&
     isset($_GET['lname']) && !empty($_GET['lname'])     ) {

    try {
 //       echo "<p>Removing all records for " . $_GET['name'] . ", " .
 //            $_GET['movie'] . "</p>\n";
        $query = 'DELETE FROM player WHERE fnmae=:fname and
lname=:lname';
        $stmt = $dbh->prepare($query);

        // Copying $_GET[] values to local variables, so nothing
        // happens to values in $_GET[] array.
        $fname = $_GET['fname'];
        $lname = $_GET['lname'];

        // Note each parameter bound separately (or can use array)
        $stmt->bindParam('fname', $fname);
        $stmt->bindParam('lname', $lname);

        $stmt->execute();
        $removed = $stmt->rowCount();

        $stmt = null;
echo"<div id='wrapper'>";
echo"<div id='search'>";
        echo "<p>Removed $removed player(s).</p>\n";
echo"</div>";
echo"</div>";
 }
    catch(PDOException $e)
    {
        die ('PDO error deleting(): ' . $e->getMessage() );
    }


} else {


}




// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';

?>

<div id="sidebar">
   <ul id="navlist">
     <li><a href=search_roster.php>Search Players</a></li>
     <li><a href=addPlayer.php>Add Players</a></li>
     <li><a href=removePlayer.php>Remove Players</a></li>
     <li><a href=editPlayer.php>Edit Players</a></li>
   </ul>
</div>


<div id="wrapper">

<div id="titlebar">
<h1 id="title_bar">Remove a Player</h1>
</div>

<div id="status_bar">
</div>

<div id="navbar">
   <ul>
     <li><a href=welcome.php>Home</a></li>
     <li><a href=roster.php>Roster</a></li>
     <li><a href=schedule.php>Schedule</a></li>
     <li><a href=contacts.php>Contacts</a></li>
     <li><a href=tickets.php>Tickets</a></li>
     <li><a href=logout.php>Log Out</a></li>
   </ul>

</div>

<div id="content">
<form action="removePlayer.php" method="get">
   <p>
   <br>
   <label>First Name: </label> <input type="text" name='fname'><br>
   <label>Last Name:  </label> <input type="text" name='lname'><br>
               <input type="submit">
   </p>
</form>
</div>
</div>


</body>
</html>


<?php

                                       }

                                         }

                                           }

 else



 //if the cookie does not exist, they are taken to the login screen

 {

 header("Location: index.html");

 }

 ?>
