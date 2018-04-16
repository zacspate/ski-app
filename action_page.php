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
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
}else{
	 "UPDATE Racer SET run2Time = '$_POST[fruntime]' WHERE bibNumber = '$_POST[fbib]' AND level = '$_POST[flevel]' AND race = '$_POST[frace]'";
	if(mysqli_query($link, $sql)){
		echo "Records inserted successfully for run 2.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
}


echo "<a href=input_results.html>Back</a>";

// Close connection
mysqli_close($link);
?>
