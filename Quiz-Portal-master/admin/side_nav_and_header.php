<!DOCTYPE html>
  <html>
    <head>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script>
			$(document).ready(function(){
			$('.sidenav').sidenav();
			});
		</script>
		<script>
		
  $(document).ready(function(){
    $('select').formSelect();
  });
		</script>  
	</head>

    <body>

<!-- -------------------------------Nav bar ------------------------------------------------>
        <?php 
            include 'connect.php';
            if($resultset = $database_handler->query("SELECT * from admin;"))
                            {
			                     if($row = $resultset->fetch_assoc())
                                 {
                                     $colour = $row['colour'];
                                 }
                                else
                                {
                                    $msg = "Error Changing in theme.";
                                    $colour = "#455a64";//69 90 100
                                }
                            } 
        else
        {
            $msg = "Error Changing in theme.";
                                    $colour = "#455a64";
        }
?>
            
                            
                            
        
		<nav style="background-color:<?php echo $colour; ?>">
			<div class="nav-wrapper hoverable">
				<div class="row">
					<div class="col s1 offset-s1">
						<a href="#" data-target="slide-out" class="sidenav-trigger btn-floating pulse btn-large show-on-large"><i class="material-icons">menu</i></a>
					</div>
					<a href="#" class="brand-logo center"><?php echo $name; ?></a>
				</div>
			</div>
		</nav>
	

<!---------------------------------------- code for side NAV BAR ------------------------------------->
	 
		<ul id="slide-out" class="sidenav">
			<li><div class="user-view">
					<div class="background">
						<img src="images/background-sidenav.jpg">
					</div>
					<a href="#user"><img class="circle" src="images/csi2.jpg"></a>
					<a href="./dashboard.php"><span class="white-text name">CSI-DDU Branch</span></a>
					<a href="./dashboard.php"><span class="white-text email">Admin Panel</span></a>
			</div></li>
			<li><a href="./main_dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
			<li><div class="divider"></div></li>
			<li><a href="./new.php"><i class="material-icons">add_circle</i>Create New</a></li>
			<li><a href="./edit.php"><i class="material-icons">edit</i>Edit</a></li>
			<li><a href="./monitor.php"><i class="material-icons">desktop_mac</i>Monitor</a></li>
			<li><a href="./logout.php"><i class="material-icons">settings_power</i>Logout</a></li>
		</ul>
