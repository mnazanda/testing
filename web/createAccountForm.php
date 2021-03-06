<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <meta charset="utf-8">
  <title>GYMeet</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Favicon
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Navbar
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  
  <nav class="navbar">
    <div class="container">
     <h2 class="logo">GYMeet</h2>
    </div>
  </nav>

    <!-- Content
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
  <section class="login">
    <div class="container">
      <div class="row">
        <div class="six columns" style="margin-top: 10%">
          <h4>Create Account</h4>
        </div>
      </div>
    </div>

  	<div class="container">
  		<form action="createAccountControl.php" method="post"/>
      <div class="row">
        <div class="six columns">
          <label for="userName">Username</label>
    			<input class="u-full-width" type="text" name="userName"/>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <label for="password">Password</label>
    			<input class="u-full-width" type="text" name="password"/>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <label for="email">Email Address</label>
          <input class="u-full-width" type="email" name="email"/>
        </div>
      </div>
  		<div class="row">
        <div class="three columns">
          <label for="firstName">First Name</label>
        	<input class="u-full-width" type="text" name="firstName"/>
        </div>
        <div class="three columns">
          <label for="lastName">Last Name</label>
          <input class="u-full-width" type="text" name="lastName"/>
        </div>
      </div>
  		<div class="row">
  		</div>
      <input type="submit" value="Create" class="button-primary"/>
  		</form>
  	</div>
  </section>


<!-- End Document
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
</body>
</html>
