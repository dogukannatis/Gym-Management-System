<?php

require_once "./Config.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../view/login.html");
  exit;
}

try{

    // GET VARIABLES
    $membership_id = $_SESSION["membership_id"];
    $user_id = $_SESSION["id"];
    $package_id = $_GET["package_id"];


    // UPDATE USER
    $sql1 = "UPDATE users SET membership_id = $package_id WHERE id=$user_id";

    if(mysqli_query($connection, $sql1)){
       // UPDATE PACKAGE
        $sql2 = "UPDATE packages SET quota = quota + 1 WHERE id=$package_id";

        if(mysqli_query($connection, $sql2)){

            $sql3 = "UPDATE packages SET quota = quota - 1 WHERE id=$membership_id";

            if(mysqli_query($connection,$sql3)){
                header("location: home.php");
                $_SESSION["membership_id"] = $package_id;
            }else{
                echo "Error: " . mysqli_error($connection);
            }

            
        }else{
            echo "Error: " . mysqli_error($connection);
        }
        
    }else{
        echo "Error: " . mysqli_error($connection);
    }
    
    

}catch (Exception $e){
    echo $e;
}

?>