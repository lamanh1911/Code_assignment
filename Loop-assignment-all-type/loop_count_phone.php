<?php
$products = ["iphone", "samsung", "iphone", "xiaomi", "samsung", "iphone"];

$countValue = array_count_values($products);

foreach ($countValue as $key => $value){
    echo "Số lượng " .  $key . " là " . $value . "<br>";
}
?>