<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Add a movie</title>
</head>

<body>
<?php
/*This file adds a movie to the database
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

    echo "<p>Adding " . $_GET['name'] . ", " .
         $_GET['movie'] . " to database.</p>\n";

    try {

        $query = 'INSERT INTO movie (movie_id, title) ' .
                 'VALUES (:name, :movie)';
        $stmt = $dbh->prepare($query);

        // Copying $_GET[] values to local variables, so nothing
        // happens to values in $_GET[] array.
        $name = $_GET['name'];
        $movie = $_GET['movie'];
        // Note each parameter must be bound separately
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':movie', $movie);

        $stmt->execute();
        $inserted = $stmt->rowCount();

        $stmt = null;
    
        echo "<p>inserted $inserted record(s).</p>\n";

    }
    catch(PDOException $e)
    {
        die ('PDO error inserting(): ' . $e->getMessage() );
    }

} else {

    echo "No insertion was requested.\n";

}

$phonelist = ListAllPhones($dbh);

echo "Here is the data in the table now:\n";
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

<h1>Add an entry</h1>

<!-- note that not listing an action or a method defaults to
     "this php file runs itself" and "use GET" -->

<form>
    Movie_id: <input type="text" name='name'><br>
    Movie: <input type="text" name='movie'><br>
    <input type="submit">
</form>

<?php include('foot.php'); ?>

</body>
</html>

