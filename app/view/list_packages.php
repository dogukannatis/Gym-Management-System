<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Packages</title>
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
                <a class="nav-link" aria-current="page" href="../view/home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../view/members.php">Members</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./add_package.html">Add Package</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./list_packages.php">List Packages</a>
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
    
    
<?php

require_once "./Config.php";

session_start();

// if the user is already logged in, redirect to the main page.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../view/login.html");
    exit;
}


try{

$sql = "SELECT * FROM packages ORDER BY id";

if($result = mysqli_query($connection, $sql)){


       if(mysqli_num_rows($result) > 0){
        
           echo "<table class='table table-striped'>";
           echo "
           <thead>
           <tr>
           <th scope='col'>ID</th>
           <th scope='col'>Package Name</th>
           <th scope='col'>Package Price</th>
           <th scope='col'>Start Time</th>
           <th scope='col'>End Time</th>
           <th scope='col'>Created At</th>
           </tr>
           </thead><tbody>         ";
           while ($row = mysqli_fetch_array($result)) {
            $link = "./delete_package.php?package_id=" . $row["id"];
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td>";
               echo "<td>" . $row['name'] . "</td>";
               echo "<td>" . $row['price'] . "</td>";
               echo "<td>" . $row['start_time'] . "</td>";
               echo "<td>" . $row['end_time'] . "</td>";
               echo "<td>" . $row['created_at'] . "</td>";
               echo "<td>" . " <a class='btn btn-danger' href=' " . $link . "' role='button'>DELETE</a>" . "</td>";
               echo "</tr>";
           }

           echo "</tbody></table>";
       } else{
           echo "
           <p class='text-center display-6 text-danger pt-5'>
           There is no record.
           </p>
            ";
       }
   
}else{
    echo "Connection error.";
}
}catch(Exception $e) {
    echo $e;
}
mysqli_close($connection);
?>



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