<div class="row">
	<div class="col card hoverable s6 offset-s3">
		<div class="center-align">
			<img src="imageset/csi-logo.png" alt="" class="circle responsive-img hoverable" style="padding-top: 2%; max-width: 40%;">
		</div>
		<div class="card-content center-align">
			<h5><span class="card-title">My Profile</span></h5>
			<h5><p>Name: <?php echo $_COOKIE['firstname'].' '.$_COOKIE['lastname'];?></p>
			<p>Username: <?php echo $_COOKIE['username'];?><p>
			<p>Current Quiz: <?php echo $_COOKIE['quiz_name'];?></p></h5>
		</div>
		<div class="card-action center-align">
			<h4><div id="profile-quiz-countdown">Quiz Not Started yet.</div><h4>
		</div>
	</div>
	<div class="fixed-action-btn" >
		<a class="change-theme-button btn-floating btn-large waves-effect waves-light tooltipped pulse" data-position="top" data-tooltip="Change THEME!!!"><i class="material-icons">wb_sunny</i></a>
	</div>
</div>
