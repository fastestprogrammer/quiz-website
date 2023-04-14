<?php
    session_start();

    $name=$_POST['name'];
    $passwd=$_POST['passwd'];
    $admin_id=$_SESSION['admin_id'];
    include 'connect.php';
  
    $sql="UPDATE `admin` SET  `name` = '$name',`password` = '$passwd' WHERE `admin_id` = '$admin_id'";
      
    
      if (!$database_handler->query($sql) === TRUE)  {
                                $msg = "Query Error Try again";
                                
                                
			                 }
else{
$msg = "Admin Data Updated";
$_SESSION['uname']=$name;
$_SESSION['passwd']=$passwd;

}
include 'main_dashboard.php';
?>
