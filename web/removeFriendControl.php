<?php
session_start();
header('Location:  Profile.php?tabs=viewFriendsTab');

$user = $_SESSION["userName"];
$removingFriend = $_GET['removeFriend'];

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
pg_query($connect,"DELETE FROM friends WHERE \"userName\" = '$user' AND friend = '$removingFriend'")or die("Could Connect");;
pg_query($connect,"DELETE FROM friends WHERE \"userName\" = '$removingFriend' AND friend = '$user'")or die("Could Not t");;

pg_close($connect);

?>