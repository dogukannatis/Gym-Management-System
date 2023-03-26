<?php

require_once "./Config.php";

session_start();


// if the user is already logged in, redirect to the main page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../core/locator.php");
    exit;
}


$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["loginInputUsername"]))){
        $username_err = "Please enter your username.";
    } else{
        $username = trim($_POST["loginInputUsername"]);
    }

    if(empty(trim($_POST["loginInputPassword"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["loginInputPassword"]);
    }


    if(empty($username_err) && empty($password_err)){
    
        $sql = "SELECT id, username, password, membership_id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($connection, $sql)){
            $param_username = $username;

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                // If there is any match valid username
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $membership_id);
                    
                    if(mysqli_stmt_fetch($stmt)){
                        
                        if(password_verify($password, $hashed_password)){                      
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 
                            $_SESSION["membership_id"] = $membership_id;
                            // Redirect user to the home.php
                            header("location: home.php");
                        }else{
                            $login_err = "Invalid password";
                        }
                    }
                }else{                   
                    $login_err = "Invalid username or password. Please try again.";
                }
            }else{
                echo "Something went wrong. Please try again later.";
            }
            
            mysqli_stmt_close($stmt);
        }
    }else{
        echo $username_err . "<br>" . $password_err;
    }

    if(!empty($login_err)){
        echo $login_err;
    }

mysqli_close($connection);

}



?>