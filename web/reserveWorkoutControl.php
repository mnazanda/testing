<?php
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];

$workoutInfo = "SELECT * FROM workouts WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'";

$result = mysqli_query( $connect, $workoutInfo);
$row = mysqli_fetch_row($result);


$friendSpot = "reserve".$row[4];
$newSpotsLeft = $row[4]-1;

if($row[4] > 0 && $row[9] != $user && $row[10] != $user && $row[11] != $user)
{
	mysqli_query( $connect, "UPDATE workouts SET $friendSpot = '$_SESSION[userName]', spotsLeft = '$newSpotsLeft' WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'");
	header('Location: viewWorkout.php?friend='.$row[5].'&title='.$row[1].'&workoutDate='.$row[0].'&alert='. urlencode("You have reserved a spot for this workout!"));
}
else if ($row[4] == 0)
{
	header('Location: viewWorkout.php?friend='.$row[5].'&title='.$row[1].'&workoutDate='.$row[0].'&alert='. urlencode("Sorry, the workout is full!"));
}
else
{
	header('Location: viewWorkout.php?friend='.$row[5].'&title='.$row[1].'&workoutDate='.$row[0].'&alert='. urlencode("Sorry, you're already reserved for this workout!"));
}

$connect->close();
?>