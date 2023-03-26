<?php

require_once "./Config.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../view/login.html");
  exit;
}


$package_id = $_GET["package_id"];

try{
  $sql = "DELETE FROM packages WHERE id=$package_id";
  
  if (mysqli_query($connection, $sql)) {
    header("location: successfull_page.php?status=deleted");
  } else {
    echo "Error: " . mysqli_error($connection);
  }

}catch(Exception $e){
  echo $e;
}

?>