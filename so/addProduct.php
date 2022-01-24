<?php include "../db/db.php";
global $connnection;
    $name = $_POST['name'];
    $about=$_POST['about'];
    $price=$_POST['price'];
    $url=$_POST['url'];
    $query ="INSERT INTO products(name, about, price, url) VALUES ('$name','$about','$price','$url')";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 

    }else{
        header("Location:http://localhost/namestaj/user.php");
    }
?>