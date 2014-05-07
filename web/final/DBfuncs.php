<?php

/* This file has useful database functions in it for the movie
 * project.
 * Kyle Hughes
 */


//This function chooses which movie the person is in




//ListMatchingPlayers sets up the movie with the players id
function ListMatchingPlayers($dbh,$fname,$lname)
{
 try
{
	$phone_query= "SELECT fnmae,lname,position,salary,age  
FROM player ". "WHERE fnmae like :fname and lname like :lname";
	 $stmt = $dbh->prepare($phone_query);
	 $match = "%$fname%";
	 $lmatch="%$lname%";
         $stmt->bindParam('fname',$match);
	 $stmt->bindParam('lname',$lmatch);
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
	$query = "SELECT fnmae, lname,position,salary,age FROM player";
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

//lists all the players on the roster
function ListTheRoster($dbh)
{
    // fetch the data
    try {
        // set up query
        $phone_query = "SELECT fnmae, lname,position,salary,age FROM 
player";
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
        die ('PDO error in ListTheRoster()": ' . $e->getMessage() );
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
        $phone_query = "SELECT movie_id, title FROM movies " .
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
