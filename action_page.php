<!DOCTYPE html>
<html lang="en">
<head>
  <title>Special Olympics Skiing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* D8AC25 - yellow  195531 - green */
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 700px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #195531;
      height: 100%;
    }
	
	.center {
	  
	}
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: 200px;
        padding: 15px;
      }
	  .sidenav-left {
	    height: auto;
		padding: 15px;
		}
	  .center {
	    height: auto;
		padding: 15px;
	  }
      .row.content {height:auto;} 
    }
  </style>

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
	$sql= "INSERT INTO Racer(bibNumber,level,race,run1time) VALUES ('$_POST[fbib]','$_POST[flevel]','$_POST[frace]','$_POST[fruntime]')";
	if(mysqli_query($link, $sql)){
		echo "Records inserted successfully for run 1.";
	} else{
		echo "ERROR: Could not insert time. Please try again. " . mysqli_error($link);
	}
}else{
	 "UPDATE Racer SET run2Time = '$_POST[fruntime]' WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	if(mysqli_query($link, $sql)){
		echo "Records inserted successfully for run 2.";
	} else{
		echo "ERROR: Could not insert time for run 2. Ensure race, level, and bib are correct and try again. " . mysqli_error($link);
	}
}


echo "<a href=input_results.html>Back</a>";

// Close connection
mysqli_close($link);
?>
	<a class="btn btn-primary btn-lg btn-block" href=input_results.html>Back</a>
    </div>
    <div class="col-sm-2 sidenav sidenav-left">
    </div>
  </div>
</div>

<footer class="container-fluid text-center" style="float-bottom">
  <p>Last updated: April 17, 2018</p>
</footer>

</body>
</html>