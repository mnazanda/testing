<?php 
session_start();

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
  or die("Could Not Connect");

$user = $_SESSION["userName"];

$result = pg_query($connect, "SELECT * FROM users WHERE author = '$user'");
$row = pg_fetch_array($result)) 
if ($row) 
{
    $_SESSION['first'] = $row['firstName'];
    $_SESSION['last'] = $row['lastName'];
    $_SESSION['email'] = $row['email'];
}

echo "</table>";
?>