<?php

require_once "./Config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$error = false;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if( empty(trim($_POST["registerInputUsername"])) || 
        empty(trim($_POST["registerInputPassword"])) ||
        empty(trim($_POST["registerInputName"])) ||
        empty(trim($_POST["registerInputSurname"])) ||
        empty(trim($_POST["registerInputDob"])) )
    {
        $error = true;
    } else{
        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["registerInputUsername"]);
            

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                    $error = true; 
                } else{
                    $username = trim($_POST["registerInputUsername"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
   
    
    // Check input errors before inserting in database
    if(!$error){
        
        try{

        $sql = "INSERT INTO users (username, password, name, surname, dob, membership_id)
        VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){

            mysqli_stmt_bind_param($stmt, "sssssi", $username, $param_password, $param_name, $param_surname, $param_dob, $param_membership_id);
            
            $param_password = password_hash($_POST["registerInputPassword"], PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $_POST["registerInputName"];
            $param_surname = $_POST["registerInputSurname"];
            $param_dob = date($_POST["registerInputDob"]);
            $param_membership_id = 0;
            
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.html");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
        }catch(Exception $e){
            echo $e;
        }
    }else{
        echo "Please fill the areas.";
    }
    
    mysqli_close($connection);
}


 /*
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    */




?>


