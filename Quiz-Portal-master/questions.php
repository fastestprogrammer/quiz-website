<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	try{
		function get_questions($quiz_id){
			require('connection.php');
			$query = $database_handler->prepare("SELECT * FROM question WHERE quiz_id = ? ORDER BY RAND();");
			$query->bind_param('i', $quiz_id);
			$query->execute();
			$result = $query->get_result();

			$questions = array();
			while($row = $result->fetch_assoc()){
				$questions[] = $row;
			}

			return $questions;
		}

		function get_options($question_id){
			require('connection.php');
			$query = $database_handler->prepare("SELECT * FROM option WHERE ques_id = ? ORDER BY RAND();");
		    $query->bind_param('i', $question_id);
		    $query->execute();
		    $result = $query->get_result();

			$options = array();
		    while($row = $result->fetch_assoc()){
				$options[] = $row;
		    }

			return $options;
		}

		function get_answers($user_id){
			require('connection.php');
			$query = $database_handler->prepare("SELECT ques_id,answer_provided FROM answer WHERE user_id = ?;");
			$query->bind_param('i', $user_id);
			$query->execute();
			$result = $query->get_result();

			$answers = "";
			while($row = $result->fetch_assoc()){
				$answers = $answers.$row['ques_id'].'='.$row['answer_provided'].'&';
			}
			return substr($answers, 0, strlen($answers)-1);
		}

	}
	catch(ErrorException $e){
		die($e->getMessage());
	}
?>

<h1>Questions</h1>

<form action="quizSubmit()" id="question-form">
	<div class="row">
	<?php $questions = get_questions($_COOKIE['quiz_id']);
	 for($i=1 ; $i<=sizeof($questions) ; $i++) {?>
		<div class="col s12 m12">
			<div class="card horizontal hoverable">
				<div class="card-image">
					<?php if($questions[$i-1]['image']){ ?>
						<img src="data:image/png;base64,<?php echo base64_encode($questions[$i-1]['image']); ?>">
					<?php } ?>
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<span class="badge white-text hoverable"><?php echo $i; ?></span>
						<p><?php echo $questions[$i-1]['description']; ?></p>
					</div>
					<div class="card-action">
						<div class="row">
							<?php
								if($questions[$i-1]['has_options']){
									$options = get_options($questions[$i-1]['ques_id']);
									for($j=1 ; $j<=sizeof($options) ; $j++) {?>
										<label class="col s6">
											<input name="<?php echo $questions[$i-1]['ques_id']; ?>" type="radio" value="<?php echo $options[$j-1]['description']; ?>"/>
											<span><?php echo $options[$j-1]['description']; ?></span>
											<?php if($options[$j-1]['image']){ ?>
												<img class="responsive-img" src="data:image/png;base64,<?php echo base64_encode($options[$j-1]['image']); ?>">
											<?php } ?>
										</label>
									<?php }
								}
								else{ ?>
									<label class="col s12 white-text">
										<input name="<?php echo $questions[$i-1]['ques_id']; ?>" type="text"/>
									</label>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="fixed-action-btn">
		<a id="stop-quiz-button" class="btn-floating btn-large waves-effect waves-light green tooltipped pulse" data-position="left" data-tooltip="Submit Quiz"><i class="material-icons">check</i></a>
	</div>
	</div>
</form>
<script>
	<?php if(get_answers($_COOKIE['user_id'])){ ?>
		$("#question-form").deserialize("<?php echo get_answers($_COOKIE['user_id']); ?>");
	<?php } ?>
</script>
