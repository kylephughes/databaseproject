<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Search</title>
</head>

<body>

<?php
/*This file searchs for a movie by movie_id and title
 *Kyle Hughes
 */
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();



// was there a name entered for the search?
if (isset($_POST['name']) && !empty($_POST['name']) ) {

    echo '<p>Searching for ' . $_POST['name'] . "...</p>\n";

    $phonelist = ListMatchingPhones($dbh, $_POST['name']);

} else {

    echo "<p>No search specified; here's the whole list.</p>\n";

    $phonelist = ListAllPhones($dbh);
}

$counter = 0;
echo"<ul>";
foreach ( $phonelist as $number ) {
    $counter++;
    echo"<li>";
	echo " <a href =
'./display.php?name=$number->movie_id&amp;movie=$number->title'>";
   echo"$number->movie_id,$number->title</a>";
    echo"</li>";
}
echo"</ul>";

echo "<p> $counter record(s) returned.<p>\n";

// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';

?>


<h1>Search for an entry</h1>

<form action="search.php" method="post">
      Movie: <input type="text" name='name'><br>
       <input type="submit">
</form>


<?php include('foot.php'); ?>

</body>
</html>

