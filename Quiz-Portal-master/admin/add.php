<?php
$name=$_POST['name'];
$duration=$_POST['duration'];
include 'connect.php';

$sql = "INSERT INTO quiz (name,duration,is_available) VALUES ('$name','$duration', '1')";

if ($database_handler->query($sql) === TRUE) {
        $msg = "Quiz Successfully Created Add Your Question and User by .csv file";
        include "edit.php";
} 
else {
   echo "Error Creating New Quiz Try Again";
include 'new.php';
}

?>