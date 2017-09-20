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

          <li class="nav-item">
            <a class="nav-link" href="manage.php">usuarios</a>
          </li>

  <li class="nav-item active">
            <a class="nav-link" href="addnewhome.php">add new<span class="sr-only">(current)</span></a>
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





  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">add new home</h1>
        </div>
      </div>
    </div>
  </div>





  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" role="form" method="POST" action="addhome.php">


            <div class="form-group"> <label>lastname</label>
              <input type="text" name="lastname" class="form-control" placeholder="last name"> </div>

            <div class="form-group"> <label>name</label>
              <input type="text" name="name" class="form-control" placeholder="firstname"> </div>

            <div class="form-group"> <label>street number</label>
              <input type="text" name="stnumber" class="form-control" placeholder="street number"> </div>



 

<?php



$conn = new mysqli('localhost', 'woodforest2', 'Coffee2017', 'woodcong') 
or die ('Cannot connect to db');

    $result = $conn->query("select  st_id, stnames from addstreet");
    
    echo "<html>";
    echo "<body>";

echo'<label>street name</label>';

echo '<div class="form-group" class="form-control"> ';

    echo "<select name='stnames'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['st_id'];
                  $name = $row['stnames']; 
                  

                  echo '<option value="'.$name.'">'.$name.'</option>';



                 
}

    

    echo "</select>";
    echo '</div>';
    echo "</body>";
    echo "</html>";
?>

            
             

            <div class="form-group"> <label>city</label>
              <input type="text" name="city" class="form-control" placeholder="city"> </div>

            <div class="form-group"> <label>state</label>
              <input type="text" name="state" class="form-control" placeholder="state"> </div>

            <div class="form-group"> <label>zipcode</label>
              <input type="text" name="zipo" class="form-control" placeholder="zipcode"> </div>

            <div class="form-group"> <label>phone</label>
              <input type="text" name="phones" class="form-control" placeholder="phone #"> </div>

            <div class="form-group"> <label>notes</label>
              <input type="text" name="notez" class="form-control" placeholder="notes"> </div>

            <div class="form-group"> <label>territory number</label>
              <input type="text" name="terrnum" class="form-control" placeholder="territory number"> </div>

            <button type="submit" class="btn btn-primary">Submit</button>


          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>