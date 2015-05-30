<?php 
session_start();

$connect=mysqli_connect("localhost", "root", "", "gymeet")
  or die("Could Not Connect");

$user = $_SESSION["userName"];

$result = mysqli_query($connect, "SELECT * FROM users WHERE author = '$user'");
$row = mysqli_fetch_array($result)) 
if ($row) 
{
    $_SESSION['first'] = $row['firstName'];
    $_SESSION['last'] = $row['lastName'];
    $_SESSION['email'] = $row['email'];
}

echo "</table>";
?>