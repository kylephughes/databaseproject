<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
  <title>Sports Management System</title>
  <meta name="Author" content="Eric Dijamco, Kyle Hughes, Michael Vivona" />

  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>

</head>

<body>

<div id="sidebar">
   <ul id="navlist">
     <li><a href="search_roster.php">Search Players</a></li>
     <li><a href="add.php">Add Players</a></li>
     <li><a href="delete.php">Remove Players</a></li>
     <li><a href="#">Edit Players</a></li>
   </ul>
</div>


<div id="wrapper">

<div id="title_bar">
<h1>Sports Management System</h1>
</div>

<div id="status_bar">
</div>

<div id="navbar">
   <ul>

     <li><a href="./welcome.html">Home</a></li>
     <li><a href="./schedule.html">
                 Schedule</a></li>
     <li><a href="./contacts.html">
                 Contacts</a></li>
     <li><a href="./roster.php">
                  Roster</a></li>
     <li><a href="./tickets.html">
                  Tickets</a></li>
   </ul>

</div>

<div id="content">
<?php

// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');


$dbh = ConnectDB();

$playerlist = ListAllPlayers($dbh);

echo "<table><thead> <tr>
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
