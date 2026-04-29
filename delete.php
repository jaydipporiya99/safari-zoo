<?php
    
include "Db/dbConnection.php";

$id = $_GET['id'];

$q1 = "DELETE FROM `orders` WHERE `id`=$id";

$res = $con->query($q1);

if($res){
    header("Location: shop-checkout.php");
}

?>