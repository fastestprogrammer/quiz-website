<?php
if(isset($_POST['colour']))
{
    $colour = $_POST['colour'];

include 'connect.php';

 

{
      $sql="UPDATE `admin` SET  `colour` = '$colour' WHERE `admin_id`='1'";
    
}


  if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
			                 }
else
$msg = "Theme Updated";
}
include 'main_dashboard.php';

?>
