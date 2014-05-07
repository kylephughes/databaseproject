<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title> Movies</title>
</head>

<body>
<?php

//Kyle hughes
//This database displays the movies 
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();


$phonelist = ListAllPhones($dbh);

echo "<p>Here is the Movies in the Database now:<p>\n";
$counter = 0;
echo "<ul>\n";
foreach ( $phonelist as $number ) {
    $counter++;
    echo "<li>";
    echo "<a href 
='./display?name=$number->movie_id&amp;movie=$number->title'>$number->title</a>";	    
}
echo "</ul>\n";

echo "<p> $counter record(s) returned.<p>\n";

// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';



?>


<?php include('foot.php'); ?>

</body>
</html>

