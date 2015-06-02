<?php
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];

$workoutInfo = "SELECT * FROM workouts WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'";

$result = mysqli_query( $connect, $workoutInfo);
$row = mysqli_fetch_row($result);


$spot = 1;
if($row[10] == $user)
	$spot = 2;
else if($row[11] == $user)
	$spot = 3;

$friendSpot = "reserve".$spot;
$newSpotsLeft = $row[4]+1;

mysqli_query( $connect, "UPDATE workouts SET $friendSpot = '', spotsLeft = '$newSpotsLeft' WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'");

header('Location: viewWorkout.php?friend='.$row[5].'&title='.$row[1].'&workoutDate='.$row[0].'&alert='. urlencode("You have unreserved a spot for this workout!"));

$connect->close();
?>