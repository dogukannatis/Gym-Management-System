<?php

session_start();

// if the user is already logged in, redirect to the main page.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../view/login.html");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Add Package</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">GYM Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../view/home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../view/members.php">Members</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./add_package.html">Add Package</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./list_packages.php">List Packages</a>
              </li>
              <li style="padding-left: 10px;">
                <form action="../core/logout.php" method="GET">
                    <button type="submit" class="btn btn-danger" >Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <div class="pt-5">
        <?php
        if($_GET["status"] == "added"){
         echo '<p class="text-success text-center display-5"> Package has been added successfully. </p>';
     
         echo '<p class="text-center"><a class="text-danger" href="./list_packages.php"> Show Packages</a></p>'; 
     
         echo ' <p class="text-center"><a class="text-danger " href="./add_package.html">Return</a></p>';
        }else{
          echo '<p class="text-success text-center display-5"> Package has been deleted successfully. </p>';
     
          echo '<p class="text-center"><a class="text-danger" href="./list_packages.php"> Show Packages</a></p>'; 
      
          echo ' <p class="text-center"><a class="text-danger " href="./home.php">Home</a></p>';
        }

        ?>
       
      </div>
    

<footer class="text-center text-lg-start bg-white text-muted mt-auto">
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
      © 2023 Copyright:
       <a class="text-reset fw-bold" href="#">DOĞUKAN ATİŞ</a>
    </div>
</footer>
</body>



<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>