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

  <?php if (isset($_GET["addAlert"])): ?>
     <script type="text/javascript">
      alert("<?php echo htmlentities(urldecode($_GET["addAlert"])); ?>");
     </script>
     <?php endif; 
   ?>
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
            echo "<h4><strong>" . $_SESSION["fullName"] . "</strong></h4>";

        ?>

        <form action="addFriendControl.php" method="post"/>
          Add Friend <input type="text" name="requestedFriend"  />
          <input type="submit" value="Add"/>
        </form>

        <?php 
$connect=pg_connect("host=ec2-107-21-114-132.compute-1.amazonaws.com port=5432 dbname=d6ad8doip7s4vu user=cmcevirzzwpuze password=z7Cu5bKWj8CzZXf3OlSV-Mg90n")
            or die("Could Not Connect");


          $user = $_SESSION["userName"];
          $query = "SELECT * FROM friends WHERE UserName = '$user'";
          $result = pg_query( $connect, $query);

          echo "<table>";
          echo "<tr><th>Username</th><th>FirstName</th><th>LastName</th><th>Email</th><th></th></tr>";

          while($row = pg_fetch_array($result)) 
          {

            $friendInfo = "SELECT * FROM users WHERE UserName = '$row[friend]'";

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



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>