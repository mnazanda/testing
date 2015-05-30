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
    </div>
  </nav>
  
  <!-- Content
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <section class="login">
    <div class="container">
      <div class="row">
        <div class="six columns" style="margin-top: 10%">
          <h4>Log In</h4>
        </div>
      </div>
    </div>



    <div class="container">
      <form action="indexControl.php" method="post">
        <div class="row ">
          <div class="six columns">
            <label for="exampleEmailInput" >Username</label>
            <input class="u-full-width" type="text" placeholder="Name" id="exampleEmailInput" name="userName">
          </div>
        </div>
        <div class="row">
          <div class="six columns">
            <label for="exampleEmailInput" >Password</label>
            <input class="u-full-width" type="password" placeholder="Password" id="exampleEmailInput" name="password">
          </div>
        </div>
        <label class="example-send-yourself-copy">
          <input type="checkbox">
          <span class="label-body">Keep me logged in</span>
		  <div style="align:right"><a href="createAccountForm.php">Create Acount</a></div>
        </label>
        <input class="button-primary" type="submit" value="Login">
      </form>
    </div>
  </section>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
