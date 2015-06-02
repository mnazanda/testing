<?php
session_start();

header('Location: Profile.php');

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");

$user = $_SESSION["userName"];

$profileQuery = "SELECT * FROM users WHERE UserName = '$user'";
//$friendsQuery = "SELECT * FROM friends WHERE UserName = '$user'";

$profile = mysqli_query( $connect, $profileQuery);
//$friends = mysqli_query( $connect, $friendsQuery);

//$fRow = mysqli_fetch_array($friends);
$pRow = mysqli_fetch_row($profile);
if ($pRow) {
	
	$_SESSION["fullName"] = $pRow[3] . " " . $pRow[4];
	$_SESSION["email"] = $pRow[2];
}
$connect->close();
?> 