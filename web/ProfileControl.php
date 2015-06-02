<?php
session_start();

header('Location: Profile.php');

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");

$user = $_SESSION["userName"];

$profileQuery = "SELECT * FROM users WHERE UserName = '$user'";
//$friendsQuery = "SELECT * FROM friends WHERE UserName = '$user'";

$profile = pg_query( $connect, $profileQuery);
//$friends = pg_query( $connect, $friendsQuery);

//$fRow = pg_fetch_array($friends);
$pRow = pg_fetch_row($profile);
if ($pRow) {
	
	$_SESSION["fullName"] = $pRow[3] . " " . $pRow[4];
	$_SESSION["email"] = $pRow[2];
}
pg_close($connect);
?> 