<?php

/* This file has useful database functions in it for the movie
 * project.
 * Kyle Hughes
 */


//This function chooses which movie the person is in

function ListTheMovies($dbh, $name)
{

try 
{
	$phone_query= "SELECT movie_id, title  FROM movie " .
		      "WHERE movie_id like :name";
	 $stmt = $dbh->prepare($phone_query);
	 $match = "%$name%";
         $stmt->bindParam('name',$match);
         // run query
         $stmt->execute();
         // get all the results from database into array of objects

         $phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
         // release the statement
         $stmt = null;

         return $phonedata;
     }
     catch(PDOException $e)
     {
         die ('PDO error in ListTheMovies()": ' . $e->getMessage() );
     }
 }



//ListMatchingPlayers sets up the movie with the players id
function ListMatchingPlayers($dbh,$name)
{
 try
{
	$phone_query= "SELECT movie_id,player_id  FROM roles " .
		      "WHERE player_id like :name";
	 $stmt = $dbh->prepare($phone_query);
	 $match = "%$name%";
         $stmt->bindParam('name',$match);

         // run query
         $stmt->execute();
         // get all the results from database into array of objects
         $phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
         // release the statement
         $stmt = null;

         return $phonedata;
     }
     catch(PDOException $e)
     {
         die ('PDO error in ListMatchingPlayers()": ' . $e->getMessage() 
);
     }
 }

// list all of the players in the database
function ListAllPlayers($dbh)
{
try{
	$query = "SELECT player_id,fname,lname FROM players";
	$stmt =$dbh->prepare($query);
	$stmt->execute();
	$phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt=null;
	return $phonedata;
	}


catch(PDOException $e)
{
	die('PDO error in ListAllPlayers()"; ' . $e->getMessage() );
}
}

//lists all the movies in database
function ListAllPhones($dbh)
{
    // fetch the data
    try {
        // set up query
        $phone_query = "SELECT movie_id, title FROM movie";
        // prepare to execute (this is a security precaution)
        $stmt = $dbh->prepare($phone_query);
        // run query
        $stmt->execute();
        // get all the results from database into array of objects
        $phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
        // release the statement
        $stmt = null;

        return $phonedata;
    }
    catch(PDOException $e)
    {
        die ('PDO error in ListAllPhones()": ' . $e->getMessage() );
    }
}


// ListMatchingPhones() - return an array of phone objects
// USAGE: $phonelist = ListAllPhones($dbh, $name)
// $dbh is database handle, $name is what to search
function ListMatchingPhones($dbh, $name)
{
    // fetch the data
    try {
        // Note use of ":name" in query as placeholder
        $phone_query = "SELECT movie_id, title FROM movie " .
                       "WHERE  title like :name";
        // prepare to execute
        $stmt = $dbh->prepare($phone_query);

        // bind $name to :name placeholder
        // Note use of "%" as wildcard, same as "*" for shell
        // or ".*" in sed/grep.
        $match = "%$name%";
        $stmt->bindParam('name', $match);

        $stmt->execute();
        $phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;

        return $phonedata;
    }
    catch(PDOException $e)
    {
        die ('PDO error in ListMatchingPhones(): ' . $e->getMessage() );
    }
}
//gets the actors in a movie returns a player_id
function ListMatchingActors2($dbh,$store){

try {
	$phone_query="SELECT movie_id, player_id FROM roles " .
			"WHERE movie_id like :store";



		$stmt = $dbh->prepare($phone_query);
		$match = "%$store%";
		$stmt->bindParam('store',$match);
		$stmt->execute();
		$phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
		$stmt=null;
		return $phonedata;
	}
catch(PDOException $e){

die('PDO error in ListMatchingActors2(); ' . $e-> getMessage() );


}
}
//uses the player id from above to print the actor 
//in the movie
function ListMatchingActors($dbh,$name)
{
try {
	$phone_query = "SELECT fname,lname,player_id FROM players " .
			"WHERE player_id like :name";
	$stmt = $dbh->prepare($phone_query);
	$match = "%$name%";
	$stmt->bindParam('name',$match);
	
	$stmt->execute();
	$phonedata = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt = null;

	return $phonedata;
}
catch(PDOException $e)
{
die ('PDO error in ListMatchingActors(): ' . $e->getMessage() );
}
}
?>
