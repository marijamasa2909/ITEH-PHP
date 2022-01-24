<?php include "../db/db.php";
global $connnection;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $about=$_POST['about'];
    $price=$_POST['price'];
    $url=$_POST['url'];
    $query ="UPDATE products SET name='$name', about='$about',price=$price,url='$url' WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){

        die("query failed"); 
}else{
    header("Location:http://localhost/namestaj/user.php");

}
?>