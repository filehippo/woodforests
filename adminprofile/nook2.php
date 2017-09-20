<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "uhdmunchy", "Coffee2017", "okaymunchy");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Name = mysqli_real_escape_string($link, $_REQUEST['name']);
$addpw = mysqli_real_escape_string($link, $_REQUEST['stnum']);




$sql = "INSERT INTO  `okaymunchy`.`admin` (`id` ,`username`,`password` ) VALUES (NULL ,  '$Name',  '$addpw')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header("refresh:2; url=manadmins.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>