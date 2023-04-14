<?php
	if(isset($_POST['action'])){
		if(strcmp($_POST['action'], "quiz_start")==0){
			require_once('connection.php');
			$query = $database_handler->prepare("UPDATE user SET time_started = ? WHERE user_id = ?;");
			$query->bind_param('ii', $_POST['time_started'], $_COOKIE['user_id']);
			$query->execute();
			echo "Quiz Started";
		}

	}
	else{
		require_once('connection.php');
		$sql = "INSERT INTO answer (user_id, ques_id, answer_provided) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE answer_provided = ?;";
		$query = $database_handler->prepare($sql);
		$user_id = (int)$_COOKIE['user_id'];

		foreach($_POST as $ques_id => $ans){
			$query->bind_param('iiss', $user_id, $ques_id, $ans, $ans);
			$query->execute();
			echo $ques_id . '  '. $ans;
		}

		$time_elapsed = $_COOKIE['time_elapsed'];
		$query = $database_handler->prepare("UPDATE user SET time_elapsed=? WHERE user_id = ?;");
		$query->bind_param('ii', $time_elapsed, $user_id);
		$query->execute();
		echo "Quiz Started";
	}

?>
