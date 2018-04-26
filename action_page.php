<!DOCTYPE html>
<html lang="en">
<head>
  <title>Special Olympics Skiing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- links for bootstap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--Link for style sheet-->
  <link rel="stylesheet" href="ski_app.css">
</head><!--end of head-->

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
    </div><!--end of navbar-header -->
    <div class="collapse navbar-collapse navbar-fixed" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html" style="color: white">Home</a></li>
		<li><a href="view_results.html" style="color: white">View Results</a></li>
		<li><a href="input_results.html" style="color: white">Enter Results</a></li>
      </ul>
    </div><!--end of collapse-->
  </div><!--end of container-->
</nav><!--end of nav-->


<div style="height:50px">
</div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav sidenav-left">

    </div><!--end of sidenav-left-->
    <div class="col-sm-8 center text-left"> 
	  <div style="text-align: center">
	    <h3>Pennsylvania Special Olympics</h3>
	    <h4>Alpine Skiing</h4>
	  </div><!--end of text-align-->
	  <hr>
	  
	    <?php
/* Attempt MySQL server connection.*/
$link = mysqli_connect("localhost", "root", "project4skiapp", "records");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution if runnumber = 1
if(strcmp("$_POST[frunnumber]","one")==0){//checks if it is run 1 or 2
	$tester= "SELECT bibNumber FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	$result = $link->query($tester);
	$row = $result->fetch_assoc();
	if(strcmp($row['bibNumber'], "$_POST[fbib]")==0) {//checks if bib number is already listed for this race and level
		echo "Error: Bib Number already used in this race and level";
	}else{
		$sql= "INSERT INTO Racer(bibNumber,level,race,run1time) VALUES ('$_POST[fbib]','$_POST[flevel]','$_POST[frace]','$_POST[fruntime]')";
		if(mysqli_query($link, $sql)){
			echo "Records inserted successfully for run 1. ";
		} else{
			echo "ERROR: Could not insert time. Please try again. ";
		}
	}
}else{//if runnumber is 2
	$sql = "SELECT run1Time FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	if(strcmp($row['run1Time'],"DNF")==0){ //checks if run1 was a DNF
		echo "Cannot enter run 2 time for racer that DNF in race 1";
	}else{
		$tester= "SELECT bibNumber FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
		$result = $link->query($tester);
		$row = $result->fetch_assoc();
		if(strcmp($row['bibNumber'], "$_POST[fbib]")==0) { //checks if the bib is in database already
			$tester= "SELECT run2Time FROM Racer WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
			$result = $link->query($tester);
			$row = $result->fetch_assoc();
			if(strcmp($row['run2Time'], "")==0) {//checks if bib already has a run2 time
				$sql= "UPDATE Racer SET run2Time = '$_POST[fruntime]' WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
				if(mysqli_query($link, $sql)){
					echo "Records inserted successfully for run 2.";
				} else{
					echo "ERROR: Could not insert time for run 2. Ensure race, level, and bib are correct and try again. ";
				}
			}else{//cannont enter a second run 2 time
				echo "Cannot enter run 2 time for racer that already has run 2 time";
			}
		}else{//can't enter a run2 if there is no run 1 time yet
			echo "Cannot enter run 2 time for racer who does not have run 1 time.";
		}
	}
}
// Close connection
mysqli_close($link);
?><!--end of php script-->

	<a class="btn btn-primary btn-lg btn-block" href=input_results.html>Back</a>
    </div><!--end of col-sm-8-->
    <div class="col-sm-2 sidenav sidenav-right">
    </div><!--end of sidenav-right-->
  </div><!--end of row content-->
</div><!--end of container-fluid-->

<footer class="container-fluid text-center" style="float-bottom">
  <p>Last updated: April 26, 2018</p>
</footer><!--end of footer-->

</body><!--end of body-->
</html><!--end of html-->
