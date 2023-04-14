<?php
if(!isset($_POST['selected_quiz']))
    $msg="select your quiz first";
else if(!isset($_POST['selected_ques']))
    $msg="select your question first";
else if($_POST['selected_quiz']==-1)
    $msg="select your quiz first";
else if($_POST['selected_ques']==-1)
    $msg="select your question first";
else if(!isset($_POST['selected_option']))
    $msg="select your option first";
else if($_POST['selected_option']==-1)
    $msg="select your option first";
else if(!isset($_FILES['file']))
    $msg="select image first";
else
{
    $selected_quiz = $_POST['selected_quiz'];
    $selected_ques = $_POST['selected_ques'];
    $selected_option = $_POST['selected_option'];
    $imagename=$_FILES["file"]["name"];
    $image_check = getimagesize($_FILES['file']['tmp_name']);
       if($image_check==false)
       {
        $msg = 'Not a Valid Image';
           goto eof;
       }
    $imagetmp=addslashes (file_get_contents($_FILES['file']['tmp_name']));
    include 'connect.php';
    
    $sql="UPDATE `option` SET  `image` = '$imagetmp' WHERE `option_id` = '$selected_option' and `ques_id` = '$selected_ques' ";
    
if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "Image Uploaded";
  

}
eof:
include 'upload_image.php';
?>