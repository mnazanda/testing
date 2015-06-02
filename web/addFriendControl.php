<?php
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$user = $_SESSION["userName"];
$reqFriend = $_POST["requestedFriend"];
$_SESSION["requestedFriend"] = $_POST["requestedFriend"];


$query = "SELECT * FROM users WHERE UserName = '$reqFriend'";

$result = mysqli_query( $connect, $query);
$row = mysqli_fetch_array($result);

if($row)
{
	mysqli_query( $connect, "INSERT INTO friends (userName, friend)
        VALUES ('$user', '$reqFriend')");
	mysqli_query( $connect, "INSERT INTO friends (userName, friend)
        VALUES ('$reqFriend','$user')");
	header('Location: viewFriends.php?addAlert='. urlencode("Friend added!"));
}
else
{
	header('Location: viewFriends.php?addAlert='. urlencode("No User exists!"));
}

$connect->close();
?> 