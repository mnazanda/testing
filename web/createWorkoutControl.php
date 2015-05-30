<?php
session_start();

header('Location: Profile.php');

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];

 mysqli_query($connect,"INSERT INTO workouts (workoutDate,  title, location, numOfReserves ,spotsLeft, author, description, startTime, endTime)
        VALUES ('$_POST[date]', '$_POST[title]', '$_POST[location]', '$_POST[numOfReserves]', '$_POST[numOfReserves]', '$username', '$_POST[description]', '$_POST[startTime]', '$_POST[endTime]')");
 
$connect->close();

?>