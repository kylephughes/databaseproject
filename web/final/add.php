<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
 <title> Add</title>
  <link rel="stylesheet" type="text/css"
        href="./layout1.css" />
</head>

<body>
<?php
/*This file adds a movie to the database
 *Kyle Hughes
 */

// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/final/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();

// was a name and phone entered?
if ( isset($_GET['fname'])   &&  !empty($_GET['fname'])   && 
     isset($_GET['lname'])   &&  !empty($_GET['lname']) &&
     isset($_GET['position'])  &&  !empty($_GET['position']) &&
     isset($_GET['salary']) && !empty($_GET['salary']) &&
     isset($_GET['age']) && !empty($_GET['age'])    ) {

   // echo "<p>Adding " . $_GET['name'] . ", " .
   //      $_GET['movie'] . " to database.</p>\n";

    try {

        $query = 'INSERT INTO player (fnmae, lname,position,salary,age) ' 
.
                 'VALUES (:fname, :lname, :position, :salary, :age)';
        $stmt = $dbh->prepare($query);

        // Copying $_GET[] values to local variables, so nothing
        // happens to values in $_GET[] array.
        $fname = $_GET['fname'];
	$lname= $_GET['lname'];       
	$position = $_GET['position'];
	$salary = $_GET['salary'];
	$age = $_GET['age'];
       
        // Note each parameter must be bound separately
        $stmt->bindParam(':fname', $fname);
	$stmt->bindParam(':lname',$lname);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':age',$age);
        $stmt->execute();
        $inserted = $stmt->rowCount();

        $stmt = null;
    echo"<div id='wrapper'>";
    echo"<div id='add'>";
    echo"<p> Added $inserted player(s).</p>\n";
    echo"</div>";
    echo"</div>";

    }
    catch(PDOException $e)
    {
        die ('PDO error inserting(): ' . $e->getMessage() );
    }

}


#$phonelist = ListAllPlayers($dbh);



// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';



?>
<!-- note that not listing an action or a method defaults to
     "this php file runs itself" and "use GET" -->

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
<h1 id="title_bar">Add a Player</h1>
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


<form>
<p>
<label>First Name:</label> <input type="text" 
name='fname'><br>     
<label>Last Name:</label> <input type="text" 
name='lname'><br>
<label>Position:</label> <input type="text" 
name='position'><br>
<label> Salary:</label> <input type="text" 
name='salary'><br>   
<label>Age:</label>  <input type="text" 
name='age'><br> 
 <input type="submit">
</form>
</div>
</div>

</body>
</html>

