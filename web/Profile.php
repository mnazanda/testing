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
<?php if (isset($_GET["addAlert"])): ?>
     <script type="text/javascript">
      alert("<?php echo htmlentities(urldecode($_GET["addAlert"])); ?>");
     </script>
     <?php endif; 
   ?>
  
<style>
  td, th{
    text-align:center;
  }

  button{
    vertical-align: right;
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
            echo "<h3><strong>" . $_SESSION["fullName"] . "</strong></h3>";
        ?>

        <button onClick="location.href='editProfileControl.php'">Edit Profile</button>
        <button onClick="location.href='viewFriends.php'">View Friends</button>
        <br/>
        
        <!--<h5>My Workouts:</h5>-->
        <div id="tabs">
          <ul class="nav nav-tabs" role="tablist">
             <li><h5><a href="#myWorkoutsTab">Workouts Created</a></h5></li>
             <li><h5><a href="#reservedWorkoutsTab">Workouts Reserved</a></h5></li>
          </ul>
          <?php 
            $connect=mysqli_connect("localhost", "root", "", "gymeet")
              or die("Could Not Connect");

            $user = $_SESSION["userName"];

            echo "<div id='myWorkoutsTab'><table id='table' class='u-full-width'>";
            echo "<tr><th>Date</th><th>Time</th><th>Title</th><th>Location</th><th>Spots Available</th><th></th></tr>";


            $currDate = str_replace("/","-",date("n-j-Y"));

            $wresult = mysqli_query($connect, "SELECT * FROM workouts WHERE author = '$user' and workoutDate >= '$currDate'");
            while($wRow = mysqli_fetch_array($wresult)) 
            if ($wRow) 
            {
              echo "<td>".$wRow['workoutDate']."</td>
                    <td>".$wRow['startTime']." - ".$wRow['endTime']."</td>
                    <td>".$wRow['title']."</td> 
                    <td>".$wRow['location']."</td>
                    <td>".$wRow['spotsLeft']."/".$wRow['numOfReserves']."</td>
                    <td><a href='editWorkout.php?title=".$wRow['title']."&workoutDate=".$wRow['workoutDate']."&location=".$wRow['location']."&startTime=".$wRow['startTime']."&endTime=".$wRow['endTime']."&numOfReserves=".$wRow['numOfReserves']."&description=".$wRow['description']."'>Edit</a></td></tr>";
            }

            echo "</table></div>";

            //echo "<h5>Reserved Workouts:</h5>";
            echo "<div id='reservedWorkoutsTab' ><table id='table' class='u-full-width'>";
            echo "<tr><th></th><th>Date</th><th>Time</th><th>Title</th><th>Location</th><th>Spots Available</th><th></th></tr>";

            $w2result = mysqli_query($connect, "SELECT * FROM workouts WHERE reserve1 = '$user' or reserve2 = '$user' or reserve3 = '$user' and workoutDate >= '$currDate'");
            while($w2Row = mysqli_fetch_array($w2result)) 
            if ($w2Row) 
            {
              echo "<tr><td><strong>".$wRow['author']."</strong></td>
                    <td>".$w2Row['workoutDate']."</td>
                    <td>".$w2Row['startTime']." - ".$w2Row['endTime']."</td>
                    <td>".$w2Row['title']."</td> 
                    <td>".$w2Row['location']."</td>
                    <td>".$w2Row['spotsLeft']."/".$w2Row['numOfReserves']."</td>
                    <td><a href=\"viewWorkout.php?friend=".$w2Row['author']."&title=".$w2Row['title']."&workoutDate=".$w2Row['workoutDate']."\">View</a></td></tr>";
            }
            echo "</table></div>";
          ?>
        </div>
      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

<!-- CSS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/custom.css">
<!--<script type="text/javascript" src="lib/jquery.min.js"></script>-->
<!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<link rel="icon" type="image/png" href="images/favicon.png">



<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script type="text/javascript" charset="utf-8">
      $(document).ready( function () {
        $("#tabs").tabs({ active: '#myWorkoutsTab' });
      });
  </script>


</html>