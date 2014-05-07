<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Sports Management System</title>
  <meta http-equiv="Content-Type"
        content="application/xhtml+xml; charset=UTF-8" />
  <meta name="Author" content="Eric Dijamco, Kyle Hughes, Michael Vivona" />

  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>

</head>

<body>

<!--<div id="sidebar">
   <ul id="navlist">
     <li><a href="./openSearch.php">Search Players</a></li>
   </ul>
</div>   -->


<div id="wrapper">
<div id="sidebar>
    <ul>
      <li><a href="./openSearch.php">Search Players</a></li>
      </ul>
</div>
<div id="title_bar">
<h1>Sports Management System</h1>
</div>

<div id="navbar">
   <ul>
     <li><a href="./index.html">Home</a></li>
     <li><a href="./openRoster.php">Roster</a></li>
     <li><a href="./schedule.html">Schedule</a></li>
     <li><a href="./contacts.html">Contacts</a></li>
     <li><a href="./tickets.html">Tickets</a></li>
     <li><a href="./login.php">Log In</a></li>
   </ul>

</div>

<div id="content">
<?php

// access information in directory with no web access
require_once('/export/home/vivona70/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');


$dbh = ConnectDB();

$playerlist = ListAllPlayers($dbh);
echo "<br/>";
echo "<table class=\"center\"> <thead><tr>
      <th>First Name</th>
      <th>Last Name </th>
      <th>Position</th>
      <th>Salary</th>
      <th>Age</th>
      </tr></thead>";

$counter = 0;

echo "<tbody>\n";
foreach ( $playerlist as $number ) {
    $counter++;
    echo "    <tr> <td>$number->fnmae</td> <td>$number->lname</td>
                   <td>$number->position</td> <td>$number->salary</td>
                   <td>$number->age</td> ";
    echo "</tr>\n";
}
echo "</tbody>\n";

echo "</table>";
echo "<p> $counter record(s) returned.</p>\n";
?>

</div>

</div>

</body>

</html>
