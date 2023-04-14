<?php

if(!isset($_POST['selected_quiz']))
{
    $msg="Select Your Quiz First";
}
else
{
    $selected_quiz=$_POST['selected_quiz'];
    $duration=$_POST['duration'];
    include 'connect.php';
  
    $sql="UPDATE `quiz` SET  `duration` = '$duration' WHERE `quiz_id` = '$selected_quiz'";
      
    
      if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "Time Updated";
}
include 'edit.php';
?>
