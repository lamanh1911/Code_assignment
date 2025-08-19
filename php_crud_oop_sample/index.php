<?php
require_once 'includes/Database.php';
require_once 'products/Product.php';

$database = new Database();
$db = $database->connect();

$product = new Product($db);
$stmt = $product->read();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href='products/create.php'>Thêm sản phẩm</a>
    <ul>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <li>
            <?= $row['name'] ?> - <?= $row['price'] ?> đ |
            <a href='products/update.php?id=<?= $row['id'] ?>'>Sửa</a> |
            <a href='products/delete.php?id=<?= $row['id'] ?>'>Xoá</a>
        </li>
    <?php endwhile; ?>
    </ul>
</body>
</html>