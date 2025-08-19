<?php
require_once '../includes/Database.php';
require_once 'Product.php';

$database = new Database();
$db = $database->connect();
$product = new Product($db);

$product = new Product($db);
if ($_POST) {
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    if ($product->create()) {
        header('Location: ../index.php');
    }
}
?>
<form method="POST">
    Tên sản phẩm: <input type="text" name="name"><br>
    Giá: <input type="number" name="price"><br>
    <input type="submit" value="Thêm">
</form>