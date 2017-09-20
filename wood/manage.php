<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Restaurant DB</title>
    <link rel="stylesheet" href="bootstrap.min.css">
  </head>

  <body>

<!-- This is the Navigation Tab that allows the user to return to Admin Profile  -->

<div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="profile.php">Admin Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

<!-- End of the Navigation Tab Bar Code  -->


<!-- This the HTML form code that allows the admin to put in the values of a new restaurant they want to add  -->

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Add New Professor...</h1>

<!-- This takes the name of the name and sends the input as a post command to the active file called nook.php that inserts to database  -->

				<form class="form-horizontal" role="form" method="POST" action="nook.php">

<!-- The Text Box to add Name  -->

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
					     <input type="text" class="form-control" id="name" name="name" placeholder="First Name" >
					   </div>
					</div>

<!-- The Text Box to add Street number -->

                                        <div class="form-group">
						<label for="street number" class="col-sm-2 control-label">Last Name</label>
						   <div class="col-sm-10">
						      <input type="text" class="form-control" id="stnum" name="stnum" placeholder="Last Name" >
					           </div>
					        </div>
<!-- The Text Box to add Street name --> 

                                        <div class="form-group">
						<label for="stname" class="col-sm-2 control-label">Major</label>
						    <div class="col-sm-10">
							<input type="text" class="form-control" id="stname" name="stname" placeholder="Major" >	
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
$username ="uhdjordan";
$password ="uhdchang";
$dbName ="uhdpizzaratzz";


//create connection

$conn = new mysqli($servername, $username, $password, $dbName);

//check connection

if ($conn -> connect_error){
	die ("connection failed: " . $conn -> connect_error);
}


$sql = "SELECT * FROM `teacher` ";





//If there is a connection display the results 
//It displays in a table format on the buttom 
//The echo commands display to the website

$result = $conn ->query($sql);

if ($result-> num_rows >0){

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped">';

echo "<thead><tr>

<th>name</th>
<th>lastname</th>
<th>major</th>

<th>actions</th></tr>";

echo"</thead>";

	while($row = $result -> fetch_assoc()){

echo"<tr><tbody><tr>


<form action=updatetea.php method=post>

<td><input type=text name=rname value='" . $row["name"] . "'></td>
<td><input type=text name=passw value='" . $row["lname"] . "'></td>
<td><input type=text name=mj value='" . $row["major"] . "'></td>

<td><input type=hidden name=id_teach value='" . $row["id_teach"] . "'></td>

<td><input type=submit value=Update></td>

</form>

<td><a href =deletetea.php?id_teach=". $row["id_teach"] . " >Delete</a></td></tr>";

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
