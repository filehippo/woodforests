
<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "filehippo", "Coffee2017", "woodforest");
 
 
 
 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$sub = mysqli_real_escape_string($link, $_REQUEST['username']);
$mess = mysqli_real_escape_string($link, $_REQUEST['password']);





$sql = "INSERT INTO  `woodforest`.`login` (
`id` ,
`username` ,
`password` 
)
VALUES (
NULL , '$sub',  '$mess'
)";




if(mysqli_query($link, $sql)){
    echo "Inserted Successfully";
    header("refresh:1; url=manage.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>