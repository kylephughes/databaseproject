<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Players</title>
</head>

<body>
<?php
/*This file returns all the current actors in the database
 *Kyle Hughes
 */ 

// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();


$phonelist = ListAllPlayers($dbh);

echo "<p>Here is the Actors in the Database now:<p>\n";
$counter = 0;
echo "<ul>\n";
foreach ( $phonelist as $number ) {
    $counter++;
    echo "<li> <a href = 
'./display_movies.php?name=$number->player_id&amp;movie=$number->fname'> 
$number->fname, $number->lname</a>";
echo"</li>";

}
echo "</ul>\n";

echo "<p> $counter record(s) returned.<p>\n";

// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';



?>

<?php include('foot.php'); ?>

</body>
</html>

