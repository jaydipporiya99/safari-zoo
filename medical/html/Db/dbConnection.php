<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "safari";

$con = mysqli_connect($servername , $username , $password , $database);

if(!$con){
    echo "Error->".mysqli_connect_error();
}

?>