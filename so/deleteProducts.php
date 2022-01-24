<?php include "../db/db.php";
global $connnection;
    $id = $_POST['id'];
    $query ="DELETE FROM products WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 

}
?>