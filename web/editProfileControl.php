<?php
session_start();

header('Location: ProfileControl.php?tab=viewFriendsTabs');

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
$username = $_SESSION["userName"];


 mysqli_query($connect,"UPDATE users 
                            SET Username = '$_POST[userName]',
                                Password = '$_POST[password]',
                                email = '$_POST[email]',
                                FirstName = '$_POST[firstName]',
                                LastName = '$_POST[lastName]'
                            WHERE Username = '$username' ");

$_SESSION["userName"] = $_POST['userName'];

$connect->close();

?>
