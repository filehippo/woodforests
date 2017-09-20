<?php

//Started in 12/26/2016 - 9:40 am nook cafe 
//Alfred Albizures in collaboration with william albizures
//Completed code on 12/30/2016 - 3:42PM Starbucks wallisville rd
// 832-414-0264 alfredalbizures@gmail.com


//Log in credentials to connect to mysql server 

$dbHost = 'localhost';
$dbUsername = 'woodforest2';
$dbPassword = 'Coffee2017';
$dbName = 'woodcong';


//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
//The query approximates the seachterm by using the %% modules 

$query = $db->query("SELECT * FROM  `woodterr` WHERE  `streetname`LIKE  '%".$searchTerm."%' ");

//This loop takes the input of the entire database but only the street names and places them in an array 

while ($row = $query->fetch_assoc()) {
    $data[] = $row['streetname'];
}

//makes the array into unique so there are no replicas in the street array

$gogo=array_unique($data);

//return json data
echo json_encode($gogo);
?>