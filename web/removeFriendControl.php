<?php
session_start();
header('Location:  Profile.php?tabs=viewFriendsTab');

$user = $_SESSION["userName"];
$removingFriend = $_GET['removeFriend'];

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
mysqli_query($connect,"DELETE FROM friends WHERE userName = '$user' AND friend = '$removingFriend'")or die("Could Connect");;
mysqli_query($connect,"DELETE FROM friends WHERE userName = '$removingFriend' AND friend = '$user'")or die("Could Not t");;

$connect->close();

?>