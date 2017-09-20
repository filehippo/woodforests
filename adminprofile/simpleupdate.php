<?php

//Started in 12/26/2016 - 9:40 am nook cafe 
//Alfred Albizures in collaboration with william albizures
//Completed code on 12/30/2016 - 3:42PM Starbucks wallisville rd
// 832-414-0264 alfredalbizures@gmail.com

//SQL DataBase log in information from the Cpanel in Godaddy

$servername = "localhost";
$username ="woodforest2";
$password ="Coffee2017";
$dbName ="woodcong";


//create connection

$conn = new mysqli($servername, $username, $password, $dbName);

//check connection

if ($conn -> connect_error){
	die ("connection failed: " . $conn -> connect_error);
}

//targeted database 

mysqli_select_db($conn,'woodcong');


echo"Updated Successfully";


$sql="UPDATE woodterr SET  
`last`='$_POST[alast]',
`first` ='$_POST[afirst]',
`streetnum`='$_POST[astreet]',
`streetname`='$_POST[asname]',
`city`='$_POST[acity]',
`state`='$_POST[ast]',
`zip`='$_POST[azip]', 
`phone`='$_POST[apho]', 
`notes`='$_POST[anote]', 
`terr`='$_POST[aterr]' WHERE `id`='$_POST[ids]'";



if (mysqli_query($conn,$sql))
header("refresh:1; url=simple.php");
else
    echo"NOT Updated bra";




?>