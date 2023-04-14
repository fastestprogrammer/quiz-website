<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	require_once('authenticate.php');

	if(!isLoggedIn()){
		header("location: index.php");
		exit();
	}

	require_once('connection.php');
	$query = $database_handler->prepare("SELECT time_started,time_completed,time_elapsed,score FROM user WHERE user_id=?;");
	$query->bind_param('i',$_COOKIE['user_id']);
	$query->execute();
	$query->store_result();
	$query->bind_result($time_started, $time_completed, $time_elapsed, $score);
	$query->data_seek(0);
	$query->fetch();

	if(isset($_COOKIE['time_elapsed']) && $time_elapsed>$_COOKIE['time_elapsed']){
		setcookie('time_elapsed', $time_elapsed, time()+86400);
	}

	setcookie('time_started', $time_started, time()+86400);
	setcookie('time_completed', $time_completed, time()+86400);
	setcookie('score', $score, time()+86400);

	$query = $database_handler->prepare("SELECT name,duration FROM quiz WHERE quiz_id=?;");
	$query->bind_param('i',$_COOKIE['quiz_id']);
	$query->execute();
	$result = $query->get_result();
	$quiz = $result->fetch_assoc();

	setcookie('quiz_name', $quiz['name'], time()+86400);
	setcookie('quiz_duration', $quiz['duration'], time()+86400);

	if($time_completed){
		echo "<meta http-equiv='refresh' content='0;url=finish.php'>";
		exit();
	}

?>
<html>
	<?php
		$title = "Quiz";
		include("header.php");
	?>
	<body>
		<script src="js/jquery.deserialize.js"></script>
		<script src="js/quiz.js"></script>
		<?php
			$heading = $_COOKIE['quiz_name'];
			$menu = array("Profile"=>"#", "Rules"=>"#", "Questions"=>"#");
			include("dashboard.php");
		?>
		<main class="center-align">
			<div class="container" id="Questions" style="display: none;">
				<?php include("questions.php"); ?>
			</div>

			<div class="container" id="Profile" style="display: none;">
				<?php include("profile.php"); ?>
			</div>

			<div class="container" id="Rules" style="display: block;">
				<?php include("rules.php"); ?>
			</div>

			<div id="auto-finish-modal" class="modal">
				<div class="modal-content">
					<h4>Quiz Finished</h4>
					<p>Your quiz time is over</p>
					<p>All the selected answers are submitted.</p>
				</div>
				<div class="modal-footer">
					<a href="#" id="auto-finish" class="waves-effect waves-green btn-flat">Finish</a>
				</div>
			</div>

			<div id="forced-finish-modal" class="modal">
				<div class="modal-content">
					<h4>Finish Quiz</h4>
					<p>Do you really want to end the quiz?</p>
					<p>All the selected answers will be submitted.</p>
				</div>
				<div class="modal-footer">
					<a href="#" id="forced-finish" class="waves-effect waves-green btn-flat">Finish</a>
					<a href="#" class="modal-close waves-effect waves-green btn-flat">Dismiss</a>
				</div>
			</div>
		</main>
		<?php
			include("footer.html");
		?>
	</body>
</html>
