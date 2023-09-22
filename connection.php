<?php

require "requires/database.php";

$conn=getDB();

//Check the connections is established or not
if(!mysqli_connect_error())
    echo "Succesfully connected to database";
else
    echo "Connection Failed";


//Creating a sql query
$sql="SELECT *FROM ARTICLES ORDER BY ID;";


//Sending sql query to database
$results=mysqli_query($conn,$sql);


//Checking
if($results===false)
    echo mysqli_error($conn);
else
{
    //Fetches all results in assoc array and stored it in articles
    $articles=mysqli_fetch_all($results,MYSQLI_ASSOC); 

    //It fetches single row
    $article=mysqli_fetch_assoc($results);

    //Dumping the results
    var_dump($articles); 
}

