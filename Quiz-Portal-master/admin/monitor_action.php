<?php
$selected_quiz=$_POST['selected_quiz'];
$user_id = $_POST['user_id'];
$firstname = $_POST['firstname'];
$user = $_POST['username'];
$lastname = $_POST['lastname'];
$passwd = $_POST['passwd'];
$time_started = $_POST['time_started'];
$time_finished = $_POST['time_finished'];
$time_elapsed = $_POST['time_elapsed'];
$score = $_POST['score'];
 


 require_once('connect.php');
if(($_POST['time_finished']=="") && ($_POST['time_started']==""))
{
      $sql="UPDATE `user` SET  `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$user', `password` = '$passwd', `score` = '$score' WHERE `user_id` = '$user_id'";
    
}
else if(($_POST['time_finished']==""))
{
    
      $sql="UPDATE `user` SET  `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$user', `password` = '$passwd', `time_started` = $time_started, `time_elapsed` = $time_elapsed, `score` = '$score' WHERE `user_id` = '$user_id'";
    
}
else
{
      $sql="UPDATE `user` SET  `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$user', `password` = '$passwd', `time_started` = $time_started, `time_completed` = $time_finished,`time_elapsed` = $time_elapsed, `score` = '$score' WHERE `user_id` = '$user_id'";
}
  if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "Data Updated";
                          
 include 'monitor.php'; 
                           


?>