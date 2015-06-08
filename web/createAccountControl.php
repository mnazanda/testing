<?php

header('Location: index.php');

$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
    or die("Could Not Connect");
 
pg_query($connect,"INSERT INTO users (\"userName\", password, \"firstName\", \"lastName\")
        VALUES ('$_POST[userName]', '$_POST[password]', '$_POST[firstName]', '$_POST[lastName]')");
pg_close($connect);

?>