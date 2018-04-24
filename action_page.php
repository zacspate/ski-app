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
	  
	    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with password 'project4skiapp') */
$link = mysqli_connect("localhost", "root", "project4skiapp", "records");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution if runnumber = 1
if(strcmp("$_POST[frunnumber]","one")==0){
	$tester= "SELECT bibNumber FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	$result = $link->query($tester);
	$row = $result->fetch_assoc();
	if(strcmp($row['bibNumber'], "$_POST[fbib]")==0) {
		echo "Error: Bib Number already used in this race and level";
	}else{
		$sql= "INSERT INTO Racer(bibNumber,level,race,run1time) VALUES ('$_POST[fbib]','$_POST[flevel]','$_POST[frace]','$_POST[fruntime]')";
		if(mysqli_query($link, $sql)){
			echo "Records inserted successfully for run 1. ";
		} else{
			echo "ERROR: Could not insert time. Please try again. ";
		}
	}
}else{
	$sql = "SELECT run1Time FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	if(strcmp($row['run1Time'],"DNF")==0){
		echo "Cannot enter run 2 time for racer that DNF in race 1";
	}else{
		$tester= "SELECT bibNumber FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
		$result = $link->query($tester);
		$row = $result->fetch_assoc();
		if(strcmp($row['bibNumber'], "$_POST[fbib]")==0) {
			$sql= "UPDATE Racer SET run2Time = '$_POST[fruntime]' WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
			if(mysqli_query($link, $sql)){
				echo "Records inserted successfully for run 2.";
			} else{
				echo "ERROR: Could not insert time for run 2. Ensure race, level, and bib are correct and try again. ";
			}
		}else{
			echo "Cannot enter run 2 time for racer who does not have run 1 time.";
		}
	}
}
// Close connection
mysqli_close($link);
?>

	<a class="btn btn-primary btn-lg btn-block" href=input_results.html>Back</a>
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
