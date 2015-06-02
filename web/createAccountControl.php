<?php

header('Location: Index.php');

$connect=mysqli_connect("localhost", "root", "", "gymeet")
    or die("Could Not Connect");
 
mysqli_query($connect,"INSERT INTO users (userName, password, firstName, lastName)
        VALUES ('$_POST[userName]', '$_POST[password]', '$_POST[firstName]', '$_POST[lastName]')");
$connect->close();

?>