<?php
$cart = [
    ["name" => "Laptop", "price" => 1000],
    ["name" => "Smartphone", "price" => 500],
    ["name" => "Tablet", "price" => 300]
];

$totalPrice = 0;
foreach($cart as $item){
    echo "Sản phẩm: {$item['name']}, Giá: {$item['price']} USD; <br>";
    $totalPrice += $item['price'];
    echo "Tổng giá trị đơn hàng là: {$totalPrice} USD";
}
?>