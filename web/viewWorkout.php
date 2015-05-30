<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>GYMeet</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <?php if (isset($_GET["alert"])): ?>
     <script type="text/javascript">
      alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
     </script>
     <?php endif; 
   ?>



</head>
<body>

  <!-- Navbar
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <nav class="navbar">
    <div class="container">
     <h2 class="logo">GYMeet</h2>
      <ul class="navbar-list">
        <li class="navbar-item"><a class="navbar-link" href="logoutControl.php">Logout</a></li>
        <li class="navbar-item"><a class="navbar-link" href="ProfileControl.php">Profile</a></li>
        <li class="navbar-item"><a class="navbar-link" href="month.php">Calendar</a></li>
        <li class="navbar-item"><a class="navbar-link" href="createWorkoutForm.php">Create Workout</a></li>
      </ul>
    </div>
  </nav>
  
  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


  <div class="container">
    <div class="row">
      <div class="twelve columns" style="margin-top: 10%">

        <?php session_start();
          $connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
            or die("Could Not Connect");


            $workoutInfo = "SELECT * FROM workouts WHERE author = '$_GET[friend]' and workoutDate = '$_GET[workoutDate]' and title = '$_GET[title]'";
            //echo $workoutInfo . "<br/>";
            $wresult = pg_query($connect, $workoutInfo);
            $wRow = pg_fetch_row($wresult);
            if ($wRow) 
            {
                    /*echo $wRow[0]."<br/>";                //workouDate
                    echo $wRow[1]."<br/>";                //title
                    echo $wRow[5]."<br/>";                //author
                    echo $wRow[7]."<br/>";                //startTime
                    echo $wRow[8]."<br/>";                //endTime
                    echo $wRow[2]."<br/>";                //location
                    echo $wRow[4]."<br/>";                //spotsLeft
                    echo $wRow[6]."<br/>";                //description
                    echo $wRow[9]."<br/>";                //reserve1
                    echo $wRow[10]."<br/>";               //reserve2
                    echo $wRow[11]."<br/>";               //reserve3*/
                    

                    $peopleGoing="";
                    if(strlen($wRow[9]) > 0)
                      $peopleGoing = $peopleGoing ." ". $wRow[9];
                    if(strlen($wRow[10]) > 0)
                      $peopleGoing = $peopleGoing ." ".$wRow[10];
                    if(strlen($wRow[11]) > 0)
                      $peopleGoing = $peopleGoing ." ". $wRow[11];
                    
                    echo "<table>";
                      echo "<tr><td colspan='2' style='text-align:left'><h2>" . $wRow[0] . "</h2></td></tr>";
                      echo "<tr><td><h5><strong>Title: </strong></h5></td><td><h5>".$wRow[1]."</h5></td></tr>";
                      echo "<tr><td><h5><strong>Location: </strong></h5></td><td><h5>".$wRow[2]."</h5></td></tr>";
                      echo "<tr><td><h5><strong>Time: </strong></h5></td><td><h5>".$wRow[7]." - ".$wRow[8]."</h5></td></tr>";
                      echo "<tr><td><h5><strong>Description: </strong></h5></td><td><h5>".$wRow[6]."</h5></td></tr>";
                      echo "<tr><td><h5><strong>Spots Left: </strong></h5></td><td><h5>".$wRow[4]."/".$wRow[3]."</h5></td></tr>";
                      echo "<tr><td><h5><strong>People Going: </strong></h5></td><td><h5>".$peopleGoing."</h5></td></tr>";
                    echo "</table>";


                    if($wRow[9] == $_SESSION['userName'] || $wRow[10] == $_SESSION['userName'] || $wRow[11] == $_SESSION['userName'])
                    {
                      echo "<button onClick=\"location.href='unreserveWorkoutControl.php?friend=".$wRow[5]."&title=".$wRow[1]."&workoutDate=".$_GET['workoutDate']."'\">Unreserve</button>";
                    }
                    else
                    {
                      echo "<button onClick=\"location.href='reserveWorkoutControl.php?friend=".$wRow[5]."&title=".$wRow[1]."&workoutDate=".$_GET['workoutDate']."'\">Reserve</button>"; 
                    }
            }
        ?>      
      </div>
    </div>
  </div>



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>