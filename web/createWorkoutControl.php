<?php
session_start();

header('Location: Profile.php');

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];

 pg_query($connect,"INSERT INTO workouts (workoutDate,  title, location, numOfReserves ,spotsLeft, author, description, startTime, endTime)
        VALUES ('$_POST[date]', '$_POST[title]', '$_POST[location]', '$_POST[numOfReserves]', '$_POST[numOfReserves]', '$username', '$_POST[description]', '$_POST[startTime]', '$_POST[endTime]')");
 
pg_close($connect);

?>