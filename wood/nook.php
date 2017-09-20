<?php
include('session.php');
?>


<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.github.io/templates/blank/theme.css" type="text/css"> </head>

<body>

 <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="">Thanxs</h2>
        </div>
      </div>
    </div>
  </div>

 <div class="col-md-12">
          <p class="lead">We will get back to you</p>
        </div>



<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "woodforest2", "Coffee2017", "woodcong");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$sub = mysqli_real_escape_string($link, $_REQUEST['subject']);
$mess = mysqli_real_escape_string($link, $_REQUEST['message']);

$name= $login_session;



$sql = "INSERT INTO  `woodcong`.`terranotes` (
`nt_id` ,
`person_in` ,
`subject` ,
`mess`
)
VALUES (
NULL ,  '$name',  '$sub',  '$mess'
)";








if(mysqli_query($link, $sql)){
    


echo '<img src="https://d4z6dx8qrln4r.cloudfront.net/image-f00a43cbb53b4e0a953dc6dfd0060a95-default.gif">';






    header("refresh:4; url=profile.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>



 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>




