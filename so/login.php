<?php include "../db/db.php";
include "../domen/user.php";
global $connnection;
session_start(); 

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, first_name, last_name, username, password, address, admin FROM users WHERE username='$username' and password='$password'";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
$count=mysqli_num_rows($query_product_info);

if($count<1){
    echo "Wrong username or password";
}
while($row=mysqli_fetch_array($query_product_info)){
    // $user=new User($row['id'], $row['first_name'],$row['last_name'],$row['username'],$row['password'], $row['address'],$row['admin']);
    $_SESSION['user']=$row['id'];
    $_SESSION['admin']=$row['admin'];
    
}
?>