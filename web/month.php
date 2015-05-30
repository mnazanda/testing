<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Month Calendar</title>
  
  <link rel="stylesheet" href="css/calendar.css">
  <link rel="stylesheet" href="css/custom.css">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

  <link rel='stylesheet' href='fullcalendar/fullcalendar.css'/>
  <script src='lib/jquery.min.js'></script>
  <script src='lib/moment.min.js'></script>
  <script src='fullcalendar/fullcalendar.js'></script>
  
  <script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
          dayClick: function(date, jsEvent, view) {
            window.location = "day.php?date=" + date.format();
          }
        })

    });
  </script>

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
        <div id='calendar'></div>
      </div>
    </div>
  </div>

  

</body>
</html>
