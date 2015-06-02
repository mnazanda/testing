<?php
session_start();

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];

$workoutInfo = "DELETE FROM workouts WHERE author = '$user' and \"workoutDate\" = '$_GET[workoutDate]' and title = '$_GET[title]'";
pg_query( $connect, $workoutInfo);

header('Location: Profile.php&alert='. urlencode("You have removed the workout!"));

pg_close($connect);
?>