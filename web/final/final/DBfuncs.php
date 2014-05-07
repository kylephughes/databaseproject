<?php


//ListMatchingPlayers searches for players with first and last name
function ListMatchingPlayers($dbh,$fname,$lname)
{
 try
{
	$player_query= "SELECT fnmae,lname,position,salary,age  
FROM player ". "WHERE fnmae like :fname and lname like :lname";
	 $stmt = $dbh->prepare($player_query);
	 $match = "%$fname%";
	 $lmatch="%$lname%";
         $stmt->bindParam('fname',$match);
	 $stmt->bindParam('lname',$lmatch);
         // run query
         $stmt->execute();
         // get all the results from database into array of objects
         $playerdata = $stmt->fetchAll(PDO::FETCH_OBJ);
         // release the statement
         $stmt = null;

         return $playerdata;
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
	$query = "SELECT fnmae, lname, position, salary, age FROM player";
	$stmt =$dbh->prepare($query);
	$stmt->execute();
	$playerdata = $stmt->fetchAll(PDO::FETCH_OBJ);
	$stmt=null;
	return $playerdata;
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
        $player_query = "SELECT fnmae, lname,position,salary,age FROM 
player";
        // prepare to execute (this is a security precaution)
        $stmt = $dbh->prepare($player_query);
        // run query
        $stmt->execute();
        // get all the results from database into array of objects
        $playerdata = $stmt->fetchAll(PDO::FETCH_OBJ);
        // release the statement
        $stmt = null;

        return $playerdata;
    }
    catch(PDOException $e)
    {
        die ('PDO error in ListTheRoster()": ' . $e->getMessage() );
    }
}
