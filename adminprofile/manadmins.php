<?php
include('session.php');
?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="/indexsources/jquery-ui.css">
  <script src="/indexsources/jquery-1.10.2.js"></script>
  <script src="/indexsources/jquery-ui.js"></script>


<meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href="/bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/cssfiles/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/cssfiles/JS/html5shiv.min.js"></script>
      <script src="/cssfiles/JS/respond.min.js"></script>
    <![endif]-->

 <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: '/prengine/search.php'
    });
  });
  </script>

<head>
<title>Okay Munchy DB</title>
<link href="/cssfiles/style.css" rel="stylesheet" type="text/css">
</head>


<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/adminprofile/profile.php">Entry Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="manadmins.php">Manage Admins</a></li>
            <li><a href="/adminprofile/addrest/test.html">Add Restaurant</a></li>
            <li><a href="addmenuitem.php">Manage Menu</a></li>
            <li><a href="/adminprofile/managecomment.php">Manage Comments </a></li>
            
          </ul>
        </div>
      </div>
    </nav>









<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="/adminprofile/logout.php">Log Out</a></b>
</div>





<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Add new admin</h1>

<!-- This takes the name of the name and sends the input as a post command to the active file called nook.php that inserts to database  -->

				<form class="form-horizontal" role="form" method="POST" action="nook2.php">

<!-- The Text Box to add Name  -->

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
					     <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
					   </div>
					</div>

<!-- The Text Box to add Street number -->

                                        <div class="form-group">
						<label for="street number" class="col-sm-2 control-label">Password</label>
						   <div class="col-sm-10">
						      <input type="text" class="form-control" id="stnum" name="stnum" placeholder="Password" >
					           </div>
					        </div>







<!-- The Insert button to add send info over to the nook.php file -->

					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
						   <input id="submit" name="submit" type="submit" value="Insert" class="btn btn-primary"/>
	                                           
					    </div>
					</div>
				     </form> 
			         </div>
		             </div>
	                 </div>






<?php
$servername ="localhost";
$username ="uhdmunchy";
$password ="Coffee2017";
$dbName ="okaymunchy";

$conn = new mysqli($servername, $username, $password, $dbName);
$query = "SELECT COUNT(*) FROM admin";
$output = $conn->query($query);
$count = $output->fetch_row();

//echo "Total number of retrieved rows is ". $count[0];
    
    echo '<div class="section bars">';
      echo '<div class="container">';
        echo'<div class="row">';
          echo'<div class="col-md-12">';

            echo'<h1 class="text-center">';
            echo "There are $count[0] admins total  ";
            echo'</h1>';
            
          echo'</div>';
        echo'</div>';
      echo'</div>';
    echo'</div>';

$conn->close();

?>












    


       <?php

//Started in 12/26/2016 - 9:40 am nook cafe 
//Alfred Albizures in collaboration with william albizures
//Completed code on 12/30/2016 - 3:42PM Starbucks wallisville rd
// 832-414-0264 alfredalbizures@gmail.com

//SQL DataBase log in information from the Cpanel in Godaddy

$servername = "localhost";
$username ="uhdmunchy";
$password ="Coffee2017";
$dbName ="okaymunchy";


//create connection

$conn = new mysqli($servername, $username, $password, $dbName);

//check connection

if ($conn -> connect_error){
	die ("connection failed: " . $conn -> connect_error);
}


$sql = "SELECT * FROM `admin` ";


//$city = $_POST['skills'];


//if($city)
//{
//$sql = "SELECT * FROM  `base` WHERE  `name` =  '$city' ";
//}


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


<th>actions</th></tr>";

echo"</thead>";

	while($row = $result -> fetch_assoc()){

echo"<tr><tbody><tr>


<form action=updateadmins.php method=post>

<td><input type=text name=rname value='" . $row["username"] . "'></td>
<td><input type=text name=passw value='" . $row["password"] . "'></td>


<td><input type=hidden name=id value='" . $row["id"] . "'></td>

<td><input type=submit value=Update></td>

</form>

<td><a href =deleteadmins.php?id=". $row["id"] . " >Delete</a></td></tr>";

echo"</tbody>";

		}

        echo'</table>';
        echo'</div>';





       

}else{
	echo"0 results";
}

$conn->close();


?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https:/cssfiles/JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/bootstrap-3.3.7/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

  <link rel="stylesheet" href="/indexsources/jquery-ui.css">
  <script src="/indexsources/jquery-1.10.2.js"></script>
  <script src="/indexsources/jquery-ui.js"></script>








</body>
</html>