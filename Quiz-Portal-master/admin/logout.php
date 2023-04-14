<?php
session_start();
if(isset($_SESSION["uname"])){
    unset($_SESSION["uname"]);
}
$msg="You have Successfully logged out";
include 'wrong_login.php';  
?>
 