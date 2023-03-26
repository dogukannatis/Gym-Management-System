<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'dbpass');
define('DB_NAME', 'gym');
 

try{
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
}catch(Exception $e) {
    echo $e;
}

?>