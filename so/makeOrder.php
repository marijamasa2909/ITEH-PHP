<?php include "../db/db.php";
global $connnection;
session_start();
    $id=$_POST['id'];
    $user=$_SESSION["user"];
    $query = "INSERT INTO orders(user_id, product_id) ";
    $query .= "VALUES ($user, $id)";
    $result = mysqli_query($connnection, $query);

    if(!$result) {
        die('Query FAILED' . mysqli_error());
    
    }
?>