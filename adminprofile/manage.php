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
          <li class="nav-item active">
            <a class="nav-link" href="manage.php">usuarios<span class="sr-only">(current)</span></a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="addnewhome.php">add new</a>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="managecomment.php">comment</a>
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


<!-- End of the Navigation Tab Bar Code  -->


<!-- This the HTML form code that allows the admin to put in the values of a new restaurant they want to add  -->

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">aggregar usuario</h1>

<!-- This takes the name of the name and sends the input as a post command to the active file called nook.php that inserts to database  -->

				<form class="form-horizontal" role="form" method="POST" action="nook.php">

<!-- The Text Box to add Name  -->

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
					     <input type="text" class="form-control" id="name" name="username" placeholder="Username" required data-validation-required-message="Please enter a subject" >
					   </div>
					</div>

<!-- The Text Box to add Street number -->

                                        <div class="form-group">
						<label for="street number" class="col-sm-2 control-label">Password</label>
						   <div class="col-sm-10">
						      <input type="text" class="form-control" id="stnum" name="password" placeholder="Password" required data-validation-required-message="Please enter a subject">
					           </div>
					        </div>








<!-- The Insert button to add send info over to the nook.php file -->

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
						   <input id="submit" name="submit" type="submit" value="Insert" class="btn btn-primary"/>
	                                           <a href="profile.php" class="btn btn-default">Cancel</a>
					    </div>
					</div>
				     </form> 
			         </div>
		             </div>
	                 </div>

<!-- This END of the HTML form code that allows the admin to put in the values of a new restaurant they want to add  -->


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


$sql = "SELECT * FROM `login` ";





//If there is a connection display the results 
//It displays in a table format on the buttom 
//The echo commands display to the website

$result = $conn ->query($sql);

if ($result-> num_rows >0){

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped">';

echo "<thead><tr>

<th>Username</th>
<th>Password</th>



</tr>";

echo"</thead>";

	while($row = $result -> fetch_assoc()){

echo"<tr><tbody><tr>


<form action=updateusers.php method=post>

<td><input type=text name=rname value='" . $row["username"] . "'></td>
<td><input type=text name=passw value='" . $row["password"] . "'></td>


<td><input type=hidden name=id value='" . $row["id"] . "'></td>

<td><input type=submit value=Update></td>

</form>

<td><a href =delete.php?id=". $row["id"] . " >Delete</a></td></tr>";

echo"</tbody>";

		}

        echo'</table>';
        echo'</div>';


}else{
	echo"0 results";
}

$conn->close();


?>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>


  </body>
</html>
