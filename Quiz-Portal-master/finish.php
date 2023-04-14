<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	require_once('authenticate.php');

	if(!isLoggedIn()){
		header('location: index.php');
		exit();
	}

	if(isset($_COOKIE['time_completed'])){
		require('connection.php');
		$query = $database_handler->prepare("UPDATE user SET time_completed = ? WHERE user_id = ?;");
		$query->bind_param('ii', $_COOKIE['time_completed'], $_COOKIE['user_id']);
		$query->execute();

		calculate_score();
	}

	function calculate_score(){
		require('connection.php');
		$user_id = $_COOKIE['user_id'];
		$score = 0;
		$selected_answers = get_selected_answers($user_id);
		for($i=0 ; $i<sizeof($selected_answers) ; $i++){
			if(strcmp($selected_answers[$i]['answer_provided'], get_real_answer($selected_answers[$i]['ques_id']))==0){
				$score++;
			}
		}

		$query = $database_handler->prepare("UPDATE user SET score = ? WHERE user_id = ?;");
		$query->bind_param('ii', $score, $user_id);
		$query->execute();
	}

	function get_selected_answers($user_id){
		require('connection.php');
		$query = $database_handler->prepare("SELECT ques_id,answer_provided FROM answer WHERE user_id = ?;");
		$query->bind_param('i', $user_id);
		$query->execute();
		$result = $query->get_result();

		$answers = array();
		while($row = $result->fetch_assoc()){
			$answers[] = $row;
		}
		return $answers;
	}

	function get_real_answer($ques_id){
		require('connection.php');
		$query = $database_handler->prepare("SELECT answer FROM question WHERE ques_id = ?;");
		$query->bind_param('i', $ques_id);
		$query->execute();
		$query->store_result();
		$query->bind_result($answer);
		$query->data_seek(0);
		$query->fetch();

		return $answer;
	}
?>

<html>

	<?php
		$title = "Finish";
		include("header.php");
	?>

	<body>
		<header>
			<nav>
				<div class="nav-wrapper indigo darken-3">
					<a href="#" class="brand-logo center">Quiz Finished</a>
				</div>
			</nav>
		</header>
		<main>
			<div class="container" style="padding-top: 2%;">
				<div class="row">
	  				<div class="col card hoverable s6 offset-s3 ">
						<div class="center-align">
							<img src="imageset/csi-logo.png" alt="" class="circle responsive-img hoverable" style="padding-top: 2%; max-width: 40%;">
						</div>
						<div class="card-content center-align">
							<span class="card-title">You Have completed your quiz</span>
						</div>
						<div class="card-action right-align">
							<a href="logout.php" class="btn waves-effect waves-light indigo darken-4" name="action">Logout
								<i class="material-icons right">send</i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php
			include("footer.html");
		?>

	</body>
</html>
