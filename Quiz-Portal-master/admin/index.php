<?php
session_start();

if(isset($_SESSION['uname']))
{ ?><meta http-equiv="refresh" content="0;URL=main_dashboard.php" /><?php }
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <link href="css/style.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

    <body>
	
<nav style="background-color:#e8eaf6; text-align:center; font-size:30px;color:black;">Online Quiz Portal - ADMIN panel</nav>
	
	  <div class="container">
	<div class="row" ></div><div class="row" ></div>
	<div class="row" >
	<div class="col s5 offset-s3">
 <div class="card"style="background-color:#e8eaf6; color:#000;">
    <div class="card-image waves-effect waves-block waves-light" style="width:50%; left:20%" >
	<br>
      <img class="activator responsive"  src="images/csi-logo.png">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Login<i class="material-icons right">more_vert</i></span>
       <form action="./dashboard.php" method="POST">
	  <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" name="uname" type="text" class="validate">
          <label for="icon_prefix">Username</label>
        </div>
	  <div class="input-field">
		  <i class="material-icons prefix">lock</i>
          <input id="password" name="passwd" type="password" class="validate">
          <label for="password">Password</label>
        </div>
		  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
	</form>
	  
	  
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Information<i class="material-icons right">close</i></span>
      <p>This is online quiz portal.<br>You can Host quiz using this.<br>Detailed Guidance is given in all pages to make it easier to use.<br>
 Enter Your Admin username and password to login to admin panel.</p>
    </div>
  </div>
  </div>		 
</div>



      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script type="text/javascript" src="js/script.js"></script>
    </div>
	</body>
  </html>
        