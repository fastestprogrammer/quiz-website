<header>
<ul id="slide-out" class="sidenav">
	<li>
		<div class="user-view">
			<div class="background">
				<img src="imageset/dashboard-background.jpeg">
			</div>
			<a href="#" class="profile"><img class="circle center" src="imageset/csi-logo.png"></a>
			<a href="#" class="profile"><span class="white-text name"><?php echo $_COOKIE['username']; ?></span></a>
			<a href="#" class="profile"><span class="white-text email"><?php echo $_COOKIE['firstname'].' '.$_COOKIE['lastname']; ?></span></a>
		</div>
	</li>

	<?php foreach($menu as $item => $url) { ?>
		<li><a id="button-<?php echo $item; ?>" class="waves-effect waves-grey" href="<?php echo $url; ?>"><?php echo $item; ?></a></li>
	<?php } ?>

	<li><div class="divider"></div></li>
	<li><a class="subheader">Actions</a></li>
	<li><a class="waves-effect" href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
	<div class="nav-wrapper indigo darken-3 hoverable">
		<a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
		<a href="#" class="brand-logo center"><?php echo $heading; ?></a>
		<div id="quiz-countdown" class="brand-logo right white-text left-align tooltipped" style="padding-right:10%;" data-position="down" data-tooltip="Time Left"></div>
	</div>
</nav>
</div>
</header>
