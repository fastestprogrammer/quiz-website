<?php
$break=0;
if(!isset($_POST['selected_quiz']))
{
    $msg="Select Your Quiz First";
}
else
{
    if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name']))
            $msg="select your file first";
    else
    {
                $selected_quiz=$_POST['selected_quiz'];
                if ($_FILES["file"]["error"] > 0) 
                {
                        $msg = "Error Code: " . $_FILES["file"]["error"];
                }
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                if($imageFileType != "csv" )
                {
                    $msg = "Only CSV file are allowed.";
                }
        
                if (!$filename=$_FILES["file"]["tmp_name"])
                    $msg="Error Uploading File";
                else
                    {    
                        include 'connect.php';
                        $file = fopen($filename, "r");
                        $count=1;
	                   while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                       {
                           
                            $sql = "INSERT into question (quiz_id,description,answer,has_options) 
                            values ('$selected_quiz','$getData[1]','$getData[3]','$getData[2]')";
                            if (!$database_handler->query($sql) === TRUE)  
                            {
                                $msg = "Query Error in question". $count." ,Try again";
                                break;
                            }
                            else
                            {
                               $ques_id=mysqli_insert_id($database_handler);
                                for($i=0;$i<$getData[2];$i=$i+1)
                                {
                                    $add=$i+4;
                                    $sql = "INSERT into option (ques_id,description) values ('$ques_id','$getData[$add]')";
                                    if (!$database_handler->query($sql) === TRUE)  
                                    {
                                        $msg = "Query Error in option of question". $count." ,Try again";
                                        break;
                                        $break = 1;
                                    }
                 
                                    $msg = "Questions Uploaded";
                                }
                                if($break == 1)
                                    break;
                                else
                                    $break = 0;
                                $count++;
         
                            }
                     
                        }
                    }
    }
}

include 'edit.php';
?>
