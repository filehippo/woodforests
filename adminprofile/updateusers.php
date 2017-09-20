<?php

//Started in 12/26/2016 - 9:40 am nook cafe 
//Alfred Albizures in collaboration with william albizures
//Completed code on 12/30/2016 - 3:42PM Starbucks wallisville rd
// 832-414-0264 alfredalbizures@gmail.com

//SQL DataBase log in information from the Cpanel in Godaddy


$servername = "localhost";
$username ="filehippo";
$password ="Coffee2017";
$dbName ="woodforest";


//create connection

$conn = new mysqli($servername, $username, $password, $dbName);

//check connection

if ($conn -> connect_error){
	die ("connection failed: " . $conn -> connect_error);
}

//targeted database 

mysqli_select_db($conn,'woodforest');


echo"Updated Successfully";


$sql="UPDATE login SET `username`='$_POST[rname]', `password` ='$_POST[passw]' WHERE `id`='$_POST[id]'";



if (mysqli_query($conn,$sql))
header("refresh:1; url=manage.php");
else
    echo"NOT Updated bra";




?>