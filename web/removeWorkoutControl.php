<?php
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];

$workoutInfo = "DELETE FROM workouts WHERE author = '$user' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'";
mysqli_query( $connect, $workoutInfo);

header('Location: Profile.php&alert='. urlencode("You have removed the workout!"));

$connect->close();
?>