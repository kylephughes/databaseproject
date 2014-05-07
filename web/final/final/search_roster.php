<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
  <title>Search Roster</title>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml; charset=UTF-8" />
  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>
</head>

<body>

<?php
require_once('/export/home/vivona70/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();



// was there a name entered for the search?
if (isset($_POST['fname']) && !empty($_POST['fname']) &&
isset($_POST['lname']) && !empty($_POST['lname']) ) {

//    echo '<p>Searching for ' . $_POST['name'] . "...</p>\n";

    $playerlist = ListMatchingPlayers($dbh, $_POST['fname'],
$_POST['lname']);

} else {



}
echo"<div id='wrapper'>";
echo"<div id='search'>";
echo"<br/>";
$counter=0;
foreach ($playerlist as $number) {
$counter++;
echo"<table> <tr> <th> First Name</th> <th> Last Name</th>
    <th> Position </th> <th> Salary </th> <th> Age </th> </tr>";


echo"<tbody> <tr> <td>$number->fnmae</td>";
echo"<td>     $number->lname</td>";
echo"<td>     $number->position </td>";
echo"<td>     $number->salary</td>";
echo"<td>     $number->age</td>";


}
echo"</table>";
echo "<p> $counter record(s) returned.<p>\n";
echo "</div>";
echo "</div>";

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
<h1 id="title_bar">Search for a Player</h1>
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
<form action="search_roster.php" method="post">
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

 header("Location: openSearch.php");

 }

 ?>
