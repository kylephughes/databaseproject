<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Delete</title>
</head>

<body>

<?php
/*This file removes a movie from the database
 *Kyle Hughes
 */ 
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');

$dbh = ConnectDB();

// was a name and phone entered?
if ( isset($_GET['name'])   &&  !empty($_GET['name'])   &&
     isset($_GET['movie'])  &&  !empty($_GET['movie'])     ) {

    try {
        echo "<p>Removing all records for " . $_GET['name'] . ", " .
             $_GET['movie'] . "</p>\n";
        $query = 'DELETE FROM movies WHERE movie_id=:name and 
title=:movie';
        $stmt = $dbh->prepare($query);

        // Copying $_GET[] values to local variables, so nothing
        // happens to values in $_GET[] array.
        $name = $_GET['name'];
        $movie = $_GET['movie'];

        // Note each parameter bound separately (or can use array)
        $stmt->bindParam('name', $name);
        $stmt->bindParam('movie', $movie);

        $stmt->execute();
        $removed = $stmt->rowCount();

        $stmt = null;

        echo "<p>Removed $removed record(s).</p>\n";
    }
    catch(PDOException $e)
    {
        die ('PDO error deleting(): ' . $e->getMessage() );
    }


} else {

    echo "<p>No deletion was requested.</p>\n";

}


$phonelist = ListAllPhones($dbh);

echo "<p>Here is the data in the table now:<p>\n";
$counter = 0;
echo "<ul>\n";
foreach ( $phonelist as $number ) {
    $counter++;
    echo "    <li> $number->movie_id, $number->title </li>\n";
    // modification: add delete link
}
echo "</ul>\n";

echo "<p> $counter record(s) returned.<p>\n";

// uncomment next line for debugging
# echo '<pre>'; print_r($phonelist); echo '</pre>';

?>

<h1>Delete an entry</h1>

<form action="delete.php" method="get">
      Movie_id: <input type="text" name='name'><br>
      Title: <input type="text" name='movie'><br>
      <input type="submit">
</form>


<?php include('foot.php'); ?>

</body>
</html>

