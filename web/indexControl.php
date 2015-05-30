<?php
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 

$user = $_POST["userName"];
$pass = $_POST["password"];

$query = "SELECT * FROM users WHERE UserName = '$user' AND Password = '$pass'";

$result = mysqli_query( $connect, $query);
$row = mysqli_fetch_array($result);

if($row)
{
	$_SESSION["userName"] = $_POST[userName];

	header('Location: ProfileControl.php');
}
else
{
	header('Location: index.php?alert='. urlencode("Invalid Login!"));
}

$connect->close();
?> 