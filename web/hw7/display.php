<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Display</title>
</head>

<body>


<?php
/*This file displays the actors in a movie
 *
 */

echo "<h1>Actors from ". $_GET['movie']. "</h1>";
// access information in directory with no web access
require_once('/export/home/hughes72/source_html/web/hw7/Connect.php');

// other functions are right here
require_once('DBfuncs.php');
$counter=0;
$dbh = ConnectDB();


$playerlist = ListMatchingActors2($dbh,$_GET['name']);
# echo '<pre>';print_r($playerlist); echo '</pre>';
echo"<ul>";
foreach($playerlist as $player)
{
	$temp = $player->player_id;
	$actorlist = ListMatchingActors($dbh,$temp);
  foreach($actorlist as $actor)
	{echo"\n";
	echo"<li><a href = 
'./display_movies.php?name=$actor->player_id&amp;movie=$actor->fname'>$actor->fname,$actor->lname</a>";
      echo"</li>";
	$counter++;
	}
}
echo"</ul>";
?>

<?php include ('foot.php'); ?>



</body>
</html>

