<?php
session_start();

header('Location: ProfileControl.php');

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];



 pg_query($connect,"UPDATE workouts 
 							SET \"workoutDate\" = '$_POST[date]',
								title = '$_POST[title]',
								location = '$_POST[location]',
								description = '$_POST[description]',
								\"startTime\" = '$_POST[startTime]',
								\"endTime\" = '$_POST[endTime]' 
							WHERE author = '$username' 
							AND \"workoutDate\" = '$_GET[oldWorkoutDate]' 
							AND title = '$_GET[oldTitle]'");

pg_close($connect);

?>