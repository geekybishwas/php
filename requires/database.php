<?php
/***
    Get the database connection

    @return object connection to a MYSQL server

***/
function getDB()
{

    $db_host="localhost";
    $db_name="MYBLOG";
    $db_username="root";
    $db_psw="root";


    //Creating a connection to database
    $conn=mysqli_connect($db_host,$db_username,$db_psw,$db_name);

    return $conn;
} 