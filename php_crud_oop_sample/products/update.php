<?php
require_once '../includes/Database.php';
require_once 'Product.php';

$database = new Database();
$db = $database->connect();
$product = new Product($db);

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$product->id = $id;

if ($_POST) {
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    if ($product->update()) {
        header('Location: ../index.php');
    }
}
?>
<form method="POST">
    Tên sản phẩm: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Giá: <input type="number" name="price" value="<?= $row['price'] ?>"><br>
    <input type="submit" value="Cập nhật">
</form>