<?php
session_start();

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];

$workoutInfo = "SELECT * FROM workouts WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'";

$result = pg_query( $connect, $workoutInfo);
$row = pg_fetch_row($result);


$friendSpot = "reserve".$row[4];
$newSpotsLeft = $row[4]-1;

if($row[4] > 0 && $row[9] != $user && $row[10] != $user && $row[11] != $user)
{
	pg_query( $connect, "UPDATE workouts SET $friendSpot = '$_SESSION[userName]', spotsLeft = '$newSpotsLeft' WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'");
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