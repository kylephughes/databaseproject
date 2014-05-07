<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Display</title>
</head>

<body>
<?php
echo "<h1>Movies of ". $_GET['movie'].  "</h1>";
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');
$counter=0;
$dbh = ConnectDB();


$playerlist = ListMatchingPlayers($dbh,$_GET['name']);
# echo '<pre>';print_r($playerlist); echo '</pre>';
echo"<ul>";
foreach($playerlist as $player)
{
	$temp = $player->movie_id;
	$movielist = ListTheMovies($dbh,$temp);
  foreach($movielist as $movie)
	{
	echo"<li>$movie->title</li>";
	$counter++;
	}
}
echo"</ul>";
?>

<?php include ('foot.php'); ?>



</body>
</html>

