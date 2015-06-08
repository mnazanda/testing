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

   <?php if (isset($_GET["addAlert"])): ?>
     <script type="text/javascript">
      alert("<?php echo htmlentities(urldecode($_GET["addAlert"])); ?>");
     </script>
     <?php endif; 
   ?>
  
<style>
  td, th, h5, h6{
    text-align:center;
  }
  table{
    vertical-align:center;
  }

</style>


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
        
        <!--<h5>My Workouts:</h5>-->
        <div id="tabs">
          <ul class="nav nav-tabs" role="tablist">
             <li><h5><a href="#myWorkoutsTab">Workouts Created</a></h5></li>
             <li><h5><a href="#reservedWorkoutsTab">Workouts Reserved</a></h5></li>
             <li><h5><a href="#viewFriendsTab">Friends</a></h5></li>
          </ul>
          <!--**************************************WORKOUTS CREATED********************************-->
          <?php 
$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
              or die("Could Not Connect Here");

            $user = $_SESSION["userName"];

            echo "<div id='myWorkoutsTab'><table id='table' class='u-full-width'>";
            echo "<tr><th>Date</th><th>Time</th><th>Title</th><th>Location</th><th>Spots Available</th><th></th></tr>";


            $currDate = str_replace("/","-",date("n-j-Y"));

            $wresult = pg_query($connect, "SELECT * FROM workouts WHERE author = '$user' and \"workoutDate\" >= '$currDate'");
            while($wRow = pg_fetch_array($wresult)) 
            if ($wRow) 
            {
              echo "<td>".$wRow['workoutDate']."</td>
                    <td>".$wRow['startTime']." - ".$wRow['endTime']."</td>
                    <td>".$wRow['title']."</td> 
                    <td>".$wRow['location']."</td>
                    <td>".$wRow['spotsLeft']."/".$wRow['numOfReserves']."</td>
                    <td><a href='editWorkout.php?title=".$wRow['title']."&workoutDate=".$wRow['workoutDate']."&location=".$wRow['location']."&startTime=".$wRow['startTime']."&endTime=".$wRow['endTime']."&numOfReserves=".$wRow['numOfReserves']."&description=".$wRow['description']."'>Edit</a></td></tr>";
            }
          /*******************************************WORKOUTS RESERVED***********************************/
            echo "</table></div>";

            //echo "<h5>Reserved Workouts:</h5>";
            echo "<div id='reservedWorkoutsTab' ><table id='table' class='u-full-width'>";
            echo "<tr><th></th><th>Date</th><th>Time</th><th>Title</th><th>Location</th><th>Spots Available</th><th></th></tr>";

            $w2result = pg_query($connect, "SELECT * FROM workouts WHERE reserve1 = '$user' or reserve2 = '$user' or reserve3 = '$user' and \"workoutDate\" >= '$currDate'");
            while($w2Row = pg_fetch_array($w2result)) 
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
          <!--**************************************VIEW FRIENDS********************************-->
          <div id="viewFriendsTab">
            <br/>
              <form style="text-align:center" action="addFriendControl.php" method="post"/>
                Add Friend <input type="text" name="requestedFriend"  />
                <input type="submit" value="Add"/>
              </form>

              <?php 
$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
                  or die("Could Not Connect");


                $user = $_SESSION["userName"];
                $query = "SELECT * FROM friends WHERE \"userName\" = '$user'";
                $result = pg_query( $connect, $query);

                echo "<table style='margin-left:auto;margin-right:auto'>";
                echo "<tr><th>Username</th><th>FirstName</th><th>LastName</th><th>Email</th><th></th></tr>";

                while($row = pg_fetch_array($result)) 
                {

                  $friendInfo = "SELECT * FROM users WHERE \"userName\" = '$row[friend]'";

                  $fresult = pg_query($connect, $friendInfo);
                  $fRow = pg_fetch_row($fresult);
                  if ($fRow) 
                  {
                    $one = $fRow[0];
                    $two = $fRow[3];
                    $three = $fRow[4];
                    $four = $fRow[2];
                    $message = "'Are you sure you want to remove ". $one . "?'";
                    echo "<tr><td>".$one."</td>
                          <td>".$two."</td>
                          <td>".$three."</td>
                          <td>".$four."</td>
                          <td><a href=\"removeFriendControl.php?removeFriend=".$one."\" onClick=\"return confirm(".$message.")\">remove</a></td></tr>";
                  }
                } 
                echo "</table>";
              ?>        
          </div>
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



<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script type="text/javascript" charset="utf-8">
      $(document).ready( function () {

        var query = window.location.search.substring(1);
        var vars = query.split("=");
        var tabName = vars[1];

        $("#tabs").tabs({ active: "#" + tabName });
      });
  </script>


</html>