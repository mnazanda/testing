<?php
session_start();

header('Location: ProfileControl.php');

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];



 mysqli_query($connect,"UPDATE workouts 
 							SET workoutDate = '$_POST[date]',
								title = '$_POST[title]',
								location = '$_POST[location]',
								description = '$_POST[description]',
								startTime = '$_POST[startTime]',
								endTime = '$_POST[endTime]' 
							WHERE author = '$username' 
							AND workoutDate = '$_GET[oldWorkoutDate]' 
							AND title = '$_GET[oldTitle]'");

$connect->close();

?>