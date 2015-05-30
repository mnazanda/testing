
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ????????????????????????? -->
  <meta charset="utf-8">
  <title>GYMeet</title>
  <meta name="description" content="">
  <meta name="author" content="">

    <title>Datepair.js &ndash; Demos and Documentation</title>
    <meta name="description" content="A javascript plugin for intelligently selecting date and time ranges inspired by Google Calendar." />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="lib/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/jquery.timepicker.css" />

    <script src="lib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />

    <script src="lib/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/pikaday.css" />

    <script src="lib/jquery.ptTimeSelect.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/jquery.ptTimeSelect.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

    <script src="lib/moment.min.js"></script>

    <script src="lib/datepair.js"></script>
    <script src="lib/jquery.datepair.js"></script>

  <!-- Mobile Specific Metas
  ????????????????????????? -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  ????????????????????????? -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  ????????????????????????? -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Favicon
  ????????????????????????? -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Navbar
  ????????????????????????? -->
  
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
  ????????????????????????? -->

  <div class="container">
    <div class="row">
      <div class="six columns" style="margin-top: 10%">
        <h3><strong>Edit Workout</strong></h3>
      </div>
    </div>
  </div>''

  <div class="container">
    <?php echo "<form action='editWorkoutControl.php?oldTitle=".$_GET['title']."&oldWorkoutDate=".$_GET['workoutDate']."' method='post'/>"?>
      <div class="row">
        <div class="six columns">
          <label for="title">Workout Title</label>
          <?php echo"<input class='u-full-width' type='text' name='title' value='".$_GET['title']."'/>" ?>
        </div>
      </div>
      <div class="row" id="timePicker">
         <div class="two columns">
          <label for="date">Day</label>
          <?php echo"<input class='u-full-width' type='text' name='date' value='".$_GET['workoutDate']."'/>" ?>
        </div>
         <div class="two columns">
          <label for="startTime">Start Time</label>
          <?php echo"<input class='u-full-width' type='text' name='startTime' value='".$_GET['startTime']."'/>" ?>
        </div>
        <div class="two columns">
          <label for="endTime">End Time</label>
          <?php echo"<input class='u-full-width' type='text' name='endTime' value='".$_GET['endTime']."'/>" ?>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <label for="location">Location</label>
          <?php echo"<input class='u-full-width' type='text' name='location' value='".$_GET['location']."'/>" ?>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <label for="description">Description</label>
          <?php echo "<textarea class='u-full-width' rows='4' name='description' value='".$_GET['description']."'> </textarea>"?>
        </div>
      </div>
      <!--<div class="row">
        <div class="six columns">
          <label>
            <span class="label-body"><strong># of Slots:</strong></span>
            <?php /*echo "<select type='text' name='numOfReserves' value='".$_GET['numOfReserves']."'>
              <option value='1'>1</option>
              <option value='2'>2</option>
              <option value='3'>3</option>
            </select>"*/?>
          </label>
        </div>
      </div>-->
      <input type="submit" value="Save" class="button-primary"/><br/>
    </form>
          <a <?php echo "href = \"removeWorkoutControl.php?workoutDate=".$_GET['workoutDate']."&title=".$_GET['title']."\""?> onClick="return confirm('Are you sure you want to remove this workout?')" >Remove Workout</a>
  </div>

<!-- Date & Time Picker Script -->
<script>
  // initialize input widgets first
  $('#timePicker .time').timepicker({
    'showDuration': true,
    'disableTextInput' : true,
    'timeFormat': 'g:ia'
  });

  $('#timePicker .date').datepicker({
    'format': 'm-d-yyyy',
    'disableTextInput' : true,
    'autoclose': true
  });

  // initialize datepair
  var datePickerEl = document.getElementById('timePicker');
  var datePair = new Datepair(datePickerEl, {
    'anchor': 'start',
    'defaultTimeDelta': 3600000 // milliseconds
  });
      
</script>  

<!-- End Document
  ????????????????????????? -->
</body>
</html>
