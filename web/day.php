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

<style>
  td, h5, h6{
    text-align:center;
  }

</style>

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

            $prev_date = date('Y-m-d', strtotime($_GET["date"] .' -1 day'));
            $next_date = date('Y-m-d', strtotime($_GET["date"] .' +1 day'));

            echo "<table width='100%'><tr>";
            echo "<td style='text-align:left'><h2><button onClick=\"location.href='day.php?date=".$prev_date."'\">previous</h2></button></td>";
            echo "<td style='text-align:center'><h2><strong>" . date("l", strtotime($_GET["date"])) . ", " . date("M d, Y", strtotime($_GET["date"])) . "</strong></h2></td>";
            echo "<td style='text-align:right'><h2><button onClick=\"location.href='day.php?date=".$next_date."'\">next</h2></button></td>";
            echo "</tr></table>";

          $user = $_SESSION["userName"];
          $query = "SELECT * FROM friends WHERE UserName = '$user'";
          $result = pg_query( $connect, $query);

          echo "<table id='table' width='100%'>";
          echo "<tr><th><h5><strong></strong></h5></th><th><h5><strong>Start</strong></h5></th><th><h5><strong>End</strong></h5></th><th><h5><strong>Title</strong></h5></th><th><h5><strong>Location</strong></h5></th><th><h5><strong>Spots Available</strong></h5></th><th><h5><strong></strong></h5></th></tr>";

          while($row = pg_fetch_array($result)) 
          {
            $wDate = date("n-j-Y", strtotime($_GET["date"]));
            $workoutInfo = "SELECT * FROM workouts WHERE author = '$row[friend]' and \"workoutDate\" = '$wDate' ORDER BY startTime DESC ";
            //echo $workoutInfo . "<br/>";
            $wresult = pg_query($connect, $workoutInfo);
            while($wRow = pg_fetch_array($wresult)) 
            if ($wRow) 
            {
              echo "<tr><td><strong>".$wRow['author']."</strong></td>
                    <td>".$wRow['startTime']."</td>
                    <td>".$wRow['endTime']."</td>
                    <td>".$wRow['title']."</td> 
                    <td>".$wRow['location']."</td>
                    <td>".$wRow['spotsLeft']."</td>
                    <td><a href=\"viewWorkout.php?friend=".$wRow['author']."&title=".$wRow['title']."&workoutDate=".$wDate."\">View</a></td></tr>";
            }
          }

          echo "</table>";
        ?> 
        
      </div>
    </div>
  </div>



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>