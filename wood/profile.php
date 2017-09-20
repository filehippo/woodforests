<?php
include('session.php');
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.github.io/templates/blank/theme.css" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<head>
<title>WoodForest DB</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>


 <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>


 </head>
<div class="noprint">

<body class="w-100 h-100 my-0">
  <nav class="navbar navbar-expand-md navbar-inverse bg-inverse">
    <div class="container">
      <a class="navbar-brand" href="profile.php">woodforest db</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="carta.php">Cartas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comment.html">Comment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  


  <nav class="navbar navbar-expand-md navbar-light bg-faded">
    <div id="profile" class="container">
 <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b> <b id="logout"><a href="logout.php">Log Out</a></b> 
  </div>
  </nav>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>


  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">Search...</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        <form action="" method="post">
          <form class="px-0">
            <div class="form-group"> <label></label>
              <form name="form1" method = "post" action="profile.php">
              <input id="skills" name="skills" type="text" label for="skills" class="form-control form-control-lg" placeholder="territory # from 0-51 or street name"> </div>


            <button type="submit" name="Submit" class="btn btn-primary text-left btn-lg" data-toggle="">Search</button>
              </form>
           </form>
        </div>
      </div>
    </div>
  </div>







</div>




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


//The input of the search bar gets placed in this line html
//then placed in the city interval or string


$array1 = array('1','2','3','4');

$city = $_POST['skills'];

$array2 = array($city);

$array3 = array('maps/gogo1.html','maps/gogo2.html','maps/gogo3.html','maps/gogo4.html');

$key = $city-1;


if(array_intersect($array1, $array2))

{

echo "<iframe height='320' scrolling='no' title='Responsive Google Map' src='$array3[$key]' frameborder='no' allowtransparency='true' allowfullscreen='true' style='width: 100%;'>        
</iframe>";  
}

//This decides if it is a number to execute a the following SQL query 
//if its a number then execute the first or else the second command 

if(is_numeric($city))
{

$sql = "SELECT * 
FROM  `woodterr` 
WHERE terr = $city
ORDER BY  `streetname` ASC ,  `streetnum` ASC ";

}
else
{

$sql = "SELECT * 
FROM  `woodterr` 
WHERE  `streetname` =  '$city'
ORDER BY  `terr` ASC ,  `streetnum` ASC   ";

}


//If there is a connection display the results 
//It displays in a table format on the buttom 
//The echo commands display to the website

$result = $conn ->query($sql);

if ($result-> num_rows >0){

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped">';

	echo "<thead>
<tr>

<th>ST#</th>
<th>st name</th>
<th>city</th>
<th>ph</th>
<th>N</th>
<th>#</th>

</tr>";

echo"</thead>";

	while($row = $result -> fetch_assoc()){

echo"<tbody>

<tr>

<td>" . $row["streetnum"] . "</td>
<td>" . $row["streetname"] . "</td>
<td>"  . $row["city"] . "</td>

<td>" . $row["phone"] . "</td>
<td>" . $row["notes"] ."</td>
<td>" . $row["terr"] . "</td>
</tr>";

echo"</tbody>";

		}

        echo'</table>';
        echo'</div>';
       

}else{
	echo"0 results";
}

$conn->close();


?>



<div class="noprint">

</div>

<style type="text/css">

@media print
{
.noprint {display:none;}

}

@media screen
{
...
}

.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 6px;
    padding-top: 6px;
    padding-right: 6px;
    padding-bottom: 6px;
    padding-left: 6px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;

 font-size: 12px;
}


</style>




    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap-3.3.7/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>


	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</body>

</html>