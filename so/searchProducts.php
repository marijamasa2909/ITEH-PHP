<?php include "../db/db.php";
global $connnection;


$search=$_POST['search'];
if(!empty($search) || $search=""){
$query = "SELECT id, name, about, price, url FROM products WHERE name LIKE '$search%'";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
$count=mysqli_num_rows($query_product_info);
if($count<1){
    echo "We don't have that product";
}
while($row=mysqli_fetch_array($query_product_info)){
    echo "<div id={$row['id']} class='product'>";
    echo "<img src='{$row['url']}' alt='' />";
    echo "<div class='product-info'>";
    echo "<h3>{$row['name']}</h3>";
    echo "</div>";
    echo "<div class='product-specs'>";
    echo "<h4>{$row['price']}$</h4>";

    echo "</div>";
    echo "</div>";
}
}
?>