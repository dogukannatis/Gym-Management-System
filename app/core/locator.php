<?php

session_start();

// Check if user is logged in or not.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../view/login.html");
    exit;
}else{
    header("location: ../view/home.php");
    exit;
}

?>