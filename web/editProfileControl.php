<?php
session_start();

header('Location: ProfileControl.php?tab=viewFriendsTabs');

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];


 pg_query($connect,"UPDATE users 
                            SET email = '$_POST[email]',
                                \"firstName\" = '$_POST[firstName]',
                                \"lastName\" = '$_POST[lastName]'
                            WHERE \"userName\" = '$username' ");

$_SESSION["userName"] = $_POST['userName'];

pg_close($connect);

?>
