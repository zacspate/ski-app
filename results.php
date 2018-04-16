<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with password 'project4skiapp') */
$link = mysqli_connect("localhost", "root", "project4skiapp", "records");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT bibNumber, run1Time, run2Time FROM Racer WHERE level = '$_POST[flevel]' AND race = '$_POST[frace]'";
$result = $link->query($sql);
echo "Race:  $_POST[frace], Level: $_POST[flevel]<br> ";
if ($result->num_rows > 0) {
        // output data of each row
  while($row = $result->fetch_assoc()) {
        echo "Bib: " . $row["bibNumber"]. " - Run 1 time: " . $row["run1Time"]. " - Run 2 time: " . $row["run2Time"]. "<br>";
    }
} else {
        echo "0 results<br>";
}


echo "<a href=view_results.html>Back</a>";

// Close connection
mysqli_close($link);
?>





