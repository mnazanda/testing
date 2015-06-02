<?php
session_start();

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];
$reqFriend = $_POST["requestedFriend"];
$_SESSION["requestedFriend"] = $_POST["requestedFriend"];


$query = "SELECT * FROM users WHERE \"userName\" = '$reqFriend'";

$result = pg_query( $connect, $query);
$row = pg_fetch_array($result);

if($row)
{
	pg_query( $connect, "INSERT INTO friends (\"userName\", friend)
        VALUES ('$user', '$reqFriend')");
	pg_query( $connect, "INSERT INTO friends (\"userName\", friend)
        VALUES ('$reqFriend','$user')");
	header('Location: viewFriends.php?addAlert='. urlencode("Friend added!"));
}
else
{
	header('Location: viewFriends.php?addAlert='. urlencode("No User exists!"));
}

pg_close($connect);
?> 