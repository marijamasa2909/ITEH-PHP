<?php include "../db/db.php";
global $connnection;    
if(isset($_POST['id'])){
$id=$_POST['id'];
$query = "SELECT id, name, about, price, url FROM products WHERE id =".$id;
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
echo "<div class='form'>";
echo "<form class='add-form' method='post' action='so/changeProduct.php'>";
while($row=mysqli_fetch_array($query_product_info)){

    echo "<input style='color:black;'type='text' rel= '".$row['id']."'name='url' value='".$row['url']."'/>";
    echo "<input style='color:black;'type='text' rel= '".$row['id']."'name='name' value='".$row['name']."'/>";
    echo "<input style='color:black;'type='text' rel= '".$row['id']."'name='about' value='".$row['about']."'/>";
    echo "<input style='color:black;'type='text' rel= '".$row['id']."'name='price' value='".$row['price']."'/>";
    echo "<input style='display:none;'type='text' rel= '".$row['id']."'name='id' value='".$row['id']."'/>";
    echo "<button type='submit'>Save</button>";
    echo "</form>";
    echo "</div>";
}
}
?>