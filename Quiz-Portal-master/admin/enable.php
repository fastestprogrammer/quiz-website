<?php

if(!isset($_POST['selected_quiz']))
{
    $msg="Select Your Quiz First";
}
else
{
    $selected_quiz=$_POST['selected_quiz'];
    include 'connect.php';
  
    $sql="UPDATE `quiz` SET  `is_available` = '1' WHERE `quiz_id` = '$selected_quiz'";
      
    
      if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "quiz is Enable Now";
}
include 'edit.php';
?>
