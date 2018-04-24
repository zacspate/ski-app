<?php
/* Attempt MySQL server connection*/
$link = mysqli_connect("localhost", "root", "project4skiapp", "records");

// Check if connection is succesful
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT bibNumber, run1Time, run2Time FROM Racer WHERE level = '$_POST[flevel]' AND race = '$_POST[frace]' ORDER BY bibNumber ASC";
$result = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Special Olympics Skiing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="ski_app.css">
</head>

<body>
<!-- The navbar at the top of the screen with the home button-->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #D8AC25">
  <div class="container" style="padding-left: 10%; padding-right: 10%">
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse navbar-fixed" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html" style="color: white">Home</a></li>
		<li><a href="view_results.html" style="color: white">View Results</a></li>
		<li><a href="input_results.html" style="color: white">Enter Results</a></li>
      </ul>
    </div>
  </div>
</nav>


<div style="height:50px">
</div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav sidenav-left">

    </div>
    <div class="col-sm-8 center text-left"> 
	  <div style="text-align: center">
	    <h3>Pennsylvania Special Olympics</h3>
	    <h4>Alpine Skiing</h4>
	  </div>
	  <hr>
      <div class="col-sm-6" style="text-align: center">
	  
	<?php
		echo "Race: $_POST[frace], Level: $_POST[flevel]";
	?>
	
	    <table class="table table-bordered">
                        <thead>
                        <tr>
                                <th>Bib</th>
                                <th>Run 1 Time</th>
                                <th>Run 2 Time</th>
                        </tr>
                        </thead>
                        <tbody>
                <?php
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>'.$row['bibNumber'].'</td>
                                <td>'.$row['run1Time'].'</td>
				<td>'.$row['run2Time'].'</td>
                                </tr>';
                }
                }
?>
                        </tbody>
        </table>
	  </div>
    </div>
    <div class="col-sm-2 sidenav sidenav-right">
    </div>
  </div>
</div>

<footer class="container-fluid text-center" style="float-bottom">
  <p>Last updated: April 17, 2018</p>
</footer>

</body>
</html>
