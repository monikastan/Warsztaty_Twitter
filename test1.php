<?php


if(!isset($_SESSION['loggerUserId'])) {
    
   header('location: test2.php'); //od razu przekierowuje nas do strony test2
   
       
} else {
    echo 'test1.php';
}







