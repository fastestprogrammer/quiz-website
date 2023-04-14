<?php
session_start();
   
   if (!isset($_POST['uname']))
            include './index.php';
   else
   {
         
                $uname=$_POST['uname'];
                $passwd=$_POST['passwd'];
        
                include 'connect.php';
                if(!$resultset = $database_handler->query("SELECT * from admin ;"))
                            {
			                     die("Query error");
                            }   
                $row = $resultset->fetch_assoc();
            
                if($uname==$row['name'])
                {
                    if($passwd==$row['password'])
                    {
                         $_SESSION["uname"] = $uname;
                         $_SESSION["passwd"]= $passwd;
                         $_SESSION["admin_id"]= $row['admin_id'];
                       
                        include './main_dashboard.php';
                    }
                    else
                    {  
                        $msg = "Wrong Password";
                        include 'wrong_login.php'; 
                    }
                }
                else
                {
                    
                        $msg = "Wrong Username";
                        include 'wrong_login.php';
                }
        }
    
    
?>