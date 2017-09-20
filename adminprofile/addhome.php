<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "woodforest2", "Coffee2017", "woodcong");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$stnum = mysqli_real_escape_string($link, $_REQUEST['stnumber']);

$stnames = mysqli_real_escape_string($link, $_REQUEST['stnames']);

$citys = mysqli_real_escape_string($link, $_REQUEST['city']);
$st = mysqli_real_escape_string($link, $_REQUEST['state']);
$zip = mysqli_real_escape_string($link, $_REQUEST['zipo']);
$phon = mysqli_real_escape_string($link, $_REQUEST['phones']);
$notes = mysqli_real_escape_string($link, $_REQUEST['notez']);
$terr = mysqli_real_escape_string($link, $_REQUEST['terrnum']);

$sql = "INSERT INTO  `woodcong`.`woodterr` (
`id` ,
`last` ,
`first` ,
`streetnum` ,
`streetname` ,
`city` ,
`state` ,
`zip` ,
`phone` ,
`notes` ,
`terr`
)

VALUES (NULL ,  '$fname',  '$name',  '$stnum',  '$stnames',  '$citys','$st','$zip','$phon','$notes','$terr')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header("refresh:1; url=addnewhome.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>