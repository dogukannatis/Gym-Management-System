<?php

require_once "./Config.php";

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../view/login.html");
    exit;
}


try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if( empty(trim($_POST["inputPackageName"])) || 
            empty(trim($_POST["inputPackagePrice"])) ||
            empty(trim($_POST["inputStartTime"])) ||
            empty(trim($_POST["inputEndTime"])) )
        {
            $error = true;
            echo "Please fill the areas.";
        }else {

            $sql = "INSERT INTO packages (name, price, start_time, end_time)
            VALUES (?, ?, ?, ?)";
             
            if($stmt = mysqli_prepare($connection, $sql)){
                
                mysqli_stmt_bind_param($stmt, "ssss", $name, $price, $start_time, $end_time);
             
                $name = $_POST["inputPackageName"]; 
                $price = $_POST["inputPackagePrice"];
                $start_time = date($_POST["inputStartTime"]);
                $end_time = date($_POST["inputEndTime"]);
                             
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: successfull_page.php?status=added");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                   
                mysqli_stmt_close($stmt);
            }
        
        }
        
        mysqli_close($connection);
    }
}catch(Exception $e){
    echo $e;
}



?>