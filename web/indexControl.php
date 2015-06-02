<?php
session_start();

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 

$user = $_POST["userName"];
$pass = $_POST["password"];

$query = "SELECT * FROM users WHERE \"userName\" = '$user' AND Password = '$pass'";

$result = pg_query( $connect, $query);
$row = pg_fetch_array($result);

if($row)
{
	$_SESSION["userName"] = $_POST[userName];

	header('Location: ProfileControl.php');
}
else
{
	header('Location: index.php?alert='. urlencode("Invalid Login!"));
}

pg_close($connect);
?> 