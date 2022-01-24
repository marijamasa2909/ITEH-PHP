<?php include "../db/db.php";
global $connnection;    
$query = "SELECT id, user_id, product_id, date FROM orders";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}

while($row=mysqli_fetch_array($query_product_info)){

$query2 = "SELECT name, price, url FROM products WHERE id=".$row['product_id'];
$query_product_info2=mysqli_query($connnection, $query2);
$query3 = "SELECT first_name, last_name, address FROM users WHERE id=".$row['user_id'];
$query_product_info3=mysqli_query($connnection, $query3);
    echo "<input rel= '".$row['id']."'type='text' id='name' class ='form-control' value='".$row['name']."' required>";
    echo "</br>";
    echo "<input type='text' id='about' class ='form-control' value='".$row['about']."'required>";
    echo "<br>";
    echo "<input type='text' id='price' class ='form-control' value='".$row['price']."'required>";
    echo "<br>";
    echo "<input type='text' id='url' class ='form-control' value='".$row['url']."'required>";
    echo "<br>";
    echo "<button class='btn' type='button' id='change' style='color:black;'>CHANGE</button>";
    echo "<button  class='btn' type='button' id='delete'style='color:black;'>DELETE</button>";
    echo "</form>";

}

?>