<?php include "../db/db.php";
global $connnection;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$address = $_POST['address'];
$password = $_POST['password'];
$first_name = mysqli_real_escape_string($connnection, $first_name );   
$last_name = mysqli_real_escape_string($connnection, $last_name );   
$username = mysqli_real_escape_string($connnection, $username );
$address = mysqli_real_escape_string($connnection, $address );   
$password = mysqli_real_escape_string($connnection, $password );
   
    $query = "INSERT INTO users(first_name, last_name, username,password, address, admin) ";
    $query .= "VALUES ('$first_name', '$last_name','$username', '$password','$address', 0)";
    $result = mysqli_query($connnection, $query);

    if(!$result) {
        die('Query FAILED' . mysqli_error());
    
    }else{
    header("Location:http://localhost/namestaj/index.html");
    }
    ?>