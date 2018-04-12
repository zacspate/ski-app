<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with password 'project4skiapp') */
$link = mysqli_connect("localhost", "root", "project4skiapp", "records");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql= "INSERT INTO Racer(bibNumber,level,race,run1time) VALUES ('$_POST[fbib]','$_POST[flevel]','$_POST[frace]','$_POST[fruntime]')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo "'$_POST[flevel]' '$_POST[frace]'";
echo "<a href=input_results.html>Back</a>";

// Close connection
mysqli_close($link);
?>

