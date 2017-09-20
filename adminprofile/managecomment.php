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
<title>woodforest admin</title>

</head>


 <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>


 </head>


<body class="w-100 h-100 my-0">
  <nav class="navbar navbar-expand-md navbar-inverse bg-inverse">
    <div class="container">
      <a class="navbar-brand" href="profile.php">wf admin</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="profile.php">edit</a>
          </li>
              <li class="nav-item ">
            <a class="nav-link" href="simple.php">simple edit</a>
              </li>
          <li class="nav-item ">
            <a class="nav-link" href="manage.php">usuarios</a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="addnewhome.php">add new</a>
              </li>
          <li class="nav-item active">
            <a class="nav-link" href="managecomment.php">comment<span class="sr-only">(current)</span></a>
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


$sql = "SELECT * FROM `terranotes` ";





//If there is a connection display the results 
//It displays in a table format on the buttom 
//The echo commands display to the website

$result = $conn ->query($sql);

if ($result-> num_rows >0){

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped">';

echo "<thead><tr>

<th>user</th>
<th>subject</th>
<th>message</th>

</tr>";

echo"</thead>";

	while($row = $result -> fetch_assoc()){

echo"<tr><tbody><tr>



<td>" . $row["person_in"] . "</td>
<td>" . $row["subject"] . "</td>
<td>" . $row["mess"] . "</td>

<td><input type=hidden name=id_base value='" . $row["id_com"] . "'></td>




<td><a href =deletecom.php?nt_id=". $row["nt_id"] . " >Delete</a></td></tr>";

echo"</tbody>";

		}

        echo'</table>';
        echo'</div>';





       

}else{
	echo"0 results";
}

$conn->close();


?>











</body>
</html>