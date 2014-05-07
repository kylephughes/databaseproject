<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Search</title>
  <link rel="stylesheet" type="text/css"
        href="./layout1.css"/>
</head>

<body>

<?php
/*This file searchs for a movie by movie_id and title
 *Kyle Hughes
 */
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();



// was there a name entered for the search?
if (isset($_POST['fname']) && !empty($_POST['fname']) &&
isset($_POST['lname']) && !empty($_POST['lname']) ) {

//    echo '<p>Searching for ' . $_POST['name'] . "...</p>\n";

    $phonelist = ListMatchingPlayers($dbh, $_POST['fname'], 
$_POST['lname']);

} else {


#    $phonelist = ListAllPlayers($dbh);
}
echo"<div id='wrapper'>";
echo"<div id='search'>";
$counter=0;
foreach ($phonelist as $number) {
$counter++;
echo"<table> <tr> <th> First Name</th> <th> Last Name</th>
    <th> Position </th> <th> Salary </th> <th> Age </th> </tr>";

   
echo"<tbody> <tr> <td>$number->fnmae</td>";  
echo"<td>     $number->lname</td>"; 
echo"<td>     $number->position </td>";
echo"<td>     $number->salary</td>"; 
echo"<td>     $number->age</td>";
  		

echo"</tbody>";
echo"</table>";
}
echo "<p> $counter record(s) returned.</p>";
echo "</div>";
echo "</div>";
// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';

?>


<div id="sidebar">
   <ul id="navlist">
     <li><a href="./search_roster.php">Search Players</a></li>
     <li><a href="./add.php">Add Players</a></li>
     <li><a href="delete.php">Remove Players</a></li>
     <li><a href="#">Edit Players</a></li>
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

     <li><a href="./welcome.html">

                 Home</a></li>
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
<form action="search_roster.php" method="post">
     <br> First Name: <input type="text" name='fname'><br>
      Last Name: <input type="text" name='lname'><br>      
 <input type="submit">
</form>
</div>
</div>


</body>
</html>

